<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line">Tambah Promosi</h4>

            </div>

        </div>
        <div class="row">
            <div class="col-md-12">

                <form class="form-horizontal promosi" action="<?=base_url()?>marketing/promosi/add" method="POST">
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label">Wisata</label>
                        <div class="col-md-3">
                            <select class="form-control" name="id_paket_wisata" id="id_paket_wisata" required>
                                <option value="">- Pilih -</option>
                                <?php foreach($paket_wisata as $r): ?>
                                <option value="<?=$r->id_paket_wisata?>"><?=$r->nama_wisata?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <label class="col-md-2 control-label">Lokasi</label>
                        <div class="col-md-4">
                            <input type="text" id="lokasi" class="form-control" placeholder="Lokasi" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Gambar Wisata</label>
                        <div class="col-md-1">
                           <img src="<?=base_url()?>assets/img/" class="img-rounded" 
                           style="width:140px; height:120px;"> 
                        </div>

                        <label class="col-md-2 control-label">Deskripsi</label>
                        <div class="col-md-6">
                            <textarea class="form-control" id="deskripsi" rows="5" placeholder="Deskripsi" 
                            readonly></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Tanggal Mulai</label>
                        <div class="col-md-3">
                            <input class="form-control" id="tgl_mulai" placeholder="Tanggal Mulai" readonly>
                        </div>

                        <label class="col-md-2 control-label">Tanggal Akhir</label>
                        <div class="col-md-4">
                            <input class="form-control" id="tgl_akhir" placeholder="Tanggal Akhir" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Harga</label>
                        <div class="col-md-3">
                            <input type="text" id="harga" class="form-control" placeholder="Harga" readonly>
                        </div>

                        <label class="col-md-2 control-label">Norek Perusahaan</label>
                        <div class="col-md-4">
                            <input type="text" id="norek_perusahaan" class="form-control" placeholder="Nomor Rekening Perusahaan" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Nama Promosi</label>
                        <div class="col-md-9">
                            <input type="text" name="nama" class="form-control" placeholder="Nama Promosi">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Isi</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="isi" rows="3" placeholder="Isi"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Tanggal Promosi</label>
                        <div class="col-md-9">
                            <input type="date" name="tgl_promosi" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Diskon</label>
                        <div class="col-md-9">
                            <input type="text" name="potongan_harga" class="form-control" placeholder="Diskon">
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