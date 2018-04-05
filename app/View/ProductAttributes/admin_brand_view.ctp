<div class="row" style="margin-bottom: 20px;">
            <div class="col-sm-6">
            <h1 class="page-title">
              brand Details
            </h1>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="col-sm-6">
                      	<a href="<?php echo $this->webroot;?>admin/brands" class="btn btn-primary btn-outline">Back </a>
                     </div>
                </div>
            </div>

    </div>
    
	<?php if(!empty($brands['Brand']['name'])){  ?>
	<div class="row line_formate">
	<div class="form-group">
		<label class="col-sm-3 control-label">Name : </label>
		<div class="col-sm-9">
			<?php
			echo $brands['Brand']['name'];
			?> 
			
		</div>
	</div>
	</div>
	<?php } ?>
	<?php if(!empty($brands['Brand']['image'])){  ?>
	<div class="row line_formate">
	<div class="form-group">
		<label class="col-sm-3 control-label">Image : </label>
		<div class="col-sm-9">
			<?php
                                                $image = 'branding1.jpg';
                                                if(count($brands['Brand']['image'])){
                                                     
                                                    $path = APP . 'webroot' . DS . 'files' . DS . 'brands'. DS . $brands['Brand']['image'];
                                                    if(file_exists($path)){
                                                        $image = '100x100'.$brands['Brand']['image'];
                                                    }
                                                }
                                            ?>
                                            <img src="<?php echo $this->webroot.'files/brands/'.$image;?>"  class="brand_photo">
			
		</div>
	</div>
	</div>
	<?php } ?>
	
	
	
		<div class="row line_formate">
		<div class="form-group">
		<label class="col-sm-3 control-label">Status : </label>
		<div class="col-sm-9">
			<?php
			echo ($brands['Brand']['status'] == 1)?'Active':'Inactive';
			?> 
			
		</div>
		</div>
		</div>
	
<style type="text/css">
	.line_formate {
    /* margin: 10px; */
    padding-top: 6px !important;
    background-color: white !important;
    /* height: 10px; */
    /* display: inline; */
    border-bottom: 1px solid gainsboro !important;
    width: 87% !important;
}
</style>