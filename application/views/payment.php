<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('header');
?>

 <div class="container-fluid">
 <div class="main_container">
  <div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">

		<div class="float-left">
		<h3>Payment History</h3>
		<div class="clearfix"></div>
    </div>
	<br>
	<br>

 <table class="table table-responsive-lg ">
  <thead class="thead-dark">
    <tr>
      
      <th scope="col">Student Id</th>
      <th scope="col">Student Name</th>
      <th scope="col">Total Amount Paid</th>
	    <th scopre="col">Date</th>
    </tr>
  </thead>
  <tbody>
  <?php 
        $dr = 0;
        $cr = 0;
        foreach ($result as $txn):   
        if ($txn->transType =='DR'): 
          $dr +=$txn->amount
  ?>
	<tr>
      <th scope="row"><?php echo $txn->studentno ?></th>
      <td><?php echo $txn->fname?></td>
      <td><?php echo $txn->amount?></td>
      <td><?php echo $txn->txnDate?></td>

    
  </tr>
        <?php else: 
           $cr += $txn->amount;
        endif; 
  endforeach;?>
	
  <tr>
      <th scope="row">Total</th>
      <td></td>
      <th><?php echo $dr?></th>
      <td></td>
  
  </tr>

  <tr style="background-color:grey">
      <th scope="row">Remaining Balance</th>
      <td></td>
      <th><?php echo ($cr-$dr)?></th>
      <td></td>
  
  </tr>
    
  </tbody>
</table>	

	
	</div></div></div>	
</div>

<?php $this->load->view('footer'); ?>