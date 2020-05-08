<?php

namespace Model;

use Library\Customer;
use PDO;

class CustomerDB
{
    protected $conn;

    public function __construct()
    {
        $db = new ConnectDB();
        $conn = $db->connect();
        $this->conn = $conn;
    }

    function getAllDB()
    {
        $sql = 'SELECT * FROM customers;';
        $stmt = $this->conn->query($sql);
        $result = $stmt->fetchAll();
        $arrayCustomers = [];
        foreach ($result as $item) {
            $customer = new Customer($item['customerNumber'], $item['customerName'], $item['phone'], $item['city']);
            array_push($arrayCustomers, $customer);
        }
        return $arrayCustomers;
    }

    function add($customer)
    {
        $id = $customer->getCustomerNumber();
        $name = $customer->getCustomerName();
        $phone = $customer->getCustomerPhone();
        $city = $customer->getCustomerCity();

        $sql = 'INSERT INTO customers (customerNumber,customerName,phone,city) VALUES (?,?,?,?);';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->bindParam(2, $name);
        $stmt->bindParam(3, $phone);
        $stmt->bindParam(4, $city);
        $stmt->execute();
    }

    function getDateById($id)
    {
        $sql = "SELECT * FROM customers WHERE '$id';";
        $stmt = $this->conn->query($sql);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    function deleteById($id)
    {
        $sql = "DELETE FROM customers WHERE customerNumber = '$id';";
        $this->conn->query($sql);
    }

    function updateById($idNew, $name, $phone, $city, $id)
    {
        $sql = "UPDATE customers SET customerNumber = ?, customerName = ?, phone = ?, city = ? WHERE customerNumber = ?;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $idNew);
        $stmt->bindParam(2, $name);
        $stmt->bindParam(3, $phone);
        $stmt->bindParam(4, $city);
        $stmt->bindParam(5, $id);
        $stmt->execute();
    }

    function getAllId()
    {
        $sql = 'SELECT customerNumber FROM customers;';
        $stmt = $this->conn->query($sql);
        $arrayId = [];
        while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
            array_push($arrayId, $row->customerNumber);
        }
        return $arrayId;
    }
}