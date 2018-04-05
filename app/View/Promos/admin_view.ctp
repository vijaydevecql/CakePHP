<div class="row" style="margin-bottom: 20px;">
            <div class="col-sm-6">
            <h1 class="page-title">
                <?php echo $Promo['Promo']['name'];  ?> 
            </h1>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="col-sm-6">
                        <a href="<?php echo $this->webroot;?>admin/promos/edit/<?php echo  $Promo['Promo']['id']; ?> " class="btn btn-primary">Edit </a>
                        <a href="<?php echo $this->webroot;?>admin/promos" class="btn btn-default btn-outline">Back </a>
                    </div>
                </div>
            </div>

    </div>
<?php 
if(!empty($Promo['Promo']['name'])){  ?>
    <div class="row line_formate">
        <div class="form-group">
            <label class="col-sm-3 control-label">Promo Name : </label>
            <div class="col-sm-9">
                <?php
                echo ucfirst($Promo['Promo']['name']);
                ?> 
            </div>
        </div>
    </div>
<?php } ?>
<?php if(!empty($Promo['Promo']['value'])){  ?>
    <div class="row line_formate">
        <div class="form-group">
            <label class="col-sm-3 control-label">Amount : </label>
            <div class="col-sm-9">
                <?php echo (isset($Promo['Promo']['value']) && ($Promo['Promo']['value'] == 1)) ? '$'.$Promo['Promo']['value']:$Promo['Promo']['value'].'%'; ?>
            </div>
        </div>
    </div>
<?php } ?>
<?php if(!empty($Promo['Promo']['ene_date'])){  ?>
    <div class="row line_formate">
        <div class="form-group">
            <label class="col-sm-3 control-label">Expire : </label>
            <div class="col-sm-9">
                <?php echo date('M d, Y', $Promo['Promo']['ene_date']); ?>
            </div>
        </div>
    </div>
<?php } ?>
<?php if(!empty($Promo['Promo']['status'])){  ?>
    <div class="row line_formate">
        <div class="form-group">
            <label class="col-sm-3 control-label">Status : </label>
            <div class="col-sm-9">
                <?php
               echo  ($Promo['Promo']['status'] == 1)?'Active':'Inactive'
                ?> 
            </div>
        </div>
    </div>
<?php } ?>
<?php if(!empty($Promo['Promo']['created'])){  ?>
    <div class="row line_formate">
        <div class="form-group">
            <label class="col-sm-3 control-label">Created Date : </label>
            <div class="col-sm-9">
                <?php
                echo date('Y-m-d h:i:s', $Promo['Promo']['created']);
                ?> 
            </div>
        </div>
    </div>
<?php } ?>
<?php if(!empty($Promo['Promo']['modified'])){  ?>
    <div class="row line_formate">
        <div class="form-group">
            <label class="col-sm-3 control-label">Modified Date : </label>
            <div class="col-sm-9">
                <?php
                 echo date('Y-m-d h:i:s', $Promo['Promo']['modified']);
                ?> 
                
            </div>
        </div>
    </div>
<?php } ?>
<style type="text/css">
    .line_formate {
    /* margin: 10px; */
    padding-top: 6px !important;
    background-color: white !important;
    /* height: 10px; */
    /* display: inline; */
    border-bottom: 1px solid gainsboro !important;
    width: 100% !important;
}
</style>