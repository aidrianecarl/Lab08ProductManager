<?php
$page='Orders';

include 'includes/orders.php'; // orders functions

$orders = getAllOrders(); 
?>
<!doctype html>
<html lang="en">
  <?php include 'includes/head.php'; ?>

  <body>
    <?php include 'includes/nav.php'; ?> 

    <div class="container-fluid">
      <div class="row">

        <?php include 'includes/sidebar.php'; ?> 

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Orders</h1>
          </div>

          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>#</th>
                <th>Invoice #</th>
                <th>Customer Name</th>
                <th>Date</th>
                <th>Sub Total</th>
                <th>Tax</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 1;
              foreach ($orders as $ord) {

                // Format Date: dd MMM yyyy (11 NOV 2025)
                $date = date('d M Y', strtotime($ord['inv_date']));
                $date = strtoupper($date); // make "Nov" → "NOV" = naka upper case

                // Customers Full Name
                $fullname = $ord['cus_fname'] . " " . $ord['cus_lname'];
              ?>
                <tr>
                  <td><?= $i++ ?></td>
                  <td><?= $ord['inv_number'] ?></td>
                  <td><?= $fullname ?></td>
                  <td><?= $date ?></td>
                  <td><?= number_format($ord['inv_subtotal'], 2) ?></td>
                  <td><?= number_format($ord['inv_tax'], 2) ?></td>
                  <td><?= number_format($ord['inv_total'], 2) ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>

        </main>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
    <script src="js/dashboard.js"></script>
  </body>
</html>
