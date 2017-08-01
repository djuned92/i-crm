<div id="content">
    <div class="container">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="<?=base_url()?>pelanggan/home">Home</a>
                <li>Testimoni</li>
            </ul>
        </div>

        <?php
            foreach($paket_wisata as $r):
            // $tgl_akhir = date_create($r->tgl_akhir);
            // $tgl_akhir = date_format($tgl_akhir,'Y-m-d');
            // $date = date("Y-m-d");
            // // $tgl_akhir_tomorrow = date($tgl_akhir, strtotime('tomorrow'));
            // if($tgl_akhir < $date):
        ?>

            <div class="col-md-6" id="blog-listing" data-animate="fadeInDown">

                <div class="post">
                    <h2><a href="post.html"><?=$r->nama_wisata?></a></h2>
                    <hr>
                    <div class="image" style="height: 250px;">
                        <a href="post.html">
                            <img src="<?=base_url()?>assets/img/<?=$r->gambar_wisata?>" class="img-responsive" alt="Example blog post alt">
                        </a>
                    </div>
                    <p class="intro">
                        <?php
                            $deskripsi = word_limiter($r->deskripsi, 8);
                            echo $deskripsi;
                        ?>
                    </p>
                    <a href="<?=base_url()?>pelanggan/testimoni/detail/<?=$r->id_paket_wisata?>">
                        <p class="read-more">
                            <button class="btn btn-md btn-primary"><i class="fa fa-smile-o"></i> Lihat Testimoni
                            </button>
                        </p>
                    </a>
                </div>

            </div>
        <?php  endforeach;?> <!-- endif; -->
    </div>
</div>
<!-- /#content -->