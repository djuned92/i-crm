<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line">Promosi</h4>

            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="<?=base_url()?>marketing/promosi/add">
                    <button class="btn btn-primary btn-md">
                        <i class="fa fa-plus"> Promosi Paket Wisata</i>
                    </button>
                </a>
                <br/><br/>

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
                <?php elseif($this->session->flashdata('blast')):?>
                    <div class="alert alert-info">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong><?php echo $this->session->flashdata('blast'); ?></strong>
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
                            <th>Nama Promosi</th>
                            <th>Nama Wisata</th>
                            <th>Isi</th>
                            <th>Tanggal Promosi</th>
                            <th>Diskon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $i = 1;
                            foreach($promosi as $r):
                        ?>
                        <tr>
                            <td><?=$i++;?></td>
                            <td><?=$r->nama?></td>
                            <td><?=$r->nama_wisata?></td>
                            <td>
                                <?php 
                                    $isi = $r->isi;
                                    echo character_limiter($isi, 30);
                                ?>
                            </td>
                            <td>
                                <?php
                                    if ($r->tgl_promosi == NULL)
                                    {
                                        echo "Null";
                                    } 
                                    else
                                    {
                                        $tanggal = $r->tgl_promosi;
                                        $data = strtotime($tanggal);
                                        // $w = date('w', $data); // hari
                                        $j = date('j', $data); // tanggal
                                        $n = date('n', $data); // bulan
                                    
                                        // $hari = array('Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu');
                                        $bulan = array('','Januari','Febuari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Novovember','Desember');
                                        // echo $hari[$w]. ", ".$j." ".$bulan[$n]." ".date('y');
                                        echo $j. " ".$bulan[$n]. " ".date('Y');
                                    }
                                ?> 
                            </td>
                            <td><?=$r->potongan_harga?> %</td>
                            <td>
                                <a href="<?=base_url()?>marketing/promosi/update/<?=$r->id_paket_wisata?>">
                                    <button class="btn btn-sm btn-info btn-group" data-placement="bottom" title="Edit">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </a> 
                                <button class="btn btn-sm btn-warning btn-group" data-toggle="modal" data-placement="bottom" 
                                title="Detail" data-target="#detail<?=$r->id_paket_wisata?>">
                                    <i class="fa fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-success btn-group" data-toggle="modal" data-placement="bottom" 
                                title="Promosi Semua Pelanggan" data-target="#promosi<?=$r->id_paket_wisata?>">
                                    <i class="fa fa-tags"></i>
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

<!-- modal hapus -->
<?php foreach($promosi as $r): ?>
<div class="modal fade" id="delete<?=$r->id_paket_wisata?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Hapus Paket Wisata</h4>
            </div>

            <form action="<?=base_url()?>marketing/paket_wisata/delete/<?=$r->id_paket_wisata?>" class="form-horizontal" method="POST">
                <div class="modal-body">
                    <h4>Apakah anda ingin menghapus wisata <strong><?=$r->nama_wisata?> ?</strong></h4>
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
<?php foreach($promosi as $r): ?>
<div class="modal fade" id="detail<?=$r->id_paket_wisata?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Detail Promosi Paket Wisata</h4>
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

                <div class="row">
                    <div class="col-md-10 col-md-offset-2">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th colspan="2"><?=$r->nama?></th>
                                </tr>
                            </thead>
                                <tr>
                                    <td>Nama Promosi</td>
                                    <td><?=$r->nama?></td>
                                </tr>
                                <tr>
                                    <td>Isi</td>
                                    <td><?=$r->isi?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Promosi</td>
                                    <td>
                                        <?php 
                                            $tanggal = $r->tgl_promosi;
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
                                    <td>Diskon</td>
                                    <td><?=$r->potongan_harga?> %</td>
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

<!-- modal promosi -->
<?php foreach($promosi as $r): ?>
<div class="modal fade" id="promosi<?=$r->id_paket_wisata?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Promosi Semua Pelanggan</h4>
            </div>

            <form action="<?=base_url()?>marketing/promosi/send_email" class="form-horizontal" method="POST">
                
                <input type="hidden" name="potongan_harga" value="<?=$r->potongan_harga?>">
                <input type="hidden" name="id_paket_wisata" value="<?=$r->id_paket_wisata?>">
                <input type="hidden" name="tgl_promosi" value="<?=$r->tgl_promosi?>">
                <input type="hidden" name="isi" value="<?=$r->isi?>">

                <div class="modal-body">
                    <h4>Promosi Paket Wisata <strong><?=$r->nama_wisata?> Kesemua Pelanggan ?</strong></h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Iya</button>
                </div>

            </form>

        </div>
    </div>
</div>
<?php endforeach; ?>
<!-- end modal promosi -->