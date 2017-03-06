<?php
 
class connDatabase {
 
    private $db_host;
    private $db_name;
    private $db_username;
    private $db_password;
    private $connection;
 
    function __construct() {
        $this->db_host = "localhost";
        $this->db_name = "flowerpower";
        $this->db_username = "root";
        $this->db_password = "";
 
 
        try {
            $this->connection = new PDO("mysql:host=" . $this->db_host . ";dbname=" . $this->db_name . "", $this->db_username, $this->db_password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        } catch (PDOException $e) {
            echo "<br>Error: " . $e->getMessage();
        }
 
        $this->query = null;
        $this->connPDO = null;
    }
 
    public function insert($columns, $table, $value) {
        $sql = ("INSERT INTO $table ($columns)"
                . "VALUES ('$value')");
        $this->connection->execute($sql);
    }
 
    public function select($columns, $tabel, $where){
       if($where == '*'){
           $stmt = $this->connection->prepare("SELECT ".$columns." FROM ".$tabel.";");
           $stmt->execute();
       } elseif ($tabel == 'artikel' && $where != '*') {
           $stmt = $this->connection->prepare("SELECT ".$columns." FROM ".$tabel." WHERE artikelcode='".$where."';");
           $stmt->execute();
       } elseif ($tabel == 'klant' && $where != '*') {
           $stmt = $this->connection->prepare("SELECT ".$columns." FROM ".$tabel." WHERE artikelcode='".$where."';");
           $stmt->execute();
       } elseif ($tabel == 'medewerker' && $where != '*') {
           $stmt = $this->connection->prepare("SELECT ".$columns." FROM ".$tabel." WHERE artikelcode='".$where."';");
           $stmt->execute();
       } elseif ($tabel == 'winkel' && $where != '*') {
           $stmt = $this->connection->prepare("SELECT ".$columns." FROM ".$tabel." WHERE artikelcode='".$where."';");
           $stmt->execute();
       }
            
        
 
        // set the resulting array to associative
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
       
        return $result;
       
    }
    public function selectuser($columns, $tabel, $username, $password) {
        $stmt = $this->connection->prepare("SELECT ".$columns." FROM ".$tabel." WHERE gebruikersnaam='".$username."' AND wachtwoord='".$password."';");
           $stmt->execute();
           
            // set the resulting array to associative
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = $stmt->rowCount();
       
        return $row;
    }
 
    public function update() {
       
    }
 
    public function delete($table, $value) {
       
    }


  
  /**
        * Executes an SQL statement, returning a result set as a PDOStatement object
        *
        * @param string $statement
        * @return PDOStatement
        */
  public function query($query){
            return $this->connection->query($query);
  }
        
        /**
        * Execute query and return all rows in indexed array
        *
        * @param string $statement
        * @return array
        */
        public function queryFetchAll($statement) {
            try{
                return $this->connection->query($statement)->fetchAll();
            }catch(PDOException $e){
                echo 'Connection failed: ' . $e->getMessage();
            }
        }
        
        /**
        * Execute query and return all rows in assoc array
        *
        * @param string $statement
        * @return array
        */
        public function queryFetchAllAssoc($statement) {
            return $this->connection->query($statement)->fetchAll(PDO::FETCH_ASSOC);
        }

        /**
        * Execute query and return one row in assoc array
        *
        * @param string $statement
        * @return array
        */
        public function queryFetchRowAssoc($statement) {
            return $this->connection->query($statement)->fetch(PDO::FETCH_ASSOC);     
        }

        /**
        * Execute query and select one column only 
        *
        * @param string $statement
        * @return mixed
        */
        public function queryFetchColAssoc($statement) {
            return $this->connection->query($statement)->fetchColumn();     
        }
    
        
 
}


