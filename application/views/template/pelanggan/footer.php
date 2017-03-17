<div id="footer" data-animate="fadeInUp">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <h4>Pages</h4>

                <ul>
                    <li><a href="<?=base_url()?>pelanggan/about_us">Tentang Kami</a>
                    </li>
                    <li><a href="<?=base_url()?>pelanggan/faq">FAQ</a>
                    </li>
                    <li><a href="<?=base_url()?>pelanggan/contact_us">Hubungi Kami</a>
                    </li>
                </ul>


                <?php if($this->session->userdata('login') == FALSE):?>
                
                <hr>

                <h4>User section</h4>

                    <ul>
                        <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                        </li>
                        <li><a href="<?=base_url()?>pelanggan/register">Regiter</a>
                        </li>
                    </ul>
                <?php endif?>

                <hr class="hidden-md hidden-lg hidden-sm">

            </div>
            <!-- /.col-md-3 -->

            <div class="col-md-3 col-sm-6">

                <h4>Anda dapat menemukan kami</h4>

                <p class="text-muted">Persada Holiday
                    <br>Jl. Radio Dalam 30,
                    <br>Jakarta Selatan 12240
                </p>

                <a href="<?=base_url()?>pelanggan/contact_us">Kehalaman Hubungi Kami</a>

                <hr class="hidden-md hidden-lg">

            </div>
            <!-- /.col-md-3 -->


            <div class="col-md-6 col-sm-6">
                <h4>Maps</h4>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.0398108616255!2d106.78943371424154!3d-6.258486395469975!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f10a66c56d85%3A0x17883cab035ea47c!2sJl.+Bri+Radio+Dalam+No.30%2C+Gandaria+Utara%2C+Kby.+Baru%2C+Kota+Jakarta+Selatan%2C+DKI+Jakarta+12140%2C+Indonesia!5e0!3m2!1sen!2s!4v1489133220014" width="550" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>           
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
</div>