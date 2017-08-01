<div class="navbar navbar-default yamm" role="navigation" id="navbar">
    <div class="container">
        <div class="navbar-header">

            <a class="navbar-brand home" href="<?=base_url()?>pelanggan/home" data-animate-hover="bounce">
                <img src="<?=base_url()?>assets/img/logo-persada.jpg" alt="Obaju logo" class="img-circle hidden-xs" style="width: 139px;width: 80px;">
                <img src="img/logo-small.png" alt="Obaju logo" class="visible-xs"><span class="sr-only">Obaju - go to homepage</span>
            </a>
        </div>
        <!--/.navbar-header -->

        <div class="collapse navbar-collapse" id="navigation">

            <ul class="nav navbar-nav navbar-left">
                <li class="<?php if($this->uri->segment(2) == 'home'){echo'active';}?>"><a href="<?=base_url()?>pelanggan/home">Tour & Travel</a>
                </li>
                
                <?php if($this->session->userdata('login') == TRUE): ?>
                <li class="<?php if($this->uri->segment(2) == 'pemesanan'){echo'active';}?>"><a href="<?=base_url()?>pelanggan/pemesanan">Pemesanan</a>
                </li>
                <li class="<?php if($this->uri->segment(2) == 'pembayaran'){echo'active';}?>"><a href="<?=base_url()?>pelanggan/pembayaran">Pembayaran</a>
                </li>
                <li class="<?php if($this->uri->segment(2) == 'ulasan'){echo'active';}?>"><a href="<?=base_url()?>pelanggan/ulasan">Ulasan</a>
                </li>
                <li class="<?php if($this->uri->segment(2) == 'chat'){echo'active';}?>"><a href="<?=base_url()?>pelanggan/chat">Chat</a>
                </li>
                <?php endif; ?>
                <li class="<?php if($this->uri->segment(2) == 'testimoni'){echo'active';}?>"><a href="<?=base_url()?>pelanggan/testimoni">Testimoni</a>
                </li>
            </ul>

        </div>

        <div class="collapse navbar-collapse" id="navigation" style="float: right!important;">
            <?php if($this->session->userdata('login') == TRUE): ?>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200"><?=$nama?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?=base_url()?>pelanggan/profile"><i class="fa fa-user fa-fw"></i> Edit Profile</a>
                        </li>
                        <!-- <li><a href="#"><i class="fa fa-lock fa-fw"></i> Ubah Password</a>
                        </li> -->
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