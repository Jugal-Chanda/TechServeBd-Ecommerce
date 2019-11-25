<div class="row" id="print_area">
  <?php spacer(30); ?>
  <div class="col-md-4 col-sm-0"></div>
  <div class="col-md-4 col-sm-12">

    <div class="header text-center">
      <h3>Thanks For Shoping With Us</h3>
    </div>
    <hr>
    <p>Hi <?php echo $user->name; ?><p>
    <p>Just to let you know — we've received your order #
      <?php echo $_GET['orderno']; ?>,
      and it is now being processed</p>
    <h5 style="color:red;" class="text-center">
      [Order : # <?php echo $_GET['orderno']; ?>]
      Date:  <?php echo $tmp_order->order_date(); ?>
    </h5>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">Product Name</th>
          <th scope="col" class="text-center">Quantity</th>
          <th scope="col" class="text-center">Price(Tk.)</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($orders as $order) {
          $product = Product::find_by_id($order->product_id);
        ?>
        <tr>
          <td> <?php echo $product->name; ?></td>
          <td class="text-center"> <?php echo $order->quantity; ?></td>
          <td class="text-center"> <?php echo $order->price; ?></td>
        </tr>
        <?php } ?>
        <tr>
          <td colspan="2">SobTotal:</td>
          <td class="text-center">
            <?php
            $total_order_price = Order::total_order_price($_GET['orderno']);
            echo $total_order_price->order_total_price;
            ?>
          </td>
        </tr>
        <tr>
          <td colspan="2">Shipping:</td>
          <td class="text-center">
            <?php
            echo "0";
            ?>
          </td>
        </tr>
        <tr>
          <td colspan="2">Payment Method</td>
          <td class="text-center">
            <?php
            echo $tmp_order->delivery_method;
            ?>
          </td>
        </tr>
        <tr>
          <td colspan="2">Total</td>
          <td class="text-center">
            <?php
              echo $total_order_price->order_total_price;;
            ?>
          </td>
        </tr>
      </tbody>
    </table>

    <?php spacer(30); ?>
    <h5 style="color:red;">Billing Address</h5>
    <hr>
    <h5><?php echo $user->name; ?></h5>
    <h6><?php echo $tmp_order->delivery_address; ?></h6>
    <h6><?php echo $user->phone; ?></h6>
    <hr>
    <?php spacer(20); ?>
    <i>Thanks.</i>


  </div>
</div>
