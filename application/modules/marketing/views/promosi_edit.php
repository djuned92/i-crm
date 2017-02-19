<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line">Edit Promosi</h4>

            </div>

        </div>
        <div class="row">
            <div class="col-md-12">

                <form class="form-horizontal promosi" action="<?=base_url()?>marketing/promosi/update/<?=$promosi->id_paket_wisata?>" method="POST" enctype="multipart/form-data">
                    
                    <input type="hidden" name="id_paket_wisata" value="<?=$promosi->id_paket_wisata?>">

                    <div class="form-group">
                        <label class="col-md-2 control-label">Wisata</label>
                        <div class="col-md-3">
                            <input type="text" name="nama_wisata" class="form-control" placeholder="Nama Wisata"
                            value="<?=$promosi->nama_wisata?>" readonly>
                        </div>

                        <label class="col-md-2 control-label">Lokasi</label>
                        <div class="col-md-4">
                            <input type="text" name="lokasi" class="form-control" placeholder="Lokasi"
                            value="<?=$promosi->lokasi?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Gambar Wisata</label>
                        <div class="col-md-1">
                           <img src="<?=base_url()?>assets/img/<?=$promosi->gambar_wisata?>" class="img-rounded" 
                           style="width:140px; height:120px;"> 
                        </div>

                        <label class="col-md-2 control-label">Deskripsi</label>
                        <div class="col-md-6">
                            <textarea class="form-control" name="deskripsi" rows="5" placeholder="Deskripsi" 
                            readonly><?=$promosi->deskripsi?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Tanggal Mulai</label>
                        <div class="col-md-3">
                            <input class="form-control"  
                            value="<?php
                                        $tanggal = $promosi->tgl_mulai;
                                        $data = strtotime($tanggal);
                                        // $w = date('w', $data); // hari
                                        $j = date('j', $data); // tanggal
                                        $n = date('n', $data); // bulan
                                    
                                        // $hari = array('Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu');
                                        $bulan = array('','Januari','Febuari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Novovember','Desember');
                                        // echo $hari[$w]. ", ".$j." ".$bulan[$n]." ".date('y');
                                        echo $j. " ".$bulan[$n]. " ".date('Y');
                                    ?>" readonly>
                        </div>

                        <label class="col-md-2 control-label">Tanggal Akhir</label>
                        <div class="col-md-4">
                            <input class="form-control"
                            value="<?php
                                        $tanggal = $promosi->tgl_akhir;
                                        $data = strtotime($tanggal);
                                        // $w = date('w', $data); // hari
                                        $j = date('j', $data); // tanggal
                                        $n = date('n', $data); // bulan
                                    
                                        // $hari = array('Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu');
                                        $bulan = array('','Januari','Febuari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Novovember','Desember');
                                        // echo $hari[$w]. ", ".$j." ".$bulan[$n]." ".date('y');
                                        echo $j. " ".$bulan[$n]. " ".date('Y');
                                    ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Harga</label>
                        <div class="col-md-3">
                            <input type="text" name="harga" class="form-control" placeholder="Harga"
                            value="Rp. <?=$promosi->harga?>" readonly>
                        </div>

                        <label class="col-md-2 control-label">Norek Perusahaan</label>
                        <div class="col-md-4">
                            <input type="text" name="norek_perusahaan" class="form-control"
                            value="<?=$promosi->norek_perusahaan?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Nama Promosi</label>
                        <div class="col-md-9">
                            <input type="text" name="nama" class="form-control" placeholder="Nama Promosi"
                            value="<?=$promosi->nama?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Isi</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="isi" rows="3" placeholder="Isi"><?=$promosi->isi?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Tanggal Promosi</label>
                        <div class="col-md-9">
                            <input type="date" name="tgl_promosi" class="form-control"
                            value="<?php $tanggal = date_create($promosi->tgl_promosi); 
                            echo date_format($tanggal,'Y-m-d')?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Diskon</label>
                        <div class="col-md-9">
                            <input type="text" name="potongan_harga" class="form-control" placeholder="Diskon" value="<?=$promosi->potongan_harga?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label"></label>
                        <div class="col-md-9">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>

                </form>
                

            </div>

        </div>
    </div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->