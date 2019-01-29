<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo "$title  $page";?></title>
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.17/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.2.6/css/select.dataTables.min.css" rel="stylesheet">
    <link href="https://editor.datatables.net/extensions/Editor/css/editor.dataTables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

  </head>
  <body>
  <header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">EasyChecks&nbsp;&nbsp;<img src="<?php echo base_url()?>assets/img/wallet.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        
        <?php if ($userType == 'S') : ?>
          <li class="nav-item <?php echo ($page == 'user' ? 'active':'') ?>">
            <a class="nav-link" href="<?php echo site_url("Wallet/user") ?>">Users</a>
          </li>
          <li class="nav-item <?php echo ($page == 'money' ? 'active':'') ?>">
            <a class="nav-link" href="<?php echo site_url("Wallet/addusermoney") ?>">Add Payment</a>
          </li>
          <!--<li class="nav-item <?php echo ($page == 'loan' ? 'active':'') ?> ">
            <a class="nav-link" href="loan">Update Loan Refund</a>
          </li>
          <li class="nav-item <?php echo ($page == 'balance' ? 'active':'') ?>">
            <a class="nav-link" href="balance">View Balance Status</a>
          </li>-->
        <?php elseif ($userType =='U') : ?>

        <li class="nav-item <?php echo ($page == 'user' ? 'active':'') ?>">
            <a class="nav-link" href="<?php echo site_url("Student/user") ?>">Home</a>
          </li>
          <li class="nav-item <?php echo ($page == 'money' ? 'active':'') ?>">
            <a class="nav-link" href="<?php echo site_url("Student/payment") ?>">Payment History</a>
          </li>
          <li class="nav-item <?php echo ($page == 'guest' ? 'active':'') ?>">
            <a class="nav-link" href="<?php echo site_url("Student/guest") ?>">Add a Prom Guest</a>
          </li>
        <?php else : ?>
           <li class="nav-item <?php echo ($page == 'user' ? 'active':'') ?>">
            <a class="nav-link" href="<?php echo site_url("Admin/") ?>">School Admin</a>
          </li>
          <li class="nav-item <?php echo ($page == 'school' ? 'active':'') ?> ">
            <a class="nav-link" href="<?php echo site_url("Admin/school") ?>">Schools</a>
          </li>
          <!--li class="nav-item <?php echo ($page == 'balance' ? 'active':'') ?>">
            <a class="nav-link" href="balance">View Balance Status</a>
          </li>-->
        <?php endif ?>
      </ul>
     
    </div>


    <div class="pull-right">
        <ul class="nav navbar-nav">
            <?php if ($userType == 'S'): ?>
              <li class="nav-item">
                <button class="btn navbar-btn btn-primary"><?php echo $schoolName ?></button>&nbsp;&nbsp;
              </li>
            <?php elseif ($userType == 'U') : ?>
              <li class="nav-item">
                <button class="btn navbar-btn btn-primary"><?php echo $displayname ?></button>&nbsp;&nbsp;
              </li>
            <?php endif ?>
            <li class="nav-item">
              <a href="<?php 
              if ($userType =='U')
                echo site_url("Student/Logout") ;
              else
                echo site_url("Wallet/Logout") ;
              ?>" class="btn navbar-btn btn-danger">Log Out</a>
            </li>
        </ul>     
   </div>
  </nav>
</header>  
<br>
<br>
<br>
<br>