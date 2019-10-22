<?php

class hash{

    private $qtd;

    public function GeraHash($qtd){
        $this->qtd = $qtd;
        $Caracteres = 'ABCDEFGHIJKLMOPQRSTUVXWYZ0123456789';
        $QuantidadeCaracteres = strlen($Caracteres);
        $QuantidadeCaracteres--;
        
        $Hash=NULL;
        for($x=1;$x<=$this->qtd;$x++){
            $Posicao = rand(0,$QuantidadeCaracteres);
            $Hash .= substr($Caracteres,$Posicao,1);
        }
        
        return $Hash;
    }
}
