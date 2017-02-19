<div id="content">
    <div class="container">

        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="#">Home</a>
                </li>
                <li><a href="#">Ladies</a>
                </li>
                <li><a href="#">Tops</a>
                </li>
                <li>White Blouse Armani</li>
            </ul>
        </div>

        <div class="col-md-12">

            <div class="row" id="productMain">
                <div class="col-sm-6">
                    <div id="mainImage">
                        <img src="<?=base_url()?>assets/img/<?=$detail_wisata->gambar_wisata?>" alt="" class="img-responsive">
                    </div>

                    <div class="ribbon sale">
                        <div class="theribbon">SALE</div>
                        <div class="ribbon-background"></div>
                    </div>
                    <!-- /.ribbon -->

                    <div class="ribbon new">
                        <div class="theribbon">NEW</div>
                        <div class="ribbon-background"></div>
                    </div>
                    <!-- /.ribbon -->

                </div>
                <div class="col-sm-6">
                    <div class="box">
                        <h1 class="text-center"><?=$detail_wisata->nama_wisata?></h1>
                        <p class="price">
                            <?php 
                                    $promosi = $this->promosi->check_promosi($detail_wisata->id_paket_wisata)->row();
                                    $date = date("Y-m-d");
                                    if($date == $promosi->tgl_promosi)
                                    {
                                        $disc = $detail_wisata->harga * ($promosi->potongan_harga/100);
                                        $harga_disc = $detail_wisata->harga - $disc;
                                        $harga = number_format($detail_wisata->harga,0,'.','.');
                                        echo number_format($harga_disc, 0,'.','.') .' IDR';
                                    }
                                    else
                                    {
                                        $harga = number_format($detail_wisata->harga,0,'.','.');
                                        echo $harga .' IDR';
                                    }
                                ?>
                        </p>

                        <p class="text-center buttons">
                            <a href="basket.html" class="btn btn-primary" style="width: 120px;"><i class="fa fa-hand-o-up"></i>Pesan</a>
                        </p>
                    </div>

                </div>

            </div>


            <div class="box" id="details">
                <p>
                    <h4>Product details</h4>
                    <p>White lace top, woven, has a round neck, short sleeves, has knitted lining attached</p>
                    <h4>Material & care</h4>
                    <ul>
                        <li>Polyester</li>
                        <li>Machine wash</li>
                    </ul>
                    <h4>Size & Fit</h4>
                    <ul>
                        <li>Regular fit</li>
                        <li>The model (height 5'8" and chest 33") is wearing a size S</li>
                    </ul>

                    <blockquote>
                        <p><em>Define style this season with Armani's new range of trendy tops, crafted with intricate details. Create a chic statement look by teaming this lace number with skinny jeans and pumps.</em>
                        </p>
                    </blockquote>

                    <hr>
                    <div class="social">
                        <h4>Show it to your friends</h4>
                        <p>
                            <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                        </p>
                    </div>
                </p>
            </div>

            <div class="row same-height-row">
                
                <?php foreach($paket_wisata as $r): ?>
                
                    <div class="col-md-3 col-sm-6">
                        <div class="product">
                            <div class="flip-container">
                                <div class="flipper">
                                    <div class="front">
                                        <a href="detail.html">
                                            <img src="<?=base_url()?>assets/img/<?=$r->gambar_wisata?>" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="back">
                                        <a href="detail.html">
                                            <img src="<?=base_url()?>assets/img/<?=$r->gambar_wisata?>" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <a href="detail.html" class="invisible">
                                <img src="<?=base_url()?>assets/img/<?=$r->gambar_wisata?>" alt="" class="img-responsive">
                            </a>
                            <div class="text">
                                <h3><a href="detail.html"><?=$r->nama_wisata?></a></h3>
                                <p class="price">
                                    <?php 
                                        $promosi = $this->promosi->check_promosi($r->id_paket_wisata)->row();
                                        $date = date("Y-m-d");
                                        if($date == $promosi->tgl_promosi)
                                        {
                                            $disc = $r->harga * ($promosi->potongan_harga/100);
                                            $harga_disc = $r->harga - $disc;
                                            $harga = number_format($r->harga,0,'.','.');
                                            echo "<del>$harga IDR </del>";
                                            echo number_format($harga_disc, 0,'.','.') .' IDR';
                                        }
                                        else
                                        {
                                            $harga = number_format($r->harga,0,'.','.');
                                            echo $harga .' IDR';
                                        }
                                    ?>
                                </p>
                                <p class="buttons">
                                    <a href="detail.html" class="btn btn-default">Lihat detail</a>
                                    <a href="basket.html" class="btn btn-primary"><i class="fa fa-hand-o-up"></i>Pesan</a>
                                </p>
                            </div>
                            <!-- /.text -->

                            <?php 
                                $date = date("Y-m-d");
                                if($date == $promosi->tgl_promosi):
                            ?>
                            <div class="ribbon sale">
                                <div class="theribbon">Promosi</div>
                                <div class="ribbon-background"></div>
                            </div>
                            <?php endif;?>
                            <!-- /.ribbon -->

                        </div>
                        <!-- /.product -->
                    </div>
                    
                    <?php endforeach; ?>
                </div>

            </div>

        </div>
        <!-- /.col-md-12 -->

    </div>
    <!-- /.container -->
</div>
<!-- /#content -->