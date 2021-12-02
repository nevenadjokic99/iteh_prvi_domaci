<?php

class Broker{
   
    private $mysqli;
    private static $broker;
   
    private function __construct(){
        $this->mysqli = new mysqli("localhost","root","","nakit");
        $this->mysqli->set_charset("utf8");
    }

    public static function getBroker(){
        if(!isset($broker)){
            $broker=new Broker();
        }
        return $broker;
    }
    public function vratiKolekciju($upit){
        $rezultat=$this->mysqli->query($upit);
        $response=[]; //prazna kolekcija koju popunjavam pomocu fetch_object (ucitava jedan po jedan red iz baze i ubacuje
        //u kolekciju rezultat i taj rezlutat vraca kao povratnu vrednost)
        if(!$rezultat){
            $response['status']=false;
            $response['error']=$this->mysqli->error;
        }
        else{
            $response['status']=true;
            while($red=$rezultat->fetch_object()){
                $response['kolekcija'][]=$red;
            }
        }
        return $response;
    }
    public function doi($upit){ //dodaj obrisi izmeni
        $rezultat=$this->mysqli->query($upit);
        $response=[];
        $response['status']=(!$rezultat)?false:true;
        if(!$rezultat){
            $response['error']=$this->mysqli->error;
        }
        return $response;
    }
    
    
}


?>