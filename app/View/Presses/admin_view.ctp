<div class="row" style="margin-bottom: 20px;">
            <div class="col-sm-6">
            <h1 class="page-title">
              Press Details
            </h1>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="col-sm-6">
                      	<a href="<?php echo $this->webroot;?>admin/presses" class="btn btn-default btn-outline"> Back </a>
                     </div>
                </div>
            </div>

    </div>
     <?php
		$image = 'default_image.png';

		if(strlen(trim($press['Press']['image']))){
			$path = APP . 'webroot' . DS . 'files' . DS . 'press_photo'. DS . $press['Press']['image'];
			if(file_exists($path)){
				$image = '100x100'.$press['Press']['image'];
			}
		} 
	?>	
	<div class="row line_formate">
	<div class="form-group">
	<label class="col-sm-3 control-label">Press Photo: </label>
	<div class="col-sm-9">
		  <img src="<?php echo $this->webroot.'files/press_photo/'.$image;?>"  class="user_photo">
	</div>
	</div>
	</div>
	<?php if(strlen(trim($press['Press']['title']))){  ?>
	<div class="row line_formate">
	<div class="form-group">
		<label class="col-sm-3 control-label">Title : </label>
		<div class="col-sm-9">
			<?php
			echo ucfirst($press['Press']['title']);
			?> 
			
		</div>
	</div>
	</div>
	<?php } ?>
	
	<?php if(strlen(trim($press['Press']['description']))){  ?>
	<div class="row line_formate">
	<div class="form-group">
		<label class="col-sm-3 control-label">Description : </label>
		<div class="col-sm-9">
			<?php
			echo ucfirst($press['Press']['description']);
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
			echo ($press['Press']['status'] == 1)?'Active':'Inactive';
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