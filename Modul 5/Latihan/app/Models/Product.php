<?php

namespace app\Models;

include "app/Config/DatabaseConfig.php";


use app\Config\DatabaseConfig;
use mysqli;

class Product extends DatabaseConfig
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
        $sql = "SELECT * FROM products";
        $result = $this->conn->query($sql);
        $this->conn->close();
        $data = [];
        while ($row = $result->fetch_assoc()){
            $data[] = $row;
        }
        return $data;
    }

    // PROSES MENAMPILAN DATA DE-NGAN ID
    public function findById($id)
    {
        $sql = "SELECT * FROM products WHERE id = ?";
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
        $resepName = $data['product_name'];
        $query = "INSERT TO product (product_name) VALUES(?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $resepName);
        $stmt->execute();
        $this->conn->close(); 
}

//update data dengan id

    public function update($data, $id){
        $productName = $data['product_name'];
        $query = "UPDATE products SET product_name = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        // huruf "s" berarti tipe parameter product_name adalah String dan huruf 'i' berarti parameter id adalah integer
        $stmt->bind_param("si", $productName, $id);
        $stmt->execute();
        $this->conn->close();
}

//delete data dengan id

    public function destroy($id) {
        $query = "DELETE FROM products WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $this->conn->close();
}
}