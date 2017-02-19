<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line">Data Pengguna</h4>

            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="<?=base_url()?>admin/data_pengguna/add"><button class="btn btn-primary btn-md"><i class="fa fa-plus"> Tambah Pengguna</i></button></a>
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
                            <!-- <th>Username</th> -->
                            <th>Level</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Nama Atasan</th>
                            <th>Departement</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $i = 1;
                            foreach($karyawan as $r):
                        ?>
                        <tr>
                            <td><?=$i++;?></td>
                            <!-- <td><?=$r->username?></td> -->
                            <td>
                                <?php 
                                    if($r->level == 1)
                                    {
                                        echo "Admin";
                                    }
                                    elseif($r->level == 2)
                                    {
                                        echo "Marketing";
                                    }
                                    elseif($r->level == 3)
                                    {
                                        echo "Manajer";
                                    }
                                    else
                                    {
                                        echo "Pelanggan";
                                    }
                                ?>
                            </td>
                            <td><?=$r->nama?></td>
                            <td><?=$r->jabatan?></td>
                            <td><?=$r->nama_atasan?></td>
                            <td><?=$r->nama_departement?></td>
                            <td>
                                <button class="btn btn-sm btn-danger btn-group" data-toggle="modal" data-placement="bottom" 
                                title="Hapus" data-target="#delete<?=$r->id_user?>">
                                    <i class="fa fa-trash"></i>
                                </button>
                                <button class="btn btn-sm btn-warning btn-group" data-toggle="modal" data-placement="bottom" 
                                title="Detail" data-target="#detail<?=$r->id_user?>">
                                    <i class="fa fa-eye"></i>
                                </button>
                                <a href="<?=base_url()?>admin/data_pengguna/update/<?=$r->id_user?>">
                                    <button class="btn btn-sm btn-info btn-group" data-placement="bottom" title="Edit">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </a> 
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
<?php foreach($karyawan as $r): ?>
<div class="modal fade" id="delete<?=$r->id_user?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Hapus User</h4>
            </div>

            <form action="<?=base_url()?>admin/data_pengguna/delete/<?=$r->id_user?>" class="form-horizontal" method="POST">
                <div class="modal-body">
                    <h4>Apakah anda ingin menghapus pengguna dengan nama <strong><?=$r->nama?> ?</strong></h4>
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
<?php foreach($karyawan as $r): ?>
<div class="modal fade" id="detail<?=$r->id_user?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Detail Pengguna</h4>
            </div>

            <div class="modal-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th colspan="2"><?=$r->nama?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Username</td>
                            <td><?=$r->username?></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td><?=$r->nama?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?=$r->email?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td><?=$r->alamat?></td>
                        </tr>
                        <tr>
                            <td>No Telp</td>
                            <td><?=$r->no_telp?></td>
                        </tr>
                        <tr>
                            <td>Jabatan</td>
                            <td><?=$r->jabatan?></td>
                        </tr>
                        <tr>
                            <td>Atasan</td>
                            <td><?=$r->nama_atasan?></td>
                        </tr>
                        <tr>
                            <td>Departement</td>
                            <td><?=$r->nama_departement?></td>
                        </tr>
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