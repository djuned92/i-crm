<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line">Ulasan Paket Wisata</h4>

            </div>

        </div>
        <div class="row">
            <div class="col-md-12">

                <table class="table table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Gambar</th>
                            <th>Wisata</th>
                            <th>Lokasi</th>
                            <th>Deskripsi</th>
                            <th>Tgl Mulai</th>
                            <th>Tgl Akhir</th>
                            <th>Lokal Agen</th>
                            <th>No Telp</th>
                            <th>Rating</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            foreach($paket_wisata as $r):
                        ?>
                        <tr>
                            <td><?=$i++;?></td>
                            <td><img src="<?=base_url()?>assets/img/<?=$r->gambar_wisata?>" class="img-rounded"
                            style="height: 100px; width: 100px;"></td>
                            <td><?=$r->nama_wisata?></td>
                            <td><?=$r->lokasi?></td>
                            <td>
                                <?php
                                    $deskripsi = $r->deskripsi;
                                    echo word_limiter($deskripsi, 4);
                                ?>
                            </td>
                            <td>
                                <?php
                                    $tanggal = $r->tgl_mulai;
                                    $data = strtotime($tanggal);
                                    // $w = date('w', $data); // hari
                                    $j = date('j', $data); // tanggal
                                    $n = date('n', $data); // bulan

                                    // $hari = array('Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu');
                                     $bulan = array('','Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des');
                                    // echo $hari[$w]. ", ".$j." ".$bulan[$n]." ".date('y');
                                    echo $j. " ".$bulan[$n]. " ".date('y');
                                ?>
                            </td>
                            <td>
                                <?php
                                    $tanggal = $r->tgl_akhir;
                                    $data = strtotime($tanggal);
                                    // $w = date('w', $data); // hari
                                    $j = date('j', $data); // tanggal
                                    $n = date('n', $data); // bulan

                                    // $hari = array('Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu');
                                    $bulan = array('','Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des');
                                    // echo $hari[$w]. ", ".$j." ".$bulan[$n]." ".date('y');
                                    echo $j. " ".$bulan[$n]. " ".date('y');
                                ?>
                            </td>
                           <!--  <td><?php $harga = number_format($r->harga,0,'.','.');echo $harga;?> IDR</td>
                            <td><?=$r->norek_perusahaan?></td> -->

                            <td><?=$r->lokal_agen?></td>
                            <td><?=$r->no_telp_lokal_agen?></td>
                            <td>
                                <?php
                                    $id_paket_wisata = $r->id_paket_wisata;
                                    $rating = $this->ulasan->rating($id_paket_wisata)->row();
                                    echo round($rating->rating,2);
                                ?>

                            </td>
                            <td>
                                <!-- <button class="btn btn-sm btn-warning btn-group" data-toggle="modal" data-placement="bottom"
                                title="Detail" data-target="#detail<?=$r->id_paket_wisata?>">
                                    <i class="fa fa-eye"></i>
                                </button> -->
                                <a href="<?=base_url()?>marketing/ulasan/detail/<?=$r->id_paket_wisata?>">
                                    <button class="btn btn-sm btn-info btn-group" data-placement="bottom">
                                        <i class="fa fa-comments"></i> Lihat Kritikan
                                    </button>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>

            </div>

        </div>
    </div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->

<!-- modal detail -->
<?php foreach($paket_wisata as $r): ?>
<div class="modal fade" id="detail<?=$r->id_paket_wisata?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Detail Paket Wisata</h4>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-2">
                        <img src="<?=base_url()?>assets/img/<?=$r->gambar_wisata?>" class="img-rounded"
                        style="width:140px; height:120px;">
                    </div>

                    <div class="col-md-10">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th colspan="2"><?=$r->nama_wisata?></th>
                                </tr>
                            </thead>
                                <tr>
                                    <td>Wisata</td>
                                    <td><?=$r->nama_wisata?></td>
                                </tr>
                                <tr>
                                    <td>Lokasi</td>
                                    <td><?=$r->lokasi?></td>
                                </tr>
                                <tr>
                                    <td>Deskripsi</td>
                                    <td><?=$r->deskripsi?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Mulai</td>
                                    <td>
                                        <?php
                                            $tanggal = $r->tgl_mulai;
                                            $data = strtotime($tanggal);
                                            // $w = date('w', $data); // hari
                                            $j = date('j', $data); // tanggal
                                            $n = date('n', $data); // bulan

                                            // $hari = array('Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu');
                                            $bulan = array('','Januari','Febuari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Novovember','Desember');
                                            // echo $hari[$w]. ", ".$j." ".$bulan[$n]." ".date('y');
                                            echo $j. " ".$bulan[$n]. " ".date('Y');
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tanggal Akhir</td>
                                    <td>
                                        <?php
                                            $tanggal = $r->tgl_akhir;
                                            $data = strtotime($tanggal);
                                            // $w = date('w', $data); // hari
                                            $j = date('j', $data); // tanggal
                                            $n = date('n', $data); // bulan

                                            // $hari = array('Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu');
                                            $bulan = array('','Januari','Febuari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Novovember','Desember');
                                            // echo $hari[$w]. ", ".$j." ".$bulan[$n]." ".date('y');
                                            echo $j. " ".$bulan[$n]. " ".date('Y');
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Harga</td>
                                    <td>Rp. <?=$r->harga?></td>
                                </tr>
                                <tr>
                                    <td>Norek Perusahaan</td>
                                    <td><?=$r->norek_perusahaan?></td>
                                </tr>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>

        </div>
    </div>
</div>
<?php endforeach; ?>
<!-- end modal detail -->