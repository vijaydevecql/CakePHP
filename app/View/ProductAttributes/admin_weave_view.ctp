<div class="row" style="margin-bottom: 20px;">
            <div class="col-sm-6">
            <h1 class="page-title">
              Weave Details
            </h1>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="col-sm-6">
                      	<a href="<?php echo $this->webroot;?>admin/weaves" class="btn btn-primary btn-outline">Back </a>
                     </div>
                </div>
            </div>

    </div>
    
	<?php if(!empty($weaves['Weave']['name'])){  ?>
	<div class="row line_formate">
	<div class="form-group">
		<label class="col-sm-3 control-label">Name : </label>
		<div class="col-sm-9">
			<?php
			echo $weaves['Weave']['name'];
			?> 
			
		</div>
	</div>
	</div>
	<?php } ?>
	
	
	
		<div class="row line_formate">
		<div class="form-group">
		<label class="col-sm-3 control-label">Status : </label>
		<div class="col-sm-9">
			<?php
			echo ($weaves['Weave']['status'] == 1)?'Active':'Inactive';
			?> 
			
		</div>
		</div>
		</div>
	
<style type="text/css">
	.line_formate {
    /* margin: 10px; */
    padding-top: 6px !important;
    background-Weave: white !important;
    /* height: 10px; */
    /* display: inline; */
    border-bottom: 1px solid gainsboro !important;
    width: 87% !important;
}
</style>