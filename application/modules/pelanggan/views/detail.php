<div id="content">
    <div class="container">

        <div class="col-md-12" data-animate="fadeInDown">
            <ul class="breadcrumb">
                <li><a href="<?=base_url()?>pelanggan/home">Home</a>
                </li>
                <li><a href="<?=base_url()?>pelanggan/detail/index/<?=$detail_wisata->id_paket_wisata?>">Detail</a>
                </li>
                <li><?=$detail_wisata->nama_wisata?></li>
            </ul>
        </div>

        <div class="col-md-12">

            <div class="row" id="productMain">
                <div class="col-sm-6">
                    <div id="mainImage">
                        <img src="<?=base_url()?>assets/img/<?=$detail_wisata->gambar_wisata?>" alt="" class="img-responsive">
                    </div>

                    <?php
                        $promosi = $this->promosi->check_promosi($detail_wisata->id_paket_wisata)->row();
                        $date = date("Y-m-d");
                        $login = $this->session->userdata('login') == TRUE;
                        if($login)
                        {
                            // tanggal lahir
                            $tgl_lahir = date_create($tanggal_lahir);
                            $tgl_lahir = date_format($tgl_lahir,'m-d');
                            $date_lahir = date('m-d');
                        }
                    ?>
                        <?php if($login):?>
                            <?php if($promosi != NULL && $date == $promosi->tgl_promosi && $date_lahir == $tgl_lahir):?>
                                <div class="ribbon sale">
                                    <div class="theribbon">Promosi</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <div class="ribbon new">
                                    <div class="theribbon">Special</div>
                                    <div class="ribbon-background"></div>
                                </div>
                            <?php elseif($promosi != NULL && $date == $promosi->tgl_promosi):?>
                                <div class="ribbon sale">
                                    <div class="theribbon">Promosi</div>
                                    <div class="ribbon-background"></div>
                                </div>
                            <?php elseif($date_lahir == $tgl_lahir):?>
                                <div class="ribbon new">
                                    <div class="theribbon">Special</div>
                                    <div class="ribbon-background"></div>
                                </div>
                            <?php endif;?>
                        <?php elseif($promosi != NULL && $date == $promosi->tgl_promosi):?>
                            <div class="ribbon sale">
                                <div class="theribbon">Promosi</div>
                                <div class="ribbon-background"></div>
                            </div>
                        <?php endif;?>
                    <!-- /.ribbon -->

                </div>
                <div class="col-sm-6">
                    <div class="box">
                        <h1 class="text-center"><?=$detail_wisata->nama_wisata?></h1>
                        <p class="price">
                            <?php
                                $date = date("Y-m-d");
                                if($login)
                                    {
                                        if($promosi != NULL && $date == $promosi->tgl_promosi) // lagi promosi
                                        {
                                            if($date_lahir == $tgl_lahir) // promosi + ultah
                                            {
                                                $disc = $detail_wisata->harga * ($promosi->potongan_harga/100);
                                                $harga_disc = $detail_wisata->harga - $disc;
                                                $disc_hbd = $harga_disc * 0.05; // potongan hbd 5%
                                                $harga_disc_hbd = $harga_disc - $disc_hbd;

                                                $harga = number_format($detail_wisata->harga,0,'.','.');
                                                $harga_disc = number_format($harga_disc, 0,'.','.');
                                                echo "<del>$harga $harga_disc</del><br/>";
                                                echo number_format($harga_disc_hbd,0,'.','.'). ' IDR';
                                            }
                                            else
                                            {
                                                $disc = $detail_wisata->harga * ($promosi->potongan_harga/100);
                                                $harga_disc = $detail_wisata->harga - $disc;
                                                $harga = number_format($detail_wisata->harga,0,'.','.');
                                                echo "<del>$harga </del>";
                                                echo number_format($harga_disc, 0,'.','.') .' IDR';
                                            }
                                        }
                                        elseif($date_lahir == $tgl_lahir) // hari ultah
                                        {
                                            $disc_hbd = $detail_wisata->harga * 0.05;
                                            $harga_hbd = $detail_wisata->harga - $disc_hbd; // potongan hbd 5%

                                            $harga = number_format($detail_wisata->harga,0,'.','.');
                                            echo "<del>$harga</del> ";
                                            echo number_format($harga_hbd,0,'.','.'). ' IDR';
                                        }
                                        else
                                        {
                                            $harga = number_format($detail_wisata->harga,0,'.','.');
                                            echo $harga .' IDR';
                                        }
                                    }
                                    elseif($promosi != NULL && $date == $promosi->tgl_promosi)
                                    {
                                        $disc = $detail_wisata->harga * ($promosi->potongan_harga/100);
                                        $harga_disc = $detail_wisata->harga - $disc;
                                        $harga = number_format($detail_wisata->harga,0,'.','.');
                                        echo "<del>$harga </del>";
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
                            <form action="<?=base_url()?>pelanggan/pesan/index/<?=$detail_wisata->id_paket_wisata?>" method="POST" id="pesan">
                                <input type="hidden" name="id_pelanggan"
                                value="<?php if($this->session->userdata('login') == TRUE){echo $id_pelanggan;}?>">
                                <input type="hidden" name="nama_wisata" value="<?=$detail_wisata->nama_wisata?>">
                                <input type="hidden" name="id_paket_wisata" value="<?=$detail_wisata->id_paket_wisata?>">
                                <input type="hidden" name="tgl_pemesanan"
                                value="<?=$date?>">

                                <?php if($login):?>
                                    <?php if($promosi == NULL):?>
                                        <input type="hidden" name="harga_pemesanan"
                                        value="<?=$detail_wisata->harga?>">
									<?php elseif($promosi != NULL):?>
										<input type="hidden" name="harga_pemesanan"
										value="<?=$detail_wisata->harga?>">
                                    <?php elseif($promosi == NULL && $date_lahir == $tgl_lahir):?>
                                        <input type="hidden" name="harga_pemesanan"
                                        value="<?=$harga_hbd?>">
                                    <?php elseif($promosi != NULL && $date == $promosi->tgl_promosi && $date_lahir == $tgl_lahir):?>
                                        <input type="hidden" name="harga_pemesanan"
                                        value="<?=$harga_disc_hbd?>">
                                    <?php elseif($promosi != NULL && $date == $promosi->tgl_promosi && $date_lahir != $tgl_lahir):?>
                                        <input type="hidden" name="harga_pemesanan"
                                        value="<?=$harga_disc?>">
                                    <?php endif;?>
                                <?php elseif($promosi != NULL && $date == $promosi->tgl_promosi):?>
                                    <input type="hidden" name="harga_pemesanan"
                                    value="<?=$harga_disc?>">
                                <?php elseif($promosi == NULL):?>
                                    <input type="hidden" name="harga_pemesanan"
                                    value="<?=$detail_wisata->harga?>">
                                <?php endif;?>

                                <p class="text-center">
                                    <?php
                                        $id_paket_wisata = $detail_wisata->id_paket_wisata;
                                        $rating = $this->ulasan->rating($id_paket_wisata)->row();
                                    ?>
                                    <input id="input-21b" value="<?=round($rating->rating,2);?>" type="text" class="rating"
                                    data-step=0.2 data-size="sm" disabled>
                                </p>
                            </form>
                                <p class="text-center buttons">
                                     <a href="<?=base_url()?>pelanggan/testimoni/detail/<?=$detail_wisata->id_paket_wisata?>">
                                        <button class="btn btn-md btn-default"><i class="fa fa-smile-o"></i> Lihat Testimoni
                                        </button>
                                    </a>
                                    <button type="submit" class="btn btn-primary" id="pesan-submit" style="width: 120px;">
                                        <i class="fa fa-hand-o-up"></i>Pesan
                                    </button>
                                </p>

                        </p>
                    </div>

                </div>

            </div>


            <div class="box" id="details">
                <p>
                    <h4>Wisata</h4>
                    <p><?=$detail_wisata->nama_wisata?></p>
                    <h4>Lokasi</h4>
                    <p><?=$detail_wisata->lokasi?></p>
                    <h4>Tanggal Pelaksanaan</h4>
                    <p>
                        <?php
                            $tanggal = $detail_wisata->tgl_mulai;
                            $data = strtotime($tanggal);
                            // $w = date('w', $data); // hari
                            $j = date('j', $data); // tanggal
                            $n = date('n', $data); // bulan

                            // $hari = array('Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu');
                            $bulan = array('','Januari','Febuari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Novovember','Desember');
                            // echo $hari[$w]. ", ".$j." ".$bulan[$n]." ".date('y');
                            echo $j. " ".$bulan[$n]. " ".date('Y'). " s/d";
                        ?>
                        <?php
                            $tanggal = $detail_wisata->tgl_akhir;
                            $data = strtotime($tanggal);
                            // $w = date('w', $data); // hari
                            $j = date('j', $data); // tanggal
                            $n = date('n', $data); // bulan

                            // $hari = array('Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu');
                            $bulan = array('','Januari','Febuari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Novovember','Desember');
                            // echo $hari[$w]. ", ".$j." ".$bulan[$n]." ".date('y');
                            echo $j. " ".$bulan[$n]. " ".date('Y');
                        ?>

                    </p>
                    <h4>Rundown Acara</h4>
                    <p>
                        <img src="<?=base_url()?>assets/img/<?=$detail_wisata->rundown_acara?>" style="width: 1024px; height: 400px;">
                    </p>
                    <h4>Deskripsi</h4>
                    <p align="justify"><?=$detail_wisata->deskripsi?></p>
                </p>
            </div>

            <div class="row same-height-row">

                <?php
                    foreach($paket_wisata as $r):
                    $tgl_akhir = date_create($r->tgl_akhir);
                    $tgl_akhir = date_format($tgl_akhir,'Y-m-d');
                    $date = date("Y-m-d");
                    // // $tgl_akhir_tomorrow = date($tgl_akhir, strtotime('tomorrow'));
                    if($tgl_akhir > $date):
                ?>

                    <div class="col-md-3 col-sm-6">
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
                                    if($login)
                                    {
                                        if($promosi != NULL && $date == $promosi->tgl_promosi) // lagi promosi
                                        {
                                            if($date_lahir == $tgl_lahir) // promosi + ultah
                                            {
                                                $disc = $r->harga * ($promosi->potongan_harga/100);
                                                $harga_disc = $r->harga - $disc;
                                                $disc_hbd = $harga_disc * 0.05; // potongan hbd 5%
                                                $harga_disc_hbd = $harga_disc - $disc_hbd;

                                                $harga = number_format($r->harga,0,'.','.');
                                                $harga_disc = number_format($harga_disc, 0,'.','.');
                                                echo "<del>$harga $harga_disc</del><br/>";
                                                echo number_format($harga_disc_hbd,0,'.','.'). ' IDR';
                                            }
                                            else
                                            {
                                                $disc = $r->harga * ($promosi->potongan_harga/100);
                                                $harga_disc = $r->harga - $disc;
                                                $harga = number_format($r->harga,0,'.','.');
                                                echo "<del>$harga </del>";
                                                echo number_format($harga_disc, 0,'.','.') .' IDR';
                                            }
                                        }
                                        elseif($date_lahir == $tgl_lahir) // hari ultah
                                        {
                                            $disc_hbd = $r->harga * 0.05;
                                            $harga_hbd = $r->harga - $disc_hbd; // potongan hbd 5%

                                            $harga = number_format($r->harga,0,'.','.');
                                            echo "<del>$harga</del> ";
                                            echo number_format($harga_hbd,0,'.','.'). ' IDR';
                                        }
                                        else
                                        {
                                            $harga = number_format($r->harga,0,'.','.');
                                            echo $harga .' IDR';
                                        }
                                    }
                                    elseif($promosi != NULL && $date == $promosi->tgl_promosi)
                                    {
                                        $disc = $r->harga * ($promosi->potongan_harga/100);
                                        $harga_disc = $r->harga - $disc;
                                        $harga = number_format($r->harga,0,'.','.');
                                        echo "<del>$harga </del>";
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
                                <!-- style="width: 150px;margin-bottom: 0px;"
                                     style="width: 150px;margin-left: 40px;"
                                -->
                                <div class="row">
                                    <div class="col-sm-5 col-sm-offset-1">
                                        <a href="<?=base_url()?>pelanggan/detail/index/<?=$r->id_paket_wisata?>"
                                        class="btn btn-default">Lihat detail</a>
                                    </div>
                                    <div class="col-sm-6">
                                       <form action="<?=base_url()?>pelanggan/pesan/index/<?=$r->id_paket_wisata?>" method="POST"
                                        style="width: 100px;">
                                            <input type="hidden" name="id_pelanggan"
                                            value="<?php if($this->session->userdata('login') == TRUE){echo $id_pelanggan;}?>">
                                            <input type="hidden" name="nama_wisata" value="<?=$r->nama_wisata?>">
                                            <input type="hidden" name="id_paket_wisata" value="<?=$r->id_paket_wisata?>">
                                            <input type="hidden" name="tgl_pemesanan"
                                            value="<?=$date?>">

                                            <?php if($login):?>
                                                <?php if($promosi == NULL):?>
                                                    <input type="hidden" name="harga_pemesanan"
                                                    value="<?=$r->harga?>">
                                                <?php elseif($promosi == NULL && $date_lahir == $tgl_lahir):?>
                                                    <input type="hidden" name="harga_pemesanan"
                                                    value="<?=$harga_hbd?>">
                                                <?php elseif($promosi != NULL && $date == $promosi->tgl_promosi && $date_lahir == $tgl_lahir):?>
                                                    <input type="hidden" name="harga_pemesanan"
                                                    value="<?=$harga_disc_hbd?>">
                                                <?php elseif($promosi != NULL && $date == $promosi->tgl_promosi && $date_lahir != $tgl_lahir):?>
                                                    <input type="hidden" name="harga_pemesanan"
                                                    value="<?=$harga_disc?>">
                                                <?php endif;?>
                                            <?php elseif($promosi != NULL && $date == $promosi->tgl_promosi):?>
                                                <input type="hidden" name="harga_pemesanan"
                                                value="<?=$harga_disc?>">
                                            <?php elseif($promosi == NULL):?>
                                                <input type="hidden" name="harga_pemesanan"
                                                value="<?=$r->harga?>">
                                            <?php endif;?>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fa fa-hand-o-up"></i>Pesan
                                            </button>
                                        </form>
                                    </div>
                                </div>

                            </p>
                            </div>
                            <!-- /.text -->

                            <?php if($login):?>
                                <?php if($promosi != NULL && $date == $promosi->tgl_promosi && $date_lahir == $tgl_lahir):?>
                                    <div class="ribbon sale">
                                        <div class="theribbon">Promosi</div>
                                        <div class="ribbon-background"></div>
                                    </div>
                                    <div class="ribbon new">
                                        <div class="theribbon">Special</div>
                                        <div class="ribbon-background"></div>
                                    </div>
                                <?php elseif($promosi != NULL && $date == $promosi->tgl_promosi):?>
                                    <div class="ribbon sale">
                                        <div class="theribbon">Promosi</div>
                                        <div class="ribbon-background"></div>
                                    </div>
                                <?php elseif($date_lahir == $tgl_lahir):?>
                                    <div class="ribbon new">
                                        <div class="theribbon">Special</div>
                                        <div class="ribbon-background"></div>
                                    </div>
                                <?php endif;?>
                            <?php elseif($promosi != NULL && $date == $promosi->tgl_promosi):?>
                                <div class="ribbon sale">
                                    <div class="theribbon">Promosi</div>
                                    <div class="ribbon-background"></div>
                                </div>
                            <?php endif;?>
                            <!-- /.ribbon -->

                        </div>
                        <!-- /.product -->
                    </div>

                    <?php endif; endforeach; ?>
                </div>

            </div>

        </div>
        <!-- /.col-md-12 -->

    </div>
    <!-- /.container -->
</div>
<!-- /#content -->
