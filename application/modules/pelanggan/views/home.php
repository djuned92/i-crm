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
                                    <a href="<?=base_url()?>pelanggan/detail/index/<?=$r->id_paket_wisata?>">
                                        <img src="<?=base_url()?>assets/img/<?=$r->gambar_wisata?>" alt="" class="img-responsive">
                                    </a>
                                </div>
                                <div class="back">
                                    <a href="<?=base_url()?>pelanggan/detail/index/<?=$r->id_paket_wisata?>">
                                        <img src="<?=base_url()?>assets/img/<?=$r->gambar_wisata?>" alt="" class="img-responsive">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <a href="<?=base_url()?>pelanggan/detail/index/<?=$r->id_paket_wisata?>" class="invisible">
                            <img src="<?=base_url()?>assets/img/<?=$r->gambar_wisata?>" alt="" class="img-responsive">
                        </a>
                        <div class="text">
                            <h3 style="margin-bottom: 0px;"><a href="<?=base_url()?>pelanggan/detail/index/<?=$r->id_paket_wisata?>"><?=$r->nama_wisata?></a></h3>
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
                                <a href="<?=base_url()?>pelanggan/detail/index/<?=$r->id_paket_wisata?>" class="btn btn-default" style="width: 150px;margin-bottom: 0px;">Lihat detail</a>
                                <form action="<?=base_url()?>pelanggan/pesan/index/<?=$r->id_paket_wisata?>" method="POST">
                                    <input type="hidden" name="id_pelanggan" 
                                    value="<?php if($this->session->userdata('login') == TRUE){echo $id_pelanggan;}?>">
                                    <input type="hidden" name="id_paket_wisata" value="<?=$r->id_paket_wisata?>">
                                    <input type="hidden" name="tgl_pemesanan" 
                                    value="<?=$date?>">

                                    <input type="hidden" name="harga_pemesanan" 
                                    value="<?php if($date == $promosi->tgl_promosi){ echo $harga_disc;}else{echo $r->harga;}?>">
                                    <button type="submit" class="btn btn-primary" style="width: 150px;margin-left: 40px;">
                                        <i class="fa fa-hand-o-up"></i>Pesan
                                    </button>
                                </form>
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