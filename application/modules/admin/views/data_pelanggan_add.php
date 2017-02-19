<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line">Tambah Data Pelanggan</h4>

            </div>

        </div>
        <div class="row">
            <div class="col-md-12">

                <form class="form-horizontal data_pelanggan" action="<?=base_url()?>admin/data_pelanggan/add" method="POST">
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label">Username</label>
                        <div class="col-md-9">
                            <input type="text" name="username" class="form-control" placeholder="Username">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Password</label>
                        <div class="col-md-9">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Ulangi Password</label>
                        <div class="col-md-9">
                            <input type="password" name="ulangi_password" class="form-control" placeholder="Ulangi Password">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Nama</label>
                        <div class="col-md-9">
                            <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Email</label>
                        <div class="col-md-9">
                            <input type="email" name="email" class="form-control" placeholder="ex: contoh@gmail.com">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Alamat</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="alamat" rows="3" placeholder="Alamat"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Tempat, Tanggal Lahir</label>
                        <div class="col-md-5">
                            <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir">
                        </div>

                        <div class="col-md-4">
                            <input type="date" name="tanggal_lahir" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Jenis Kelamin</label>
                        <div class="col-md-9">
                          <label class="radio-inline">
                            <input type="radio" name="jenis_kelamin" value="Laki - Laki">
                            Laki - Laki
                          </label>
                          <label class="radio-inline">
                            <input type="radio" name="jenis_kelamin" value="Perempuan">
                            Perempuan
                          </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">No telp</label>
                        <div class="col-md-9">
                            <input type="text" name="no_telp" class="form-control" placeholder="No Telp">
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