<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   
    <title>Welcome page</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

      <!-- Bootstrap -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
      <!--<link href="bootstrap/css/bootstrap.css" rel="stylesheet">-->
      <style>
    .cus{
    margin:5px;
    min-height: 100px;
    background-color:#D8BFD8;
    text-align:center;
    font-size: large;
  }
  .cus1{
    margin:5px;
    min-height: 600px;
    background-color:#FFF0F5;
    text-align:center;
    font-size: large;
  }
  .thumbnail img{
    height: 250px;
    width:100%;
  }
  a:link {
    color: blue;
    background-color: transparent;
    text-decoration: none;
  }
  
  a:visited {
    color:#900C3F;
    background-color: transparent;
    text-decoration: none;
  }
  
  a:hover {
    color: blue;
    background-color: transparent;
    text-decoration: none;
  }
  
  a:active {
    color:#900C3F;
    background-color: transparent;
    text-decoration: none;
  }
  .well{
    background-color: #7AC5CD;
  }
  
  .jumbotron{
    background-color: #FFDAB9;
  }
  
      </style>
     
</head>
<body style="background-color:powderblue;">
    <div id="app">
       

        <main class="py-4">
            
						 <nav class="navbar navbar-default navbar-inverse bg-warning navbar-fixed-top">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-target="#main" data-toggle="collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>      </div>

                <div class="navbar-collapse collapse" id="main">
                  <ul class="nav navbar-nav ">
                      <li class="active"><a href="index2.php">Home</a></li>
                      <li><a href="#">About</a></li>
                      <li><a href="#">Contact</a></li>
                      <li><a href="index2.php">Take Test</a></li>
                  </ul>

                  <ul class="nav navbar-nav navbar-right">
                      <li class="active"><a href="../forms/login.php">Login</a></li>
                      <li class="active"><a href="../forms/register.php">Register</a></li>
                  </ul>

                  
                </div>
                  
             </nav>
             <div class="modal modal-white" id="loginModal" tabindex="-1">
               <div class="modal-dialog">
                 <div class="modal-content">
                  <div class="modal-header">
                    <button class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Login</h4></div>
                    
                 </div>
                 
                 <div class="modal-body">
                     <form>

                  <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" type="text" placeholder="Name" name=""/>
                  </div>   
                   <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" type="password" placeholder="Password" name=""/>
                  </div> 
                    </form>
                 </div>
                  <div class="modal-footer">
                    <button class="btn btn-primary">Login</button>
                    <button class="btn btn-danger" data-dismiss="modal">Close</button>
                 </div>
               </div>
             </div>
            <div class="container" style="margin-top:180px; margin-left:360px;">
                    <div class="row">
                        <div class="col-md-8 offset-md-4">
                                <div class="well" style="height:350px; text-align:center ">
                                       <h1> <b>WELCOME TO HOME </b></h1>
                                       <h4>This is a Online MCQ Site</h4>
                                       <h5>Please login to take the test</h5>
                                        <br/>
                                        <br/>
                                        <br/>
                                        <br/>
                                        <h5>And register if you are new to this website</h5>
                                        
                                </div>
                        </div>
                    </div>
            </div>
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
</html>