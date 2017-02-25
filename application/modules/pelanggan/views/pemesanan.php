<div id="content">
    <div class="container">

        <div class="col-md-12">
            <table class="table table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Wisata</th>
                            <th>Lokasi</th>
                            <th>Tanggal Pemesanan</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $i = 1;
                            foreach($pemesanan as $r):
                        ?>
                        <tr>
                            <td><?=$i++;?></td>
                            <td><?=$r->nama_wisata?></td>
                            <td><?=$r->lokasi?></td>
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
                            <td>
                                <?php 
                                    $harga_pemesanan = number_format($r->harga_pemesanan,0,'.','.');
                                    echo $harga_pemesanan .' IDR';
                                ?>
                            </td>
                            <td><?=$r->status?></td>
                            <td>
                                <!-- <button class="btn btn-sm btn-danger btn-group" data-toggle="modal" data-placement="bottom" 
                                title="Hapus" data-target="#delete<?=$r->id_user?>">
                                    <i class="fa fa-trash"></i>
                                </button>
                                <button class="btn btn-sm btn-warning btn-group" data-toggle="modal" data-placement="bottom" 
                                title="Detail" data-target="#detail<?=$r->id_user?>">
                                    <i class="fa fa-eye"></i>
                                </button> -->
                                <a href="<?=base_url()?>pelanggan/pembayaran/add/<?=$r->id_pemesanan?>"
                                style="
                                     <?php
                                        if($r->status != 'Segera Dibayar')
                                        {
                                            echo 'pointer-events: none;cursor: default;';
                                        }
                                    ?>  
                                ">
                                    <button class="btn btn-sm btn-primary btn-group" data-placement="bottom" title="Pembayaran"
                                    <?php 
                                            $check_pembayaran = $this->pembayaran->check_pembayaran($r->id_pemesanan)->num_rows();
                                            if($check_pembayaran > 0)
                                            {
                                                echo 'disabled';
                                            }    
                                       ?>
                                    >
                                        <i class="fa fa-money"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>

        </div>
        <!-- /.col-md-9 -->
    </div>
    <!-- /.container -->
</div>
<!-- /#content -->