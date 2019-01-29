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
	
     <form id="previewFormId" action="newschool"
            method="POST"
            class="form-horizontal form-label-left">  
	
	<div class="form-group  row">
               
			   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="applicationFor">School Name: <span class="required">*</span>
			   </label>
			   <div class="col-md-6 col-sm-6 col-xs-12">
				   <input type="text"  required
					   placeholder="Enter School Name" name="schoolName"
					   class="form-control col-md-7 col-xs-12" value="<?php echo set_value("schoolName")?>">
			   </div>
	</div>
	
	
	<div class="form-group row">
                <div class="col-md-3 col-sm-3 col-xs-3 col-md-offset-3">
                    <button class="btn btn-danger" type="reset"
                        onclick="removeData();">
                        <i class="fa fa-remove"></i> Reset
                    </button>
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-eye"></i>Add New School
                    </button>
                </div>
    </div>


	</form>
	</div>
	</div>
	</div>
	
</div>

<?php $this->load->view('footer'); ?>