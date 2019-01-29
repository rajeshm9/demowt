<html>
  <head>

<title><?php echo "$title ";?></title>
<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/login.css" rel="stylesheet">

  </head>
<body id="LoginForm">
<div class="container">
<h1 class="form-heading">EasyChecks</h1>
<div class="login-form">
<div class="main-div">
    <div class="panel">
   <h2><?php echo $heading ?></h2>
   <p>Please enter your email and password</p>
   <p>
    <?php if (isset($error)) 
	    {
		    echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
        } 
    ?>
    </p>
   </div>
    <form id="Login" action="<?php echo $actionurl ?>" method="post">

        <div class="form-group">


            <input name="user" type="text" class="form-control" id="inputEmail" placeholder="User Name">

        </div>
        <?php if ($page =='studentlogin') 
            {
                echo '<div class="alert alert-info"><small>Enter Password as [studentno][lastname] in small capital</small></div>';
                $placeholder = '<studentno><lastname>';
            }
            else
                $placeholder ='password'
        ?>
         
        <div class="form-group">

            <input name="password" type="password" class="form-control" id="inputPassword" placeholder="<?php echo $placeholder ?>">

        </div>
        
        <button type="submit" class="btn btn-primary">Login</button>

    </form>
    </div>

</div></div></div>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</body>
</html>
