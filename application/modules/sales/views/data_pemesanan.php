<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line">Data Pemesanan</h4>

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
                            <th>Tanggal Pemesanan</th>
                            <th>Harga</th>
                            <th>Status</th>
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
                            <td><?=$r->nama?></td>
                            <td><?=$r->nama_wisata?></td>
                            <td><?=$r->lokasi?></td>
                            <td>
                                <?php 
                                     $tanggal = $r->tgl_pemesanan;
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
                            <td>
                                <?php 
                                    $harga_pemesanan = number_format($r->harga_pemesanan,0,'.','.');
                                    echo $harga_pemesanan .' IDR';
                                ?>      
                            </td>
                            <td><?=$r->status?></td>
                            <td>
                                <button class="btn btn-sm btn-danger btn-group" data-toggle="modal" data-placement="bottom" 
                                title="Hapus" data-target="#delete<?=$r->id_pemesanan?>">
                                    <i class="fa fa-trash"></i>
                                </button>
                                <button class="btn btn-sm btn-default btn-group" data-toggle="modal" data-placement="bottom" 
                                title="Pesanan Tidak Tersedia" data-target="#tidak_tersedia<?=$r->id_pemesanan?>">
                                    <i class="fa fa-remove"></i>
                                </button>
                                <!-- <button class="btn btn-sm btn-warning btn-group" data-toggle="modal" data-placement="bottom" 
                                title="Detail" data-target="#detail<?=$r->id_user?>">
                                    <i class="fa fa-eye"></i>
                                </button> -->
                                <button class="btn btn-sm btn-primary btn-group" data-toggle="modal" data-placement="bottom" 
                                title="Pesanan Tersedia" data-target="#tersedia<?=$r->id_pemesanan?>">
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

<!-- modal pemesanan tersedia -->
<?php foreach($pemesanan as $r): ?>
<div class="modal fade" id="tersedia<?=$r->id_pemesanan?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Pemesanan Tersedia</h4>
            </div>

            <form action="<?=base_url()?>sales/data_pemesanan/tersedia/<?=$r->id_pemesanan?>" class="form-horizontal" method="POST">
                <div class="modal-body">
                    <h4>Atas nama <strong><?=$r->nama?></strong> Paket wisata <?=$r->nama_wisata?> tersedia</h4>
                </div>
                
                <!-- input hidden email-->
                <input type="hidden" name="email" value="<?=$r->email?>">
                <input type="hidden" name="nama" value="<?=$r->nama?>">
                <input type="hidden" name="kode_pemesanan" value="<?=$r->kode_pemesanan?>">
                <input type="hidden" name="nama_wisata" value="<?=$r->nama_wisata?>">
                <input type="hidden" name="tgl_mulai" value="<?=$r->tgl_mulai?>">
                <input type="hidden" name="tgl_akhir" value="<?=$r->tgl_akhir?>">
                <input type="hidden" name="harga_pemesanan" value="<?=$r->harga_pemesanan?>">
                <input type="hidden" name="norek_perusahaan" value="<?=$r->norek_perusahaan?>">

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>

<!-- modal pemesanan tidak tersedia -->
<?php foreach($pemesanan as $r): ?>
<div class="modal fade" id="tidak_tersedia<?=$r->id_pemesanan?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Pemesanan Tidak Tersedia</h4>
            </div>

            <form action="<?=base_url()?>sales/data_pemesanan/tidak_tersedia/<?=$r->id_pemesanan?>" class="form-horizontal" method="POST">
                <div class="modal-body">
                    <h4>Atas nama <strong><?=$r->nama?></strong> Paket wisata <?=$r->nama_wisata?> tidak tersedia</h4>
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

<!-- modal hapus -->
<?php foreach($pemesanan as $r): ?>
<div class="modal fade" id="delete<?=$r->id_pemesanan?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Hapus Pemesanan</h4>
            </div>

            <form action="<?=base_url()?>sales/data_pemesanan/delete/<?=$r->id_pemesanan?>" class="form-horizontal" method="POST">
                <div class="modal-body">
                    <h4>Apakah anda ingin menghapus pemesanan atas nama <strong><?=$r->nama?> ?</strong></h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        
        </div>
    </div>
</div>
<?php endforeach; ?>
<!-- end modal hapus -->

<!-- modal detail -->
<?php foreach($pemesanan as $r): ?>
<div class="modal fade" id="detail<?=$r->id_pemesanan?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Detail Pemesanan</h4>
            </div>

            <div class="modal-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th colspan="2"><?=$r->nama?></th>
                        </tr>
                    </thead>
                    <tbody>
                          
                    </tbody>
                </table>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        
        </div>
    </div>
</div>
<?php endforeach; ?>
<!-- end modal detail -->