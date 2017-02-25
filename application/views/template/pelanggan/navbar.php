<div class="navbar navbar-default yamm" role="navigation" id="navbar">
    <div class="container">
        <div class="navbar-header">

            <a class="navbar-brand home" href="index.html" data-animate-hover="bounce">
                <img src="img/logo.png" alt="Obaju logo" class="hidden-xs">
                <img src="img/logo-small.png" alt="Obaju logo" class="visible-xs"><span class="sr-only">Obaju - go to homepage</span>
            </a>
            <div class="navbar-buttons">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="fa fa-align-justify"></i>
                </button>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle search</span>
                    <i class="fa fa-search"></i>
                </button>
                <a class="btn btn-default navbar-toggle" href="basket.html">
                    <i class="fa fa-shopping-cart"></i>  <span class="hidden-xs">3 items in cart</span>
                </a>
            </div>
        </div>
        <!--/.navbar-header -->

        <div class="collapse navbar-collapse" id="navigation">

            <ul class="nav navbar-nav navbar-left">
                <li class="<?php if($this->uri->segment(2) == 'home'){echo'active';}?>"><a href="<?=base_url()?>pelanggan/home">Tour & Travel</a>
                </li>
                
                <?php if($this->session->userdata('login') == TRUE): ?>
                <li class="<?php if($this->uri->segment(2) == 'pemesanan'){echo'active';}?>"><a href="<?=base_url()?>pelanggan/pemesanan">Pemesanan</a>
                </li>
                <li class="<?php if($this->uri->segment(2) == 'kritik_saran'){echo'active';}?>"><a href="<?=base_url()?>pelanggan/kritik_saran">Kritik & Saran</a>
                </li>
                <?php endif; ?>
            </ul>

            <?php if($this->session->userdata('login') == TRUE): ?>
            <ul class="nav navbar-nav" style="margin-left: 400px;">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200"><?=$nama?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?=base_url()?>pelanggan/profile"><i class="fa fa-user fa-fw"></i> Edit Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-lock fa-fw"></i> Ubah Password</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?=base_url()?>auth/users/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <?php endif;?>

        </div>
        <!--/.nav-collapse -->

        <div class="navbar-buttons">

            <!-- <div class="navbar-collapse collapse right" id="basket-overview">
                <a href="basket.html" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm">3 items in cart</span></a>
            </div> -->
            <!--/.nav-collapse -->

            <!-- <div class="navbar-collapse collapse right" id="search-not-mobile">
                <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle search</span>
                    <i class="fa fa-search"></i>
                </button>
            </div> -->

        </div>

        <div class="collapse clearfix" id="search">

            <!-- <form class="navbar-form" role="search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search">
                    <span class="input-group-btn">

            		  <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

            	    </span>
                </div>
            </form> -->

        </div>
        <!--/.nav-collapse -->

    </div>
    <!-- /.container -->
</div>