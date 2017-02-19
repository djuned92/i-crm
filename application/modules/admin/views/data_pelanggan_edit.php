<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line">Edit Data Pelanggan</h4>

            </div>

        </div>
        <div class="row">
            <div class="col-md-12">

                <form class="form-horizontal data_pelanggan" action="<?=base_url()?>admin/data_pelanggan/update/<?=$pelanggan->id_user?>" method="POST">
                    
                    <input type="hidden" name="id_user" value="<?=$pelanggan->id_user?>">
                    <input type="hidden" name="id_pelanggan" value="<?=$pelanggan->id_pelanggan?>">

                    <div class="form-group">
                        <label class="col-md-2 control-label">Username</label>
                        <div class="col-md-9">
                            <input type="text" name="username" class="form-control" placeholder="Username" value="<?=$pelanggan->username?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Password</label>
                        <div class="col-md-9">
                            <input type="password" name="password" class="form-control" placeholder="Password" value="<?=$pelanggan->password?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Ulangi Password</label>
                        <div class="col-md-9">
                            <input type="password" name="ulangi_password" class="form-control" placeholder="Ulangi Password" value="<?=$pelanggan->password?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Nama</label>
                        <div class="col-md-9">
                            <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?=$pelanggan->nama?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Email</label>
                        <div class="col-md-9">
                            <input type="email" name="email" class="form-control" placeholder="ex: contoh@gmail.com" value="<?=$pelanggan->email?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Alamat</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="alamat" rows="3" placeholder="Alamat"><?=$pelanggan->alamat?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Tempat, Tanggal Lahir</label>
                        <div class="col-md-5">
                            <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" value="<?=$pelanggan->tempat_lahir?>">
                        </div>

                        <div class="col-md-4">
                            <input type="date" name="tanggal_lahir" class="form-control" value="<?php $tanggal = date_create($pelanggan->tanggal_lahir); echo date_format($tanggal,'Y-m-d')?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Jenis Kelamin</label>
                        <div class="col-md-9">
                          <label class="radio-inline">
                            <input type="radio" name="jenis_kelamin" value="Laki - Laki" <?=($pelanggan->jenis_kelamin == 'Laki - Laki')?'checked':''?>>
                            Laki - Laki
                          </label>
                          <label class="radio-inline">
                            <input type="radio" name="jenis_kelamin" value="Perempuan" <?=($pelanggan->jenis_kelamin == 'Perempuan')?'checked':''?>>
                            Perempuan
                          </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">No telp</label>
                        <div class="col-md-9">
                            <input type="text" name="no_telp" class="form-control" placeholder="No Telp" value="<?=$pelanggan->no_telp?>">
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