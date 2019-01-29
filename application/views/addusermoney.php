<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('header');
?>

 <div class="container-fluid">
 <div class="main_container">
  <div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">

	<div class="float-left">
		<h3>Add Money</h3>
		<div class="clearfix"></div>
    </div>
	<br>
	<br>
<p>



</p>
 <form id="previewFormId" action="<?php echo site_url("Wallet/addmoney") ?>"
            method="POST"
            class="form-horizontal form-label-left"> 
        
        <div class="form-group  row">
               
               <label class="control-label col-md-3 col-sm-3 col-xs-12" for="applicationFor">Student Name: <span class="required">*</span>
               </label>
               <div class="col-md-6 col-sm-6 col-xs-12">
               <select name="id" style="width:400px" class="selmultiple form-control" name="studentId">
                 <?php foreach ($result as $user): ?>
                  <option value="<?php echo $user->id ?>"><?php echo $user->lname.", ".$user->fname ?></option>
                 <?php endforeach ; ?> 
              </select>
               </div>
        </div>   


        <div class="form-group  row">
               
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="applicationFor">Amount: <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="number" min="1" max="10000" size="6" maxlength="6" required
                placeholder="Enter Amount" name="amount"
                class="form-control col-md-7 col-xs-12" value="<?php echo set_value("studentno")?>">
			      </div>
         </div>    
         <div class="form-group row">
         <label class="control-label col-md-3 col-sm-3 col-xs-12" for="applicationFor">Transaction Type: <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                  <label class="btn btn-secondary active">
                    <input type="radio" name="transType" value="DR" autocomplete="off" checked> Refund
                  </label>
                
                  <label class="btn btn-secondary">
                    <input type="radio" name="transType" value="CR" autocomplete="off">Loan
                  </label>
               </div>
             </div>  
         </div>
         

         <div class="form-group row">
                <div class="col-md-3 col-sm-3 col-xs-3 col-md-offset-3">
                    <button class="btn btn-danger" type="reset"
                        onclick="removeData();">
                        <i class="fa fa-remove"></i> Reset
                    </button>
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-eye"></i>Add
                    </button>
                </div>
    </div>

	   
 </form>            

	
	</div></div></div>	
</div>

<?php $this->load->view('footer'); ?>