<nav class="navbar navbar-inverse ">
     <div class="container">
       <div class="navbar-header">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
           <span class="sr-only">Toggle navigation</span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
         </button>
         <a class="navbar-brand" href="#">Shopp</a>
       </div>
       <div id="navbar" class="navbar-collapse collapse">
         <ul id="navbar-element" class="nav navbar-nav">
              <li class="active"><a href="index.php">Home</a></li>
              <li><a href="#about">About</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories <span class="caret"></span></a>
                <ul id="dropdown-menu" class="dropdown-menu">
                <!-- Menu dynamic -->
                </ul>
              </li>

         </ul>
         <form method="post" action="searchitemslist.php" class="navbar-form navbar-left">
           <div class="form-group">
             <input type="text" placeholder="Search.." name="criteria" class="form-control">
           </div>
           <input type="submit" name="submit" value="Search" class="btn btn-success">

         </form>
         <ul class="nav navbar-nav navbar-right">

           <li class="active"><a href="#"><span class=" glyphicon glyphicon-shopping-cart "  ></span> &nbsp; Cart </a></li>
         </ul>

       </div><!--/.navbar-collapse -->
     </div>
   </nav>
