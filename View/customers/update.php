<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customerController = new \Controller\IndexModel();
    $customerController->updateById();
} else {
    $id = $_REQUEST['id'];
    $customerController = new \Controller\ModelView();
    $customerById = $customerController->getAllById($id);
    $_SESSION['idNew'] = $customerById->customerNumber;
    $_SESSION['name'] = $customerById->customerName;
    $_SESSION['phone'] = $customerById->phone;
    $_SESSION['city'] = $customerById->city;
}
?>
<h4>Update Customer</h4>
<form action="" method="post">
    <div class="form-group">
        <label>ID</label>
        <input type="number" class="form-control" name="idNew" value="<?php echo isset($_SESSION['idNew'])?$_SESSION['idNew']:'' ?>">
        <?php
        if (isset($_SESSION['idNew'])) {
            unset($_SESSION['idNew']);
        }
        ?>
    </div>
    <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" name="name" value="<?php echo isset($_SESSION['name'])?$_SESSION['name']:''?>">
        <?php
        if (isset($_SESSION['name'])) {
            unset($_SESSION['name']);
        }
        ?>
    </div>
    <div class="form-group">
        <label>Phone</label>
        <input type="text" class="form-control" name="phone" value="<?php echo isset($_SESSION['phone'])?$_SESSION['phone']:'' ?>">
        <?php
        if (isset($_SESSION['phone'])) {
            unset($_SESSION['phone']);
        }
        ?>
    </div>
    <div class="form-group">
        <label>Address</label>
        <input type="text" class="form-control" name="city" value="<?php echo isset($_SESSION['city'])?$_SESSION['city']:'' ?>">
        <?php
        if (isset($_SESSION['city'])) {
            unset($_SESSION['city']);
        }
        ?>
    </div>
    <small class="form-text text-muted">We'll never share your email with anyone else.</small>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
