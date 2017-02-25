<div id="content">
    <div class="container">

        <div class="col-md-12">

            <ul class="breadcrumb">
                <li><a href="<?=base_url()?>pelanggan/home">Home</a>
                </li>
                <li>New account / Sign in</li>
            </ul>

        </div>

        <div class="col-md-6">
            <div class="box">
                <h1>New account</h1>

                <p class="lead">Not our registered customer yet?</p>
                <p>With registration with us new world of fashion, fantastic discounts and much more opens to you! The whole process will not take you more than a minute!</p>
                <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>

                <hr>

                <form class="data_pelanggan" action="<?=base_url()?>pelanggan/register/add" method="post">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Username">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>

                    <div class="form-group">
                        <label>Ulangi Password</label>
                        <input type="password" name="ulangi_password" class="form-control" placeholder="Ulangi Password">
                    </div>

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="ex: contoh@gmail.com">
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" name="alamat" rows="3" placeholder="Alamat"></textarea>
                    </div>

                   <div class="form-group">
                        <label>Tempat, Tanggal Lahir</label>
                        <div class="row">
                            <div class="col-md-12">  
                                    <div class="col-md-6">
                                        <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="date" name="tanggal_lahir" class="form-control">
                                    </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <div class="row">
                            <div class="col-md-12">  
                                <div class="col-md-9">
                                  <label class="radio-inline">
                                    <input type="radio" name="jenis_kelamin" value="Laki - Laki">
                                    Laki - Laki
                                  </label>
                                  <label class="radio-inline">
                                    <input type="radio" name="jenis_kelamin" value="Perempuan">
                                    Perempuan
                                  </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>No telp</label>
                        <input type="text" name="no_telp" class="form-control" placeholder="No Telp">
                    </div>
                    
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Register</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-6">
            <div class="box">
                <h1>Login</h1>

                <p class="lead">Already our customer?</p>
                <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies
                    mi vitae est. Mauris placerat eleifend leo.</p>

                <hr>
                <div>
                    <?php if ($this->session->flashdata('username_not_register')) : ?>
                        <strong>
                            <span class='help-block'><?=$this->session->flashdata('username_not_register')?></span>
                        </strong>
                    <?php elseif ($this->session->flashdata('wrong_password')) : ?>
                        <strong>
                            <span class='help-block'><?=$this->session->flashdata('wrong_password')?></span>
                        </strong>
                    <?php elseif ($this->session->flashdata('status_tidak_aktif')) : ?>
                        <strong>
                            <span class='help-block'><?=$this->session->flashdata('status_tidak_aktif')?></span>
                        </strong>
                    <?php endif; ?>
                </div>

                <form class="defaultForm" action="<?=base_url()?>auth/users" method="POST">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                    </div>
                </form>
            </div>
        </div>


    </div>
    <!-- /.container -->
</div>