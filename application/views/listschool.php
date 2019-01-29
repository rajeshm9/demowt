<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('header');
?>

 <div class="container-fluid">
 <div class="main_container">
  <div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">

	<div class="float-left">
		<a href="newschool" class="btn navbar-btn btn-success">Add New School</a>
		<div class="clearfix"></div>
    </div>
	<br>
	<br>

 <table class="table table-responsive-lg " id="stuInfo">
  <thead class="thead-dark">
    <tr>
      
    
      <th scope="col">School Name</th>
      <th scope="col">Created On</th>
      <th scope="col">Details</th>
    </tr>
  </thead>
  <tbody>
	<?php foreach ($result as $user): ?>
	<tr>
      <th scope="row"><?php echo $user->schoolName?></th>
 
      <td><?php echo $user->createdOn?></td>
	  <td>
   

    <a title="Delete School" href="delete/<?php echo $user->id?>"><img src="<?php echo base_url(); ?>/assets/img/remove.png"></a>&nbsp;&nbsp;
    </td>
    </tr>

	<?php endforeach; ?>
   
    
  </tbody>
</table>	

	
	</div></div></div>	
</div>

<?php $this->load->view('footer'); ?>