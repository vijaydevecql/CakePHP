<?php $pages_data = $this->params->params; ?>
<header style="position:relative;" <?php echo ($pages_data['controller'] == 'homes' && $pages_data['action'] == 'index')?'class="header_fixed"':''; ?> >
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="top_sub_nav">
                    <ul class="nav navbar-nav navbar-right">
                        <?php if(isset($_user_data) && count($_user_data)){ ?>
						<!--
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo ucfirst($_user_data['first_name']); ?><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo $this->webroot.'account' ?>">My Account</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="<?php echo $this->webroot.'logout' ?>">Log Out</a></li>
                            </ul>
                        </li>
						-->
						<li><a href="<?php echo $this->webroot.'account' ?>">My Account</a></li>
						<li><a href="<?php echo $this->webroot.'logout' ?>">Log Out</a></li>

                        <?php } else { ?>
                        <!-- <li>
                            <a href="<?php echo $this->webroot.'sign_up'; ?>"> Sign Up </a> 
                        </li>
						-->
                        <li>
                            <a href="<?php echo $this->webroot.'login'; ?>"> My Account </a>
                        </li>
                        <?php } ?>

                        <li ><a href="#" class="white_c"> | </a></li>
                       
                        <li>

                            <a href="<?php echo $this->webroot.'viewCart'; ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i> 
                            <span class="beges" id="cart"><?php echo !empty($cart_count)?$cart_count:0; ?></span></a>
                        </li>
                       
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container"> 
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-files/default">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?php echo $this->webroot; ?>"><img src="<?php echo $this->webroot; ?>files/default/logo.png" ></a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                      <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo $this->webroot; ?>" class="<?php echo ($pages_data['controller'] == 'homes' && $pages_data['action'] == 'index')?'active':''?>">Home</a></li>
                        <li><a href="<?php echo $this->webroot.'about' ?>" class="<?php echo ($pages_data['controller'] == 'abouts' && $pages_data['action'] == 'index')?'active':''?>">About</a></li>
                        <li><a href="<?php echo ($pages_data['controller'] != 'homes')?$this->webroot.'#collection_section':'javascript:void(0);'?>" id="Collection">Collection</a></li>
                       <!--  <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="white_line">|</span> <img src="<?php echo $this->webroot; ?>files/default/flag.png"> <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="#"><img src="<?php echo $this->webroot; ?>files/default/aus.png"></a></li>
                            <li><a href="#"><img src="<?php echo $this->webroot; ?>files/default/eng.png"></a></li>
                            <li><a href="#"><img src="<?php echo $this->webroot; ?>files/default/egv.png"></a></li>
                        </ul>
                    </li> -->
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</div>
</div>
</div>
</header>