<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-5">
                <div class="left_side">
                    <a href="<?php echo $this->webroot.'about'; ?>"><span>ABOUT US</span></a>
                    <a href="<?php echo $this->webroot.'faqs'; ?>"><span>FAQS</span></a>
                    <a href="<?php echo $this->webroot.'PrivacyPolicy'; ?>"><span>PRIVACY POLICY</span></a>
                   
                </div>
            </div>
            <div class="col-md-4 col-sm-3">
                <div class="cntr_logo">
                    <a href="#"><img src="<?php echo $this->webroot; ?>files/default/logo_btm.png"/></a>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="right_side">
                    <ul class="">
                        <?php
						//prx($settings);
						?>
                        <a target="_blank" href="<?php
							echo isset($footer_settings['facebook']) ? $footer_settings['facebook'] : '#';
						?>"><li><img src="<?php echo $this->webroot; ?>files/default/fbb.png" /></li></a>
                        <a target="_blank" href="<?php
							echo isset($footer_settings['twitter']) ? $footer_settings['twitter'] : '#';
						?>"><li><img src="<?php echo $this->webroot; ?>files/default/twb.png" /></li></a>
                        <a target="_blank" href="<?php
							echo isset($footer_settings['youtube']) ? $footer_settings['youtube'] : '#';
						?>"><li><img src="<?php echo $this->webroot; ?>files/default/ytb.png" /></li></a>
                        <a target="_blank" href="<?php
							echo isset($footer_settings['instagram']) ? $footer_settings['instagram'] : '#';
						?>"><li><img src="<?php echo $this->webroot; ?>files/default/inb.png" /></li></a>
                    </ul>
                </div>
            </div>
          
        </div>
    </div>
</footer>
