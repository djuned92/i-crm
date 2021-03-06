<div id="top">
    <div class="container">
        <?php if($this->session->userdata('login') == TRUE): ?>
            <div class="col-md-6 offer" data-animate="fadeInDown">
                <a href="#" class="btn btn-success btn-sm" data-animate-hover="shake">
                    PT. Persada Duta Beliton
                </a>
                <?php 
                    $tgl_lahir = date_create($tanggal_lahir);
                    $tgl_lahir = date_format($tgl_lahir,'m-d');
                    $date = date('m-d');
                    if($tgl_lahir == $date):
                ?>
                    <a href="#">Harga special dihari lahir anda</a>
                <?php endif;?>  
            </div>
            
            <div class="col-md-6" data-animate="fadeInDown">
                <ul class="menu">
                    <?php 
                        $tgl_lahir = date_create($tanggal_lahir);
                        $tgl_lahir = date_format($tgl_lahir,'m-d');
                        $date = date('m-d');
                        if($tgl_lahir == $date):
                    ?>
                    <li>
                        <a href="#halo">Happy Birthday <?=$nama?></a>
                    </li>
                    <?php else:?>
                    <li>
                        <a href="#halo">Halo <?=$nama?></a>
                    </li>
                    <?php endif;?>
                </ul>
            </div>
        <?php else:?>
        <div class="col-md-6 offer" data-animate="fadeInDown">
        <a href="#" class="btn btn-success btn-sm" data-animate-hover="shake">
            PT. Persada Duta Beliton
        </a>
        </div>
        <div class="col-md-6" data-animate="fadeInDown">
            <ul class="menu">
                <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                </li>
                <li><a href="<?=base_url()?>pelanggan/register">Register</a>
                </li>
                <li><a href="<?=base_url()?>pelanggan/contact_us">Hubungi Kami</a>
                </li>
            </ul>
        </div>
        <?php endif;?>
    </div>
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
        <div class="modal-dialog modal-sm">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="Login">Login</h4>
                </div>
                <div class="modal-body">
                    <form class="defaultForm" action="<?=base_url()?>auth/users" method="post">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" id="email-modal" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" id="password-modal" placeholder="Password">
                        </div>

                        <p class="text-center">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                        </p>

                    </form>

                    <p class="text-center text-muted">Not registered yet?</p>
                    <p class="text-center text-muted"><a href="<?=base_url()?>pelanggan/register"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>

                </div>
            </div>
        </div>
    </div>

</div>