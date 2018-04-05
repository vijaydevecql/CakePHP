<div class="row" style="margin-bottom: 20px;">
            <div class="col-sm-6">
            <h1 class="page-title">
              Product Details
            </h1>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="col-sm-6">
                      	<a href="<?php echo $this->webroot;?>admin/products" class="btn btn-default btn-outline">Back </a>
                     </div>
                </div>
            </div>

    </div>
     <?php
		$image = 'default_product_photo.jpg';

		if(count($items['Media'])){
			$path = APP . 'webroot' . DS . 'files' . DS . 'item_other_photo'. DS . $items['Media'][0]['image'];
			if(file_exists($path)){
				$image = '100x100'.$items['Media'][0]['image'];
			}
		} 
	?>	
	<div class="row line_formate">
	<div class="form-group">
	<label class="col-sm-3 control-label">Item Photo: </label>
	<div class="col-sm-9">
		  <img src="<?php echo $this->webroot.'files/item_other_photo/'.$image;?>"  class="user_photo">
	</div>
	</div>
	</div>
	<?php if(!empty($items['Product']['price'])){  ?>
	<div class="row line_formate">
	<div class="form-group">
		<label class="col-sm-3 control-label">Price ($): </label>
		<div class="col-sm-9">
			<?php
			echo $items['Product']['price'];
			?> 
			
		</div>
	</div>
	</div>
	<?php } ?>
	<?php if(!empty($items['Product']['discount'])){  ?>
	<div class="row line_formate">
	<div class="form-group">
		<label class="col-sm-3 control-label">Discount Price ($): </label>
		<div class="col-sm-9">
			<?php
			echo $items['Product']['discount'];
			?> 
			
		</div>
	</div>
	</div>
	<?php } ?>
	<?php if(!empty($items['Product']['description'])){  ?>
	<div class="row line_formate">
	<div class="form-group">
		<label class="col-sm-3 control-label">Description : </label>
		<div class="col-sm-9">
			<?php
			echo ucfirst($items['Product']['description']);
			?> 
			
		</div>
	</div>
	</div>
	<?php } ?>
	<?php if(!empty($items['Collection']['title'])){  ?>
		<div class="row line_formate">
			<div class="form-group">
				<label class="col-sm-3 control-label">Collection : </label>
				<div class="col-sm-9">
					<?php echo ucfirst($items['Collection']['title']); ?>
				</div>
			</div>	
		</div>
	<?php } ?>
	<?php
        $image_cat = 'default_categories.png';
        if(!empty($items['Category']['title'])){
             
            $path = APP . 'webroot' . DS . 'files' . DS . 'categories_photo'. DS . $items['Category']['image'];
            if(file_exists($path)){
                $image_cat = '100x100'.$items['Category']['image'];
            }
        }
    ?>
    <div class="row line_formate">
			<div class="form-group">
				<label class="col-sm-3 control-label">Category : </label>
				<div class="col-sm-9">
					<img src="<?php echo $this->webroot . 'files/categories_photo/' . $image_cat; ?>" class="user_photo">
				</div>
			</div>	
	</div>
<?php if(!empty($items['Color']['id'])){  ?>
		<div class="row line_formate">
			<div class="form-group">
				<label class="col-sm-3 control-label">Color : </label>
				<div class="col-sm-9">
					<?php echo ucfirst($items['Color']['name']); ?>
				</div>
			</div>	
		</div>
	<?php } ?>
	<?php if(!empty($items['Brand']['id'])){  ?>
		<div class="row line_formate">
			<div class="form-group">
				<label class="col-sm-3 control-label">Brand : </label>
				<div class="col-sm-9">
					<?php echo ucfirst($items['Brand']['name']); ?>
				</div>
			</div>	
		</div>
	<?php } ?>
	<?php if(!empty($items['Weave']['id'])){  ?>
		<div class="row line_formate">
			<div class="form-group">
				<label class="col-sm-3 control-label">Weave : </label>
				<div class="col-sm-9">
					<?php echo ucfirst($items['Weave']['name']); ?>
				</div>
			</div>	
		</div>
	<?php } ?>
	<?php if(!empty($items['Pattern']['id'])){  ?>
		<div class="row line_formate">
			<div class="form-group">
				<label class="col-sm-3 control-label">Pattern : </label>
				<div class="col-sm-9">
					<?php echo ucfirst($items['Pattern']['name']); ?>
				</div>
			</div>	
		</div>
	<?php } ?>
    
	
	
		<div class="row line_formate">
			<div class="form-group">
				<label class="col-sm-3 control-label">Stock : </label>
				<div class="col-sm-9">
					<?php echo !empty($items['Product']['quantity'])? $items['Product']['quantity'] : 'Out of stock' ;?>
				</div>
			</div>	
		</div>
	
		<div class="row line_formate">
		<div class="form-group">
		<label class="col-sm-3 control-label">Status : </label>
		<div class="col-sm-9">
			<?php
			echo ($items['Product']['status'] == 1)?'Active':'Inactive';
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