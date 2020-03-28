
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title> Sign in </title>
     <?php  include 'common/resources.php' ?>
   </head>
   <body>
    <div class="container">
      <div class="col-md-4 col-sm-4">

        <form class="" action="validateuser.php" method="post" >
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

          <input type="submit" class="btn btn-primary" value="Login">

        </form>

      </div>
      </div>

 
   </body>
 </html>
