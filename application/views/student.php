<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('header');
?>

 <div class="container-fluid">
 <div class="main_container">
  <div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">

	
	<div class="float-left">
		<h3>Student Information</h3>
		<div class="clearfix"></div>
    </div>
	<br>
	<br>
<p>




<button type="button" class="btn btn-primary">
  Total Amount Due : <span class="badge badge-light"><?php echo $result[0]->Loan ?></span>
</button>
<button type="button" class="btn btn-success">
   Total Amount Paid : <span class="badge badge-light"><?php echo $result[0]->Refund ?></span>
</button>
</p>
 
<form id="previewFormId" action="user"
            method="POST"
            class="form-horizontal form-label-left">  
	
	<div class="form-group  row">
               
			   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="applicationFor">Student Phone: <span class="required">*</span>
			   </label>
			   <div class="col-md-6 col-sm-6 col-xs-12">
				   <input type="number"  required
					   placeholder="Enter Phone Number" name="phone"
					   class="form-control col-md-7 col-xs-12" value="<?php echo set_value("phone", $result[0]->phone)?>">
			   </div>
	</div>
  <div class="form-group  row">
               
			   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="applicationFor">Student Email: <span class="required">*</span>
			   </label>
			   <div class="col-md-6 col-sm-6 col-xs-12">
				   <input type="email"  required
					   placeholder="Enter email" name="email"
					   class="form-control col-md-7 col-xs-12" value="<?php echo set_value("email", $result[0]->email)?>">
			   </div>
	</div>

  <div class="form-group  row">
               
               <label class="control-label col-md-3 col-sm-3 col-xs-12" for="applicationFor">Jacket Size: <span class="required">*</span>
               </label>
               <div class="col-md-6 col-sm-6 col-xs-12">
                 <input type="jacket"  required
                   placeholder="Enter Jacket size" name="jacket"
                   class="form-control col-md-7 col-xs-12" value="<?php echo set_value("jacket", $result[0]->jacket)?>">
               </div>
        </div>

  <div class="form-group row">
                <div class="col-md-3 col-sm-3 col-xs-3 col-md-offset-3">
                   
                    <button type="submit" name="update" class="btn btn-success">
                        <i class="fa fa-eye"></i>Update
                    </button>
                </div>
    </div>


	</form>

	
	</div></div></div>	
</div>

<?php $this->load->view('footer'); ?>