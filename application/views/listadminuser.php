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
		<a href="newuser" class="btn navbar-btn btn-success">Create New Admin User</a>
		<div class="clearfix"></div>
    </div>
	<br>
	<br>

 <table class="table table-responsive-lg " id="stuInfo">
  <thead class="thead-dark">
    <tr>
      
      <th scope="col">User Name</th>
      <th scope="col">School Name</th>
      <th scope="col">Created On</th>
	    <th scopre="col">Details</th>
    </tr>
  </thead>
  <tbody>
	<?php foreach ($result as $user): ?>
	<tr>
      <th scope="row"><?php echo $user->userName?></th>
     
      <td><?php echo $user->schoolName?></td>
      <td><?php echo $user->createdOn?></td>
	  <td>
   

    <a title="Delete Student" href="delete/<?php echo $user->id?>" onclick="return confirm('Are you sure to delete?')"><img src="<?php echo base_url(); ?>/assets/img/remove.png"></a>&nbsp;&nbsp;
    </td>
    </tr>

	<?php endforeach; ?>
   
    
  </tbody>
</table>	

	
	</div></div></div>	
</div>

<?php $this->load->view('footer'); ?>