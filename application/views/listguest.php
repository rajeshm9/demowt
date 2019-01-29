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
		<a href="addguest" class="btn navbar-btn btn-success">Create New Event</a>
		<div class="clearfix"></div>
  </div>
	<br>
	<br>

 <table class="table table-responsive-lg " id="stuInfo">
  <thead class="thead-dark">
    <tr>
      
      <th scope="col">Event Id</th>
      <th scope="col">Event</th>
      <th scope="col">Guest</th>
      <th scope="col">School</th>
      
	  
    </tr>
  </thead>
  <tbody>
	<?php foreach ($result as $e): ?>
	<tr >
      <th scope="row"><?php echo $e->id ?></th>
      
      
      <td><?php echo $e->event ?></td>
      <td><?php echo $e->guest ?></td>
      <td><?php echo $e->schoolName ?></td>
	  
    </tr>

	<?php endforeach; ?>
   
    
  </tbody>
</table>	

	
	</div></div></div>	
</div>

<?php $this->load->view('footer'); ?>