<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line">Tambah Paket Wisata</h4>

            </div>

        </div>
        <div class="row">
            <div class="col-md-12">

                <form class="form-horizontal paket_wisata" action="<?=base_url()?>marketing/paket_wisata/add" method="POST"
                enctype="multipart/form-data">

                    <div class="form-group">
                        <label class="col-md-2 control-label">Wisata</label>
                        <div class="col-md-9">
                            <input type="text" name="nama_wisata" class="form-control" placeholder="Nama Wisata">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Lokasi</label>
                        <div class="col-md-9">
                            <input type="text" name="lokasi" class="form-control" placeholder="Lokasi">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Gambar Wisata</label>
                        <div class="col-md-9">
                            <input type="file" name="gambar_wisata" class="form-control" multiple="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Rundown Acara</label>
                        <div class="col-md-9">
                            <input type="file" name="rundown_acara" class="form-control" multiple="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Deskripsi</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="deskripsi" rows="3" placeholder="Deskripsi"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Tanggal Mulai</label>
                        <div class="col-md-9">
                            <input type="date" name="tgl_mulai" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Tanggal Akhir</label>
                        <div class="col-md-9">
                            <input type="date" name="tgl_akhir" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Harga</label>
                        <div class="col-md-9">
                            <input type="text" name="harga" class="form-control" placeholder="Harga">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Norek Perusahaan</label>
                        <div class="col-md-9">
                            <input type="text" name="norek_perusahaan" class="form-control" placeholder="Nomor Rekening Perusahaan">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Lokal Agen</label>
                        <div class="col-md-9">
                            <input type="text" name="lokal_agen" class="form-control" placeholder="Lokal Agen">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">No Telp Lokal Agen</label>
                        <div class="col-md-9">
                            <input type="text" name="no_telp_lokal_agen" class="form-control" placeholder="No Telp Lokal Agen">
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