<div class="row" style="margin-bottom: 20px;">
            <div class="col-sm-6">
            <h1 class="page-title">
                User Details
            </h1>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="col-sm-6">
                        <a href="<?php echo $this->webroot;?>admin/users/edit/<?php echo  $user['User']['id']; ?> " class="btn btn-primary">Edit </a>
                        <a href="<?php echo $this->webroot;?>admin/users/index" class="btn btn-default btn-outline">Back </a>
                    </div>
                </div>
            </div>

    </div>
	<?php if(!empty($user['User']['first_name'])){  ?>
	<div class="row line_formate">
	<div class="form-group">
		<label class="col-sm-3 control-label">First Name : </label>
		<div class="col-sm-9">
			<?php
			echo ucfirst($user['User']['first_name']);
			?> 
			
		</div>
	</div>
	</div>
	<?php } ?>
	<?php if(!empty($user['User']['last_name'])){  ?>
	<div class="row line_formate">
		<div class="form-group">
		<label class="col-sm-3 control-label">Last Name : </label>
		<div class="col-sm-9">
			<?php
			echo ucfirst($user['User']['last_name']);
			?> 
			
		</div>
		</div>
		</div>
	<?php } ?>
	 <?php
		$image = 'default_user.png';
		if(!empty($user['User']['profile_photo'])){

			$path = APP . 'webroot' . DS . 'files' . DS . 'users'. DS . $user['User']['profile_photo'];
			if(file_exists($path)){
			$image = '100x100'.$user['User']['profile_photo'];
			}
		} 
	?>	
	<div class="row line_formate">
	<div class="form-group">
	<label class="col-sm-3 control-label">User Photo: </label>
	<div class="col-sm-9">
		  <img src="<?php echo $this->webroot.'files/users/'.$image;?>"  class="user_photo">
	</div>
	</div>
	</div>
	<?php if(!empty($user['User']['group_id'])){  ?>
		<div class="row line_formate">
		<div class="form-group">
		<label class="col-sm-3 control-label">Type : </label>
		<div class="col-sm-9">
			<?php
			echo ucfirst($user['Group']['name']);
			?> 
			
		</div>
		</div>
		</div>
		<?php } ?>
	<?php if(!empty($user['User']['mobile'])){  ?>
		<div class="row line_formate">
		<div class="form-group">
		<label class="col-sm-3 control-label">Mobile : </label>
		<div class="col-sm-9">
			<?php
			echo ucfirst($user['User']['mobile']);
			?> 
			
		</div>
		</div>	
		</div>
		<?php } ?>
	<?php if(!empty($user['User']['email'])){  ?>
		<div class="row line_formate">
	<div class="form-group">
		<label class="col-sm-3 control-label">Email : </label>
		<div class="col-sm-9">
			<?php
			echo ucfirst($user['User']['email']);
			?> 
			
		</div>

	</div>
	</div>
		<?php } ?>
		
	
		<?php if(!empty($user['User']['gender'])){  ?>
		<div class="row line_formate">
		<div class="form-group">
		<label class="col-sm-3 control-label">Gender : </label>
		<div class="col-sm-9">
			<?php
			echo ucfirst($user['User']['gender']);
			?> 
			
		</div>
		</div>	
		</div>
		<?php } ?>
	
	
		<?php if(!empty($user['User']['city'])){  ?>
		<div class="row line_formate">
		<div class="form-group">
		<label class="col-sm-3 control-label">City : </label>
		<div class="col-sm-9">
			<?php
			echo ucfirst($user['User']['city']);
			?> 
			
		</div>
		</div>
		</div>
		<?php } ?>
		
	

		<?php if(!empty($user['User']['mobile'])){  ?>
		<div class="row line_formate">
		<div class="form-group">
		<label class="col-sm-3 control-label">Country : </label>
		<div class="col-sm-9">
			<?php
			echo ucfirst($user['User']['country']);
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
			echo ($user['User']['status'] == 1)?'Active':'Inactive';
			?> 
			
		</div>
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