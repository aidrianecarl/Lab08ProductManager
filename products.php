<?php
$page='Products';

include 'includes/products.php'; // products functions
$products = getAllProducts();
?>
<!doctype html>
<html lang="en">
  <?php
    include 'includes/head.php';
  ?>
  <body>
  <?php
    include 'includes/nav.php';
  ?> 

<div class="container-fluid">
  <div class="row">
   <?php
    include 'includes/sidebar.php';
  ?> 

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Products</h1>        
      </div>
      <div class="table-responsive">
        <form>
          <div class="form-row">
            <div class="form-group col-md-3">
              <label for="code">Search</label>
              <input type="text" class="form-control" id="productcode">
              <input type="submit" class="btn btn-primary" value="Search">
            </div>
            </div>
            </form>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Code</th>
              <th>Name</th>              
              <th>Price</th>
              <th>Stocks</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i=0;
            foreach($products as $product){// loop into array
              $i+=1;
              ?>
              <tr>
              <td><?=$i?></td>
              <td><?=$product['p_code']?></td>
              <td><?=$product['p_descript']?></td>
              <td><?=number_format($product['p_price'],2)?></td>
              <td><?=$product['p_qoh']?></td>
              <td >
                <div class="btn-group btn-group-toggle" data-toggle="buttons">                  
                  <label class="btn btn-primary btn-sm">
                    <a href="" class="text-white"><i class="fas fa-pen"></i></a>
                  </label>
                  <label class="btn btn-danger btn-sm">
                    <a href="" class="text-white"><i class="fas fa-trash"></i></a>
                  </label>
                </div>
              </td>
            </tr>
            <?php

            }
            ?>
            <tr>
              <td>1</td>
              <td>11111</td>
              <td>Colgate 250 ml</td>
              <td>25.00</td>
              <td>200</td>
              <td >
                <div class="btn-group btn-group-toggle" data-toggle="buttons">                  
                  <label class="btn btn-primary btn-sm">
                    <a href="" class="text-white"><i class="fas fa-pen"></i></a>
                  </label>
                  <label class="btn btn-danger btn-sm">
                    <a href="" class="text-white"><i class="fas fa-trash"></i></a>
                  </label>
                </div>
              </td>
            </tr>
            <tr>
              <td>2</td>
              <td>22222</td>
              <td>Organic Coconut Aminos</td>
              <td>355.00</td>
              <td>100</td>
              <td >
                <div class="btn-group btn-group-toggle" data-toggle="buttons">                  
                  <label class="btn btn-primary btn-sm">
                    <a href="" class="text-white"><i class="fas fa-pen"></i></a>
                  </label>
                  <label class="btn btn-danger btn-sm">
                    <a href="" class="text-white"><i class="fas fa-trash"></i></a>
                  </label>
                </div>
              </td>
            </tr>
            <tr>
              <td>3</td>
              <td>33333</td>
              <td>Wintermelon Milk Tea 500g</td>
              <td>120</td>
              <td>500</td>
              <td >
                <div class="btn-group btn-group-toggle" data-toggle="buttons">                  
                  <label class="btn btn-primary btn-sm">
                    <a href="" class="text-white"><i class="fas fa-pen"></i></a>
                  </label>
                  <label class="btn btn-danger btn-sm">
                    <a href="" class="text-white"><i class="fas fa-trash"></i></a>
                  </label>
                </div>
              </td>
            </tr>            
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      
        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
        <script src="js/dashboard.js"></script>
  </body>
</html>