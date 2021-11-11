<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Shopp</title>
    <?php  include 'common/resources.php' ?>
  </head>
  <body>
  <div class="navbar-wrapper">

    <div class="containder">
      <?php   include_once 'menu.php'; ?>

      <div class="container marketing">
        <div class="row">
        
          <?php include_once 'showcart.php' ?>
          
        </div>
      </div>


    </div>
  </div>

  </body>
  <?php  include 'common/scripts.php' ?>
  <script src="static/js/main.js" ></script>
  <script src="static/js/cart.js" ></script>
</html>
