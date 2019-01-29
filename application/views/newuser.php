<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('header');
?>

 <div class="container-fluid">
 <div class="main_container">
  <div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">

	<div class="x_title">
        <h2>Create New User</h2>
        <div class="clearfix"></div>
    </div>
	
	<?php 
	$str = validation_errors();
	if (strlen($str) > 0 )
	{
		echo '<div class="alert alert-danger" role="alert">'.$str.'</div>';

	}
	?>
	
     <form id="previewFormId" action="newuser"
            method="POST"
            class="form-horizontal form-label-left">  
	
	<div class="form-group  row">
               
			   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="applicationFor">Student Number: <span class="required">*</span>
			   </label>
			   <div class="col-md-6 col-sm-6 col-xs-12">
				   <input type="number"  required
					   placeholder="Enter Student Number" name="studentno"
					   class="form-control col-md-7 col-xs-12" value="<?php echo set_value("studentno")?>">
			   </div>
	</div>
	<div class="form-group  row">
               
		<label class="control-label col-md-3 col-sm-3 col-xs-12" for="applicationFor">Student First Name: <span class="required">*</span>
		</label>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text"  required
				placeholder="Enter Student First Name" name="fname"
				class="form-control col-md-7 col-xs-12" value="<?php echo set_value("name")?>">
		</div>
	</div>

	<div class="form-group  row">
               
			   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="applicationFor">Student Last Name: <span class="required">*</span>
			   </label>
			   <div class="col-md-6 col-sm-6 col-xs-12">
				   <input type="text"  required
					   placeholder="Enter Student Last Name" name="lname"
					   class="form-control col-md-7 col-xs-12" value="<?php echo set_value("lname")?>">
			   </div>
	</div>


	<div class="form-group  row">
               
			   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="applicationFor">Student Grade: <span class="required">*</span>
			   </label>
			   <div class="col-md-6 col-sm-6 col-xs-12">
			   <label class="checkbox-inline"><input checked type="radio" name="grade" value="11">11</label>
			   <label class="checkbox-inline"><input type="radio" value="12" name="grade">12</label>
	
			   </div>
	</div>
	<!---
	<div class="form-group  row">
               
			   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="applicationFor">Mobile: <span class="required">*</span>
			   </label>
			   <div class="col-md-6 col-sm-6 col-xs-12">
				   <input type="phone"  required
					   placeholder="Enter Mobile Number" name="phone"
					   class="form-control col-md-7 col-xs-12" value="<?php echo set_value("phone")?>">
			   </div>
	</div>

	<div class="form-group  row">
               
			   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="applicationFor">Email: <span class="required">*</span>
			   </label>
			   <div class="col-md-6 col-sm-6 col-xs-12">
				   <input type="email"  required
					   placeholder="Enter Email" name="email"
					   class="form-control col-md-7 col-xs-12" value="<?php echo set_value("email")?>">
			   </div>
	</div>
	-->
	<div class="form-group row">
                <div class="col-md-3 col-sm-3 col-xs-3 col-md-offset-3">
                    <button class="btn btn-danger" type="reset"
                        onclick="removeData();">
                        <i class="fa fa-remove"></i> Reset
                    </button>
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-eye"></i>Create New User
                    </button>
                </div>
    </div>


	</form>
	</div>
	</div>
	</div>
	
</div>

<?php $this->load->view('footer'); ?>