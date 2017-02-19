<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line">Tambah Data Pengguna</h4>

            </div>

        </div>
        <div class="row">
            <div class="col-md-12">

                <form class="form-horizontal data_pengguna" action="<?=base_url()?>admin/data_pengguna/add" method="POST">
                    
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
                        <label class="col-md-2 control-label">Level</label>
                        <div class="col-md-9">
                       <select class="form-control" name="level" required>
                                <option value="">- Pilih -</option>
                                <option value="1">Admin</option>
                                <option value="2">Marketing</option>
                                <option value="3">Manajer</option>
                            </select>
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

                    <!-- <div class="form-group">
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
                    </div> -->

                    <div class="form-group">
                        <label class="col-md-2 control-label">No telp</label>
                        <div class="col-md-9">
                            <input type="text" name="no_telp" class="form-control" placeholder="No Telp">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Jabatan</label>
                        <div class="col-md-9">
                            <input type="text" name="jabatan" class="form-control" placeholder="Jabatan">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Atasan</label>
                        <div class="col-md-9">
                        <select class="form-control" name="id_atasan" id="id_atasan" required>
                            <option value="">- Pilih -</option>
                            <?php foreach($atasan as $r): ?>
                            <option value="<?=$r->id_atasan?>"><?=$r->nama_atasan?></option>
                            <?php endforeach; ?>
                        </select>
                        </div>
                    </div>

                    <input type="hidden" name="id_departement" id="id_departement" value="">

                    <div class="form-group">
                        <label class="col-md-2 control-label">Departement</label>
                        <div class="col-md-9">
                            <input type="text" id="nama_departement" name="nama_departement" class="form-control" placeholder="Departement" readonly>
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