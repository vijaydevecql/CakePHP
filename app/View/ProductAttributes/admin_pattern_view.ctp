<div class="row" style="margin-bottom: 20px;">
            <div class="col-sm-6">
            <h1 class="page-title">
              Pattern Details
            </h1>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="col-sm-6">
                      	<a href="<?php echo $this->webroot;?>admin/patterns" class="btn btn-primary btn-outline">Back </a>
                     </div>
                </div>
            </div>

    </div>
    
	<?php if(!empty($patterns['Pattern']['name'])){  ?>
	<div class="row line_formate">
	<div class="form-group">
		<label class="col-sm-3 control-label">Name : </label>
		<div class="col-sm-9">
			<?php
			echo $patterns['Pattern']['name'];
			?> 
			
		</div>
	</div>
	</div>
	<?php } ?>
	<?php if(!empty($patterns['Pattern']['image'])){  ?>
	<div class="row line_formate">
	<div class="form-group">
		<label class="col-sm-3 control-label">Image : </label>
		<div class="col-sm-9">
			<?php
                                                $image = 'default_product_photo.jpg';
                                                if(count($patterns['Pattern']['image'])){
                                                     
                                                    $path = APP . 'webroot' . DS . 'files' . DS . 'patterns'. DS . $patterns['Pattern']['image'];
                                                    if(file_exists($path)){
                                                        $image = '100x100'.$patterns['Pattern']['image'];
                                                    }
                                                }
                                            ?>
                                            <img src="<?php echo $this->webroot.'files/patterns/'.$image;?>"  class="pattern_photo" style="width: 100px; height: 100px;">
			
		</div>
	</div>
	</div>
	<?php } ?>
	
		<div class="row line_formate">
		<div class="form-group">
		<label class="col-sm-3 control-label">Status : </label>
		<div class="col-sm-9">
			<?php
			echo ($patterns['Pattern']['status'] == 1)?'Active':'Inactive';
			?> 
			
		</div>
		</div>
		</div>
	
<style type="text/css">
	.line_formate {
    /* margin: 10px; */
    padding-top: 6px !important;
    background-Pattern: white !important;
    /* height: 10px; */
    /* display: inline; */
    border-bottom: 1px solid gainsboro !important;
    width: 87% !important;
}
</style>