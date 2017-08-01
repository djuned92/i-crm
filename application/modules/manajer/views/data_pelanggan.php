<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line">Data Pemesanan</h4>

            </div>

        </div>
        <div class="row">
            <div class="col-md-12">

                <?php if($this->session->flashdata('no_data')):?>
                    <div class="alert alert-info">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong><?php echo $this->session->flashdata('no_data'); ?></strong>
                    </div>
                <?php endif; ?>

                <form class="form-horizontal from-to-tgl" action="<?=base_url()?>manajer/data_pelanggan" method="POST">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Atur Tanggal Pemesanan</label>
                        <div class="col-md-3">
                            <input type="date" name="from_tgl" class="form-control" value="<?=set_value('from_tgl')?>">
                        </div>
                        <label class="col-md-1 control-label">s/d</label>
                        <div class="col-md-3">
                            <input type="date" name="to_tgl" class="form-control" value="<?=set_value('to_tgl')?>">
                        </div>
                        <div class="col-md-1">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <?php if(isset($_POST['from_tgl']) && isset($_POST['to_tgl'])):?>
            <div class="col-md-10 col-md-offset-1">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Paket Wisata</td>
                            <td>Lokasi</td>
                            <td>Tanggal</td>
                            <td>Jumlah Pemesanan</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach($pemesanan as $r): ?>
                        <tr>
                            <td><?=$i++?></td>
                            <td><?=$r->nama_wisata?></td>
                            <td><?=$r->lokasi?></td>
                            <td>
                                <?php
                                    $tgl_mulai = date_create($r->tgl_mulai);
                                    $tgl_mulai = date_format($tgl_mulai, 'd-m-Y');

                                    $tgl_akhir = date_create($r->tgl_akhir);
                                    $tgl_akhir = date_format($tgl_akhir, 'd-m-Y');

                                    echo $tgl_mulai .' s/d '. $tgl_akhir;
                                ?>
                            </td>
                            <td><?=$this->pemesanan->count_pemesanan_by_paket_wisata($r->id_paket_wisata)?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif;?>
    </div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->