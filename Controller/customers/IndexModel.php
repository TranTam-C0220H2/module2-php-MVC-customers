<?php


namespace Controller;


use Library\Customer;
use Model\CustomerDB;

class IndexModel
{
    protected $customerDB;

    public function __construct()
    {
        $this->customerDB = new CustomerDB();
    }

    function add()
    {
        $_SESSION['id'] = $_REQUEST['id'];
        $_SESSION['name'] = $_REQUEST['name'];
        $_SESSION['phone'] = $_REQUEST['phone'];
        $_SESSION['city'] = $_REQUEST['city'];
        $arrayId = $this->customerDB->getAllId();
        if ($_SESSION['id'] != '' && $_SESSION['name'] != '' && $_SESSION['phone'] != '' && $_SESSION['city'] && !in_array($_SESSION['id'], $arrayId)) {
            $customer = new Customer($_SESSION['id'], $_SESSION['name'], $_SESSION['phone'], $_SESSION['city']);
            $this->customerDB->add($customer);
            unset($_SESSION['id']);
            unset($_SESSION['name']);
            unset($_SESSION['phone']);
            unset($_SESSION['city']);
            header('Location: index.php?customers=list');
        } else {
            if (in_array($_SESSION['id'], $arrayId)) {
                unset($_SESSION['id']);
            }
        }
    }

    function updateById()
    {
        $_SESSION['idNew'] = $_REQUEST['idNew'];
        $_SESSION['name'] = $_REQUEST['name'];
        $_SESSION['phone'] = $_REQUEST['phone'];
        $_SESSION['city'] = $_REQUEST['city'];
        $id = $_REQUEST['id'];
        $arrayId = $this->customerDB->getAllId();
        if ($_SESSION['idNew'] != '' && $_SESSION['name'] != '' && $_SESSION['phone'] != '' && $_SESSION['city'] && !in_array($_SESSION['idNew'], $arrayId)) {
            $this->customerDB->updateById($_SESSION['idNew'], $_SESSION['name'], $_SESSION['phone'], $_SESSION['city'], $id);
            unset($_SESSION['idNew']);
            unset($_SESSION['name']);
            unset($_SESSION['phone']);
            unset($_SESSION['city']);
            header('Location: index.php?customers=list');
        } else {
            if (in_array($_SESSION['idNew'], $arrayId)) {
                unset($_SESSION['idNew']);
            }
        }
    }

    function deleteById($id)
    {
        $this->customerDB->deleteById($id);
    }
}