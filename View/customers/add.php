<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customerController = new \Controller\IndexModel();
    $customerController->add();
}
?>
<h4>Add Customer</h4>
<form action="" method="post">
    <div class="form-group">
        <label>ID</label>
        <input type="number" class="form-control" name="id"
               value="<?php echo isset($_SESSION['id']) ? $_SESSION['id'] : '' ?>">
        <small class="form-text text-muted">
        <?php
        if (isset($_SESSION['id'])) {
            unset($_SESSION['id']);
        } else {
            echo '*Id must not exist yet';
        }
        ?>
        </small>
    </div>
    <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" name="name"
               value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : '' ?>">
        <?php
        if (isset($_SESSION['name'])) {
            unset($_SESSION['name']);
        }
        ?>
    </div>
    <div class="form-group">
        <label>Phone</label>
        <input type="text" class="form-control" name="phone"
               value="<?php echo isset($_SESSION['phone']) ? $_SESSION['phone'] : '' ?>">
        <?php
        if (isset($_SESSION['phone'])) {
            unset($_SESSION['phone']);
        }
        ?>
    </div>
    <div class="form-group">
        <label>Address</label>
        <input type="text" class="form-control" name="city"
               value="<?php echo isset($_SESSION['city']) ? $_SESSION['city'] : '' ?>">
        <?php
        if (isset($_SESSION['city'])) {
            unset($_SESSION['city']);
        }
        ?>
    </div>
    <small class="form-text text-muted">*Information isn't empty</small>
    <small class="form-text text-muted">We'll never share your email with anyone else.</small>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>