<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('header');
?>

 <div class="container-fluid">
 <div class="main_container">
  <div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">

	
	<div class="float-left">
		<h3>Event Information</h3>
		<div class="clearfix"></div>
    </div>
	<br>
	<br>
<p>

<?php 
	$str = validation_errors();
	if (strlen($str) > 0 )
	{
		echo '<div class="alert alert-danger" role="alert">'.$str.'</div>';

	}
	?>



<form id="previewFormId" action="addguest"
            method="POST"
            class="form-horizontal form-label-left">  
	<input type="hidden" name="studentId" value="<?php echo $id ?>">

	<div class="form-group  row">
               
			   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="applicationFor">Event Name: <span class="required">*</span>
			   </label>
			   <div class="col-md-6 col-sm-6 col-xs-12">
				   <input type="text"  required
					   placeholder="Enter Event Name" name="event"
					   class="form-control col-md-7 col-xs-12" value="<?php echo set_value("event")?>">
			   </div>
	</div>
  <div class="form-group  row">
               
			   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="applicationFor">Guest Name: <span class="required">*</span>
			   </label>
			   <div class="col-md-6 col-sm-6 col-xs-12">
				   <input type="text"  
					   placeholder="Enter Guest Name" name="guest"
					   class="form-control col-md-7 col-xs-12" value="<?php echo set_value("guest")?>">
			   </div>
	</div>

 

  <div class="form-group row">
                <div class="col-md-3 col-sm-3 col-xs-3 col-md-offset-3">
                   
                    <button type="submit" name="update" class="btn btn-success">
                        <i class="fa fa-eye"></i>Create
                    </button>
                </div>
    </div>


	</form>

	
	</div></div></div>	
</div>

<?php $this->load->view('footer'); ?>