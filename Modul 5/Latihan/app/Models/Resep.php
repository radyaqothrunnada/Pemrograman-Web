<?php

namespace app\Models;

include "app/Config/DatabaseConfig.php";


use app\Config\DatabaseConfig;
use mysqli;

class Resep extends DatabaseConfig
{
    public $conn;

    public function __construct()
    {
        //connect ke database mysql
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->database_name, $this->port);
        //check connection
        if ($this->conn->connect_error){
            die("Connection failed: ". $this->conn->connect_error);

        }
    }

    // PROSES MENAMPILKAN SEMUA DATA
    public function findAll(){
        $sql = "SELECT * FROM menu";
        $result = $this->conn->query($sql);
        $this->conn->close();
        $data = [];
        while ($row = $result->fetch_assoc()){
            $data[] = $row;
        }
        return $data;
    }

    // PROSES MENAMPILAN DATA DE-NGAN ID
    public function findById($id){
    $sql = "SELECT * FROM menu WHERE id = ?";
    $stmt = $this->conn->prepare($sql); 
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $this->conn->close();
    $data =[];
    while ($row = $result-> fetch_assoc()){
        $data[] =$row;
    }
    return $data;
}

// PROSES INSERT DATA
public function create($data){
  $resepName = $data['resep_name'];
  $query = "INSERT TO menu (resep_name) VALUES(?)";
  $stmt = $this->conn->prepare($query);
  $stmt->bind_param("s", $resepName);
  $stmt->execute();
  $this->conn->close(); 
}

//update data dengan id

public function update($data, $id){
    $productName = $data['resep_name'];
    $query = "UPDATE menu SET resep_name = ? WHERE id = ?";
    $stmt = $this->conn->prepare($query);
    // huruf "s" berarti tipe parameter product_name adalah String dan huruf 'i' berarti parameter id adalah integer
    $stmt->bind_param("si", $resepName, $id);
    $stmt->execute();
    $this->conn->close();
}

//delete data dengan id

public function destroy() {
    $query = "DELETE FROM menu WHERE id = ?";
    $stmt = $this->conn->prepare($query);
    $r = $stmt->bind_param("i", $id);
    $stmt->execute();
    var_dump($r);
    die;
    $this->conn->close();
}
}