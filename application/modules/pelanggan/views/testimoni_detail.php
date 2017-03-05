<div id="content">
    <div class="container">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="<?=base_url()?>pelanggan/home">Home</a>
                <li>Lihat Testimoni</li>
            </ul>
        </div>

        <div class="col-md-12" id="blog-listing">  

            <div class="post">
                <h2><a href="#"><?=$paket_wisata->nama_wisata?></a></h2>
                <hr>
               <!--  <p class="date-comments">
                    <a href="post.html"><i class="fa fa-calendar-o"></i> 
                        <?php
                            $tanggal = $paket_wisata->tgl_mulai;
                            $data = strtotime($tanggal);
                            // $w = date('w', $data); // hari
                            $j = date('j', $data); // tanggal
                            $n = date('n', $data); // bulan
                        
                            // $hari = array('Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu');
                            $bulan = array('','Januari','Febuari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Novovember','Desember');
                            // echo $hari[$w]. ", ".$j." ".$bulan[$n]." ".date('y');
                            echo $j. " ".$bulan[$n]. " ".date('Y');
                        ?>
                    </a>
                    <a href="post.html"><i class="fa fa-comment-o"></i> 8 Comments</a>
                </p> -->
                <div class="image" style="height: 350px;">
                    <a href="#">
                        <img src="<?=base_url()?>assets/img/<?=$paket_wisata->gambar_wisata?>" class="img-responsive" alt="Example blog post alt">
                    </a>
                </div>
                <h2>Lokasi <?=$paket_wisata->lokasi?></h2>
                <blockquote><p class="intro"><?=$paket_wisata->deskripsi?></p></blockquote>
                
                <hr>
                <div id="comments" data-animate="fadeInUp">

                    <?php 
                        $testimoni = $this->ulasan->get_testimoni($paket_wisata->id_paket_wisata)->result();
                        foreach($testimoni as $datas):
                    ?>
                        <div class="row comment">
                            <div class="col-sm-3 col-md-2 text-center-xs">
                                <p>
                                    <img src="<?=base_url()?>assets/obaju/img/blog-avatar2.jpg" class="img-responsive img-circle" alt="">
                                </p>
                            </div>
                            <div class="col-sm-9 col-md-10">
                                <h5><?=$datas->nama?></h5>
                                <p class="posted"><i class="fa fa-clock-o"></i> 
                                    <?php 
                                        echo $tanggal = $datas->create_at;
                                        // $data = strtotime($tanggal);
                                        // // $w = date('w', $data); // hari
                                        // $j = date('j', $data); // tanggal
                                        // $n = date('n', $data); // bulan
                                    
                                        // // $hari = array('Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu');
                                        // $bulan = array('','Januari','Febuari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Novovember','Desember');
                                        // // echo $hari[$w]. ", ".$j." ".$bulan[$n]." ".date('y');
                                        // echo $j. " ".$bulan[$n]. " ".date('Y');
                                    ?>
                                </p>
                                <p><?=$datas->isi_testimoni?></p>
                            </div>
                        </div>
                    <?php endforeach;?>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- /#content -->