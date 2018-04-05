<div id="container">
    <div id="header">
        <?php //echo $this->element('header');?>
    </div>

    <div id="left-sidebar">
      <?php //echo $this->element('left-sidebar');?>          
    </div>

    <div id="content">    
        <?php echo $this->Session->flash(); ?>    
        <?php echo $this->fetch('content'); ?>
    </div>

    <div id="right-sidebar">
        <?php //echo $this->element('right-sidebar');?>           
    </div>

    <div id="footer">
           <?php //echo $this->element('footer');?>
    </div>
</div>
