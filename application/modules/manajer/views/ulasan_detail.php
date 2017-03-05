<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line">Kritikan Paket Wisata</h4>

            </div>

        </div>
        <div class="row">
            <div class="col-md-2">
                <img src="<?=base_url()?>assets/img/<?=$paket_wisata->gambar_wisata?>" class="img-rounded"
                style="height: 180px;width: 180px;">
            </div>
            <div class="col-md-8 col-md-offeset-1">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th colspan="2"><h4>Paket Wisata <?=$paket_wisata->nama_wisata?></h4></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Lokasi</td>
                            <td><?=$paket_wisata->lokasi?></td>
                        </tr>    
                        <tr>
                            <td>Tanggal Pelaksana</td>
                            <td>
                                <?php $date = date_create($paket_wisata->tgl_mulai); echo date_format($date, 'd-m-Y')?> s/d 
                                <?php $date = date_create($paket_wisata->tgl_akhir); echo date_format($date, 'd-m-Y')?>
                            </td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td>
                                <?php $harga = number_format($paket_wisata->harga,0,'.','.');
                                echo $harga;?> IDR
                            </td>
                        </tr>
                        <tr>
                            <td>Norek Perusahaan</td>
                            <td><?=$paket_wisata->norek_perusahaan?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <hr>
                <div id="comments">
                    <?php 
                        $testimoni = $this->ulasan->get_testimoni($paket_wisata->id_paket_wisata)->result();
                        foreach($testimoni as $datas):
                    ?>
                        <div class="row comment">
                            <div class="col-sm-3 col-md-2 text-center-xs">
                                <p>
                                    <img src="<?=base_url()?>assets/obaju/img/blog-avatar2.jpg" class="img-responsive img-circle" alt=""
                                    style="height: 120px;height: 120px;">
                                </p>
                            </div>
                            <div class="col-sm-9 col-md-10">
                                <h4><?=$datas->nama?></h4>
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
                                <blockquote><?=$datas->isi_kritik?></blockquote>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->