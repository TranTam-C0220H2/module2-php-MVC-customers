<?php
$customerController = new \Controller\ModelView();
$arrayCustomers = $customerController->List();
?>
<h4>Customers List</h4>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Phone</th>
      <th scope="col">City</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($arrayCustomers as $item): ?>
    <tr>
      <th scope="row"><?php echo $item->getCustomerNumber() ?></th>
      <td><?php echo $item->getCustomerName() ?></td>
      <td><?php echo $item->getCustomerPhone() ?></td>
      <td><?php echo $item->getCustomerCity() ?></td>
      <td><a href="index.php?customers=list&action=update&id=<?php echo $item->getCustomerNumber()?>">Update|</a><a onclick="return confirm('Delete?')" href="index.php?customers=list&action=delete&id=<?php echo $item->getCustomerNumber()?>">Delete</a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
