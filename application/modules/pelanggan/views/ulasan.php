<div id="content">
    <div class="container">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="<?=base_url()?>pelanggan/home">Home</a>
                <li>Ulasan Paket Wisata</li>
            </ul>
        </div>

        <?php if($this->session->flashdata('add')):?>
            <div class="alert alert-info">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong><?php echo $this->session->flashdata('add'); ?></strong>
            </div>
        <?php endif; ?>

        <?php 
            foreach($paket_wisata as $r):
            $tgl_akhir = date_create($r->tgl_akhir);  
            $tgl_akhir = date_format($tgl_akhir,'Y-m-d');
            $date = date("Y-m-d");
            // $tgl_akhir_tomorrow = date($tgl_akhir, strtotime('tomorrow'));
            if($tgl_akhir < $date):
        ?>

            <div class="col-md-6" id="blog-listing">  
  
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
                    <a href="<?=base_url()?>pelanggan/ulasan/add/<?=$r->id_pemesanan?>"
                    style="
                        margin-left: 330px;
                        <?php
                            $check_ulasan = $this->ulasan->check_ulasan($r->id_pelanggan, $r->id_paket_wisata)->num_rows();
                            if($check_ulasan > 0)
                            {
                                echo 'pointer-events: none;cursor: default;';
                            }
                        ?> 
                    ">
                        <!-- <p class="read-more"> -->
                            <button class="btn btn-md btn-primary"
                            <?php
                                if($check_ulasan > 0)
                                {
                                    echo 'disabled';
                                }
                            ?>
                            ><i class="fa fa-comments"></i> Kritik & Testimoni
                            </button>
                        <!-- </p> -->
                    </a> 
                </div>

            </div>
        <?php endif; endforeach;?>
    </div>
</div>
<!-- /#content -->