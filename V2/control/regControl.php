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
        header ("Location: ../index.php?signin=empty");
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
            ->expiresAt($time + 3600) // Configures the expiration time of the token (exp claim)
            ->withClaim($uid, 1) // Configures a new claim, called "uid"
            ->getToken($signer, new Key($hashkey)); // Retrieves the generated token
            setcookie("pv", $pvkey, time() + (86400 * 30), "/");
            setcookie("pu", $pukey, time() + (86400 * 30), "/");
            setcookie($pvkey, $token, time() + (86400 * 30), "/");
            setcookie($pukey, $token, time() + (86400 * 30), "/");
            header("Location: ../view/a.php");
        }
    }
}

if(isset($_POST['signup'])){
    //Check for empty fields
    if (empty($_POST['user_FirstName'])  || empty($_POST['user_LastName']) || empty($_POST['user_uid']) || empty($_POST['user_email'])||empty($_POST['user_password'])) 
    {
        header ("Location: ../index.php?signup=empty");
        exit();
    } 
    else 
    {
        $fname = $_POST['user_FirstName'];
        $lname = $_POST['user_LastName'];
        $uid = $_POST['user_uid'];
        $email = $_POST['user_email'];
        $psw = $_POST['user_password'];

        $reg = new Registered();
        $reg->signup($fname, $lname, $email, $uid, $psw);
    }
}

