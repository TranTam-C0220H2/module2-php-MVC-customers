<?php


namespace Controller;


class ViewIndex
{
    function showList()
    {
        include 'View/customers/showList.php';
    }

    function add()
    {
        include 'View/customers/add.php';
    }

    function update()
    {
        include 'View/customers/update.php';
    }

    function delete($id)
    {
        $indexModel = new IndexModel();
        $indexModel->deleteById($id);
        include 'View/customers/showList.php';
    }
}