<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('header');
?>

 <div class="container-fluid">
 <div class="main_container">
  <div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">


   <?php echo $this->session->flashdata('msg'); ?>



	<div class="float-left">
		<a href="newuser" class="btn navbar-btn btn-success">Create New User</a>
		<div class="clearfix"></div>
  </div>
	<br>
	<br>

 <table class="table table-responsive-lg " id="stuInfo">
  <thead class="thead-dark">
    <tr>
      
      <th scope="col">Student Id</th>
      <th scope="col">Student Name</th>
      <th scope="col">Student Grade</th>
      <th scope="col">Total Amount Due</th>
      <th scope="col">Total Amount Paid</th>
      <th scope="col">Remaining Balance</th>
	  <th scopre="col">Details</th>
    </tr>
  </thead>
  <tbody>
	<?php foreach ($result as $student): ?>
	<tr onclick='window.location = "<?php echo site_url() ?>/Wallet/payment/<?php echo $student->id?>"'>
      <th scope="row"><?php echo $student->studentno?></th>
      <td><?php echo $student->lname.", ".$student->fname ?></td>
      <td><?php echo $student->grade ?></td>
      <td><?php echo $student->Loan?></td>
      <td><?php echo $student->Refund?></td>
      <td><?php echo ($student->Loan-$student->Refund)?></td>
	  <td>
    <a title="Payment Details" href="payment/<?php echo $student->id?>"><img src="<?php echo base_url(); ?>/assets/img/payment.png"></a>&nbsp;&nbsp;

    <a  title="Add Payment" href="addmoney/<?php echo $student->id?>"><img src="<?php echo base_url(); ?>/assets/img/addmoney.png"></a>&nbsp;&nbsp;

    <a  title="Edit Student Details" href="edit/<?php echo $student->id?>"><img src="<?php echo base_url(); ?>/assets/img/edit.png"></a>&nbsp;&nbsp;

    <a title="Delete Student" href="delete/<?php echo $student->id?>"><img src="<?php echo base_url(); ?>/assets/img/remove.png" onclick="return confirm('Are you sure to delete?')" ></a>&nbsp;&nbsp;
    </td>
    </tr>

	<?php endforeach; ?>
   
    
  </tbody>
</table>	

	
	</div></div></div>	
</div>

<?php $this->load->view('footer'); ?>