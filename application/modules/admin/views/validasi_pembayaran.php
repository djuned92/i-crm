<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line">Validasi Pembayaran</h4>

            </div>

        </div>
        <div class="row">
            <div class="col-md-12">

                <?php if($this->session->flashdata('add')):?>
                    <div class="alert alert-info">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong><?php echo $this->session->flashdata('add'); ?></strong>
                    </div>
                <?php elseif($this->session->flashdata('update')):?>
                    <div class="alert alert-info">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong><?php echo $this->session->flashdata('update'); ?></strong>
                    </div>
                <?php elseif($this->session->flashdata('delete')):?>
                    <div class="alert alert-info">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong><?php echo $this->session->flashdata('delete'); ?></strong>
                    </div>
                <?php endif; ?>

                <table class="table table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Atas Nama</th>
                            <th>Wisata</th>
                            <th>Lokasi</th>
                            <th>Harga</th>
                            <th>Jumlah Transfer</th>
                            <th>Status Pembayaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $i = 1;
                            foreach($pemesanan as $r):
                        ?>
                        <tr>
                            <td><?=$i++?></td>
                            <td><?=$r->nama_pemilik?></td>
                            <td><?=$r->nama_wisata?></td>
                            <td><?=$r->lokasi?></td>
                            <td>
                                <?php 
                                    $harga_pemesanan = number_format($r->harga_pemesanan,0,'.','.');
                                    echo $harga_pemesanan .' IDR';
                                ?>      
                            </td>
                            <td>
                                <?php 
                                    $jml_transfer = number_format($r->jml_transfer,0,'.','.');
                                    echo $jml_transfer .' IDR';
                                ?> 
                            </td>
                            <td><?=$r->valid_pembayaran?></td>
                            <td>
                                <button class="btn btn-sm btn-default btn-group" data-toggle="modal" data-placement="bottom" 
                                title="Pembayaran tidak valid" data-target="#tidak_valid<?=$r->id_pemesanan?>">
                                    <i class="fa fa-remove"></i>
                                </button>

                                <button class="btn btn-sm btn-warning btn-group" data-toggle="modal" data-placement="bottom" 
                                title="Detail" data-target="#detail<?=$r->id_pemesanan?>">
                                    <i class="fa fa-eye"></i>
                                </button>
                                
                                <button class="btn btn-sm btn-primary btn-group" data-toggle="modal" data-placement="bottom" 
                                title="Pembayaran valid" data-target="#valid<?=$r->id_pemesanan?>">
                                    <i class="fa fa-check"></i>
                                </button>
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

<!-- modal pembayaran valid -->
<?php foreach($pemesanan as $r): ?>
<div class="modal fade" id="valid<?=$r->id_pemesanan?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Pembayaran Valid</h4>
            </div>

            <form action="<?=base_url()?>admin/validasi_pembayaran/valid/<?=$r->id_pemesanan?>" class="form-horizontal" method="POST">
                <div class="modal-body">
                    <h4>Atas nama <strong><?=$r->nama_pemilik?></strong> pembayaran telah valid</h4>
                </div>
                
                <!-- input hidden email-->
                <input type="hidden" name="email" value="<?=$r->email?>">
                 <input type="hidden" name="nama" value="<?=$r->nama?>">
                <input type="hidden" name="nama_wisata" value="<?=$r->nama_wisata?>">
                <input type="hidden" name="tgl_mulai" value="<?=$r->tgl_mulai?>">
                <input type="hidden" name="tgl_akhir" value="<?=$r->tgl_akhir?>">
                <input type="hidden" name="status" value="Disetujui">

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>
<!-- end modal valid -->

<!-- modal pembayaran tidak valid -->
<?php foreach($pemesanan as $r): ?>
<div class="modal fade" id="tidak_valid<?=$r->id_pemesanan?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Pembayaran Tidak Valid</h4>
            </div>

            <form action="<?=base_url()?>admin/validasi_pembayaran/valid/<?=$r->id_pemesanan?>" class="form-horizontal" method="POST">
                <div class="modal-body">
                    <h4>Atas nama <strong><?=$r->nama_pemilik?></strong> pembayaran tidak valid</h4>
                </div>
                
                <!-- input hidden email-->
                <input type="hidden" name="email" value="<?=$r->email?>">
                <input type="hidden" name="nama" value="<?=$r->nama?>">
                <input type="hidden" name="kode_pemesanan" value="<?=$r->kode_pemesanan?>">
                <input type="hidden" name="nama_wisata" value="<?=$r->nama_wisata?>">

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>
<!-- end modal tidak valid -->

<!-- modal detail -->
<?php foreach($pemesanan as $r): ?>
<div class="modal fade" id="detail<?=$r->id_pemesanan?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Detail Paket Wisata dan Pembayaran</h4>
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
                                    <th colspan="2">Paket Wisata <?=$r->nama_wisata?></th>
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
                                    <td>
                                        <?php
                                        $harga = number_format($r->harga,0,'.','.');
                                        echo $harga .' IDR';
                                        ?>
                                    </td>
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

                <div class="row">
                    <div class="col-md-10 col-md-offset-2">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th colspan="2">Detail Pembayaran</th>
                                </tr>
                            </thead>
                                <tr>
                                    <td>Atas Nama</td>
                                    <td><?=$r->nama_pemilik?></td>
                                </tr>
                                <tr>
                                    <td>No Rekening</td>
                                    <td><?=$r->norek_pemilik?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Transfer</td>
                                    <td>
                                        <?php 
                                            $tanggal = $r->tgl_transfer;
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
                                    <td>Jam</td>
                                    <td><?=$r->jam?></td>
                                </tr>
                                <tr>
                                    <td>Jumlah Transfer</td>
                                    <td>
                                        <?php  
                                        $jml_transfer = number_format($r->jml_transfer,0,'.','.');
                                        echo $jml_transfer .' IDR';
                                        ?>
                                    </td>
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