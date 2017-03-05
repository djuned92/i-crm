<div id="content">
    <div class="container">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="<?=base_url()?>pelanggan/home">Home</a>
                <li>Buat Ulasan Paket Wisata</li>
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
                <p class="intro"><?=$paket_wisata->deskripsi?></p>
                
                <hr>
                <h2>Form Ulasan</h2>
                <form class="ulasan" action="<?=base_url()?>pelanggan/ulasan/add/<?=$paket_wisata->id_pemesanan?>" method="POST">
                    <input type="hidden" name="id_pemesanan" value="<?=$paket_wisata->id_pemesanan?>">
                    <input type="hidden" name="id_paket_wisata" value="<?=$paket_wisata->id_paket_wisata?>">
                    <input type="hidden" name="id_pelanggan" value="<?=$paket_wisata->id_pelanggan?>">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="kritik">Kritik</label>
                                <textarea name="isi_kritik" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="testimoni">Testimoni</label>
                                <textarea name="isi_testimoni" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="col-sm-12 text-center">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-comment"></i> Simpan Ulasan</button>
                        </div>
                    </div>
                    <!-- /.row -->
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /#content -->