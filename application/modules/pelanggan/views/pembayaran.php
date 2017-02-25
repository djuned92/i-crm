<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-11 col-md-offset-1">
                <h4>Pembayaran</h4>

            </div>

        </div>
        <div class="row">
            <div class="col-md-12">

                <form class="form-horizontal pembayaran" action="<?=base_url()?>pelanggan/pembayaran/add" method="POST">
                    
                    <input type="hidden" name="id_pelanggan" value="<?=$pemesanan->id_pelanggan?>">
                    <input type="hidden" name="id_pemesanan" value="<?=$pemesanan->id_pemesanan?>">

                    <div class="form-group">
                        <label class="col-md-2 control-label">Wisata</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" value="<?=$pemesanan->nama_wisata?>" readonly>
                        </div>

                        <label class="col-md-2 control-label">Lokasi</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" value="<?=$pemesanan->lokasi?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Gambar Wisata</label>
                        <div class="col-md-1">
                           <img src="<?=base_url()?>assets/img/<?=$pemesanan->gambar_wisata?>" class="img-rounded" 
                           style="width:140px; height:120px;"> 
                        </div>

                        <label class="col-md-2 control-label">Deskripsi</label>
                        <div class="col-md-6">
                            <textarea class="form-control" rows="5" readonly><?=$pemesanan->deskripsi?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Tanggal Berangkat</label>
                        <div class="col-md-3">
                            <input class="form-control" 
                            value="<?php 
                                $tanggal = $pemesanan->tgl_mulai;
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

                        <label class="col-md-2 control-label">Tanggal Pemesanan</label>
                        <div class="col-md-4">
                            <input class="form-control" 
                            value="<?php 
                                $tanggal = $pemesanan->tgl_pemesanan;
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
                            <input type="text" class="form-control" 
                            value="<?php 
                                    $harga = number_format($pemesanan->harga_pemesanan,0,'.','.');
                                    echo $harga .' IDR';
                                    ?>" readonly>
                        </div>

                        <label class="col-md-2 control-label">Norek Perusahaan</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" value="<?=$pemesanan->norek_perusahaan?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Atas Nama</label>
                        <div class="col-md-9">
                            <input type="text" name="nama_pemilik" class="form-control" placeholder="Atas Nama">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">No Rekening</label>
                        <div class="col-md-9">
                            <input type="text" name="norek_pemilik" class="form-control" placeholder="Nomor Rekening">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Jumlah Transfer</label>
                        <div class="col-md-9">
                            <input type="text" name="jml_transfer" class="form-control" placeholder="Jumlah Transfer">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Tanggal Transfer</label>
                        <div class="col-md-3">
                            <input type="date" name="tgl_transfer" class="form-control">
                        </div>

                        <label class="col-md-2 control-label">Jam</label>
                        <div class="col-md-4">
                            <input type="text" name="jam" class="form-control" placeholder="contoh: 16.00">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label"></label>
                        <div class="col-md-9">
                            <button type="submit" class="btn btn-primary">Bayar</button>
                        </div>
                    </div>

                </form>
                

            </div>

        </div>
    </div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->