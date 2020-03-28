<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Sign up </title>
    <?php  include 'common/resources.php' ?>
  </head>
  <body>
   <div class="container">
     <div class="col-md-4 col-sm-4">

       <h2>Creating a New Account</h2>
       <br>
       <h4>Enter your information</h4>
       <br>
       <form class="" action="addCustomer.php" method="post" onsubmit="return validate(this);">
         <div class="form-group">
           <label for="exampleInputEmail1">Email address</label>
           <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email">
           <span id="emailmsg"></span>
         </div>
         <div class="form-group">
           <label for="password">Password</label>
           <input type="password" class="form-control" name="password" id="password" placeholder="Password">
           <span id="passwordmsg"></span>
         </div>
         <div class="form-group">
           <label for="retype">Retype Password</label>
           <input type="password" class="form-control" id="retype" name="repassword" placeholder="Password">
           <span id="repasswdmsg"></span>

         </div>
         <div class="form-group">
           <label for="name">Complete Name</label>
           <input type="text" class="form-control" id="name" name="complete_name" placeholder="Complete Name">
           <span id="usrmsg"></span>
         </div>
         <div class="form-group">
           <label for="address1">Adress 1</label>
           <input type="text" class="form-control" id="address1" name="address1" placeholder="Adress 1">
         </div>
         <div class="form-group">
           <label for="address2">Adress 2</label>
           <input type="text" class="form-control" id="address2" name="address2" placeholder="Adress 2">
         </div>
         <div class="form-group">
           <label for="Country">Country</label>
           <input type="text" class="form-control" id="Country" name="country" placeholder="Country">
         </div>
         <div class="form-group">
           <label for="State">State</label>
           <input type="text" class="form-control" id="State" name="state" placeholder="State">
         </div>
         <div class="form-group">
           <label for="City">City</label>
           <input type="text" class="form-control" id="City" name="city" placeholder="City">
         </div>
         <div class="form-group">
           <label for="ZipCode">Zip Code</label>
           <input type="text" class="form-control" id="ZipCode" name="zip_code" placeholder="Zip Code">
         </div>
         <div class="form-group">
           <label for="PhoneNo">Phone No</label>
           <input type="text" class="form-control" id="PhoneNo" name="phone_no" placeholder="Phone No">
         </div>


         <button type="submit" class="btn btn-primary">Submit</button>
         <button class="btn btn-warning">Canel</button>
       </form>

     </div>
     </div>


     <?php  include 'common/scripts.php' ?>
  </body>
</html>
