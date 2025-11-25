<?php
$page='Orders';

include 'includes/orders.php'; // orders functions

$search = $_GET['q'] ?? '';
$dateFrom = $_GET['date_from'] ?? '';
$dateTo = $_GET['date_to'] ?? '';

$orders = getAllOrders($search, $dateFrom, $dateTo);
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

          <!--  SEARCH + DATE FILTER INLINE -->
            <div class="mb-3">
            <form method="GET" class="row g-2 align-items-end">

                <!-- Search Input -->
                <div class="col-md-4">
                <label for="ordersearch" class="form-label">Search</label>
                <div class="input-group">
                    <input 
                    type="text" 
                    class="form-control" 
                    id="ordersearch" 
                    name="q" 
                    placeholder="Search invoice or customer"
                    value="<?= htmlspecialchars($search) ?>"
                    >
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
                </div>

                <!-- Date From -->
                <div class="col-md-3">
                <label class="form-label">Date From</label>
                <input 
                    type="date" 
                    class="form-control" 
                    name="date_from"
                    value="<?= $dateFrom ?>"
                >
                </div>

                <!-- Date To -->
                <div class="col-md-3">
                <label class="form-label">Date To</label>
                <input 
                    type="date" 
                    class="form-control" 
                    name="date_to"
                    value="<?= $dateTo ?>"
                >
                </div>

                <!-- Filter Button -->
                <div class="col-md-2 d-flex align-items-end">
                <button class="btn btn-secondary w-100" type="submit">Filter Dates</button>
                </div>

            </form>
            </div>


          <!-- TABLE -->
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
              if (empty($orders)) {
                  echo "<tr><td colspan='7' class='text-center text-muted'>No orders found</td></tr>";
              }

              $i = 1;
              foreach ($orders as $ord) {
                $date = strtoupper(date('d M Y', strtotime($ord['inv_date'])));
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

  </body>
</html>
