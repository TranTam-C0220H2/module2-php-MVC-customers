<?php
namespace Controller;
use Model\CustomerDB;

class ModelView
{
    protected $customerDB;
    public function __construct()
    {
        $this->customerDB = new CustomerDB();
    }

    function List() {
        return $this->customerDB->getAllDB();
    }

    function getAllById($id) {
        return $this->customerDB->getDateById($id);
    }
}