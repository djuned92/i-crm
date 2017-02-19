<div id="content">
    <div class="container">

        <div class="col-md-12">

            <div class="row products">

                <?php foreach($paket_wisata as $r): ?>
                
                <div class="col-md-3 col-sm-4">
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
            <!-- /.products -->

            <div class="pages">

               <?=$pagination?>
               
            </div>


        </div>
        <!-- /.col-md-9 -->

    </div>
    <!-- /.container -->
</div>