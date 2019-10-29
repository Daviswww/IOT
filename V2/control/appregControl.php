<?php
include '../module/registered.php';
require_once('../assets/vendor/autoload.php');
require_once('../module/hash.php');
use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Signer\Key;
use Lcobucci\JWT\Signer\Hmac\Sha256;
$hash = new hash();
$signer = new Sha256();
$time = time();
$pvkey = $hash->GeraHash(rand(0, 128));
$pukey = $hash->GeraHash(rand(0, 128));
if(isset($_POST['signin'])){
    //Check if inputs are empty
    if (empty($_POST['user_uid']) || empty($_POST['user_password'])) 
    {
        header ("Location: ../../app/index.php?signin=empty");
        exit();
    } 
    else
    {
        $uid = $_POST['user_uid'];
        $psw = $_POST['user_password'];
        
        $reg = new Registered();
        if($reg->signin($uid, $psw))
        {
            $token = (new Builder())->issuedBy('http://qsiot.com') // Configures the issuer (iss claim)
            ->permittedFor('http://qsiot.org') // Configures the audience (aud claim)
            ->identifiedBy('4f1g23a12aa', true) // Configures the id (jti claim), replicating as a header item
            ->issuedAt($time) // Configures the time that the token was issue (iat claim)
            ->canOnlyBeUsedAfter($time + 60) // Configures the time that the token can be used (nbf claim)
            ->expiresAt($time + (86400 * 30)) // Configures the expiration time of the token (exp claim)
            ->withClaim($uid, 1) // Configures a new claim, called "uid"
            ->getToken($signer, new Key($hashkey)); // Retrieves the generated token
            $_SESSION["atime"] = $token->getClaim('exp');
            setcookie("uid", $uid, time() + (86400 * 30), "/");
            header("Location: ../../app/view/sensor.php");
        }
    }
}

