<?php

class Database
{
    private $db_name = 'mysql:dbname=my_hero_academia;';
    private $db_user = 'lorenzo';
    private $db_pass = 'queDuSale';
    private $db_host = 'host=localhost;charset=UTF8';
    private $pdo ;

    public function connectMe()
    {
        if($this->pdo === null){
            /*echo $this->db_name.' '.$this->db_host.' '.$this->db_user.' '.$this->db_pass;
            die;*/
            try {
                $pdo = new PDO($this->db_name.$this->db_host, $this->db_user, $this->db_pass);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                print "Woops, looks like something went wrong, try to connect later !: " . $e->getMessage() . "<br/>";
                die();
            }
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }

}