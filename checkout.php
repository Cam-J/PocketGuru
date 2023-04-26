<?php
include("./header.php");
include("./connect_db.php");

?>
<form action="./process_order.php" method="POST">
  <table class="table table-bordered">
    <thead class="thead-light">
      <tr>
        <th style="width: 300px; font-weight: bold;"><u>Name</u></th>
        <th style="width: 300px; font-weight: bold;"><u>Quantity</u></th>
        <th style="width: 300px; font-weight: bold;"><u>Price</u></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($basket_items as $item): ?>
        <tr>
          <td><?= $item["name"] ?></td>
          <td><?= $item["quantity"] ?></td>
          <td><?= $item["price"] ?></td>
        </tr>
      <?php endforeach ?>
    </tbody>
    <tfoot>
      <tr>
        <td style="font-weight: bold;" colspan=2>Total price:</td>
        <td><?= $total_price ?></td>
      </tr>
    </tfoot>
  </table>
<button class="list-group-item list-group-item-action bg-light" style="color: black; width: 175px;" type="submit">Place Order</button>
</form>

<?php
include("./close_db.php");
include("./footer.php");
?>
