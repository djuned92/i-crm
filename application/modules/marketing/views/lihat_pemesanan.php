<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line">Lihat Pemesanan</h4>

            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                
                <?php if($this->session->flashdata('kode_salah')):?>
                    <div class="alert alert-info">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong><?php echo $this->session->flashdata('kode_salah'); ?></strong>
                    </div>
                <?php endif; ?>

                <form class="form-horizontal lihat_pemesanan" action="<?=base_url()?>marketing/lihat_pemesanan" method="POST">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Nomor Pemesanan</label>
                        <div class="col-md-8">
                            <input type="text" name="kode_pemesanan" class="form-control" placeholder="Nomor Pemesanan">
                        </div>
                        <div class="col-md-1">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <?php if(isset($_POST['kode_pemesanan']) && !empty($_POST['kode_pemesanan'])):?>
            <div class="col-md-8 col-md-offset-2">
                <table class="table table-striped">
                    <?php foreach($pemesanan as $r):?>
                        <tr>
                            <td><b>Nomor Pemesanan</b></td>
                            <td><?=$r->kode_pemesanan?></td>
                        </tr>
                        <tr>
                            <td><b>Nama Pemesan</b></td>
                            <td><?=$r->nama?></td>
                        </tr>
                        <tr>
                            <td><b>Tanggal Pemesanan</b></td>
                            <td>
                                <?php 
                                    $tanggal = $r->tgl_pemesanan;
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
                            <td><b>Status Pemesanan</b></td>
                            <td><?=$r->status?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><b>Nama Wisata</b></td>
                            <td><?=$r->nama_wisata?></td>
                        </tr>
                        <tr>
                            <td><b>Lokasi Wisata</b></td>
                            <td><?=$r->lokasi?></td>
                        </tr>
                        <tr>
                            <td><b>Tanggal Mulai</b></td>
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
                            <td><b>Tanggal Akhir</b></td>
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
                            <td><b>Harga</b></td>
                            <td><?php $harga = number_format($r->harga_pemesanan,0,'.','.');echo $harga;?> IDR</td>
                        </tr>
                        <tr>
                            <td><b>No Rekening Perusahaan</b></td>
                            <td><?=$r->norek_perusahaan?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <?php endif;?>

        </div>
    </div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->