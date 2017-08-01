<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line">Laporan Pemesanan</h4>

            </div>

        </div>
        <div class="row">
            <div class="col-md-12">

                <table class="table table-bordered table-striped" id="myTable">
                    <thead>
                        <tr>
                            <!-- <th>#</th> -->
                            <th>Nama Paket Wisata</th>
                            <th>Tanggal Berangkat</th>
                            <th>Nama Pemesanan</th>
                            <th>No Telp</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $i = 1;
                            foreach($pemesanan as $r):
                        ?>
                            <tr>
                                <!-- <td><?=$i++?></td> -->
                                <td><?php echo $r->nama_wisata?></td>
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
                                <td>
                                    <ul>
                                        <?php
                                            $pelanggan = $this->pemesanan->get_pelanggan($r->id_paket_wisata)->result();
                                            foreach($pelanggan as $datas):
                                            if($datas->id_paket_wisata == $r->id_paket_wisata):
                                        ?>
                                        <li><?=$datas->nama?></li>
                                        <?php endif; endforeach;?>    
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        <?php
                                            $pelanggan = $this->pemesanan->get_pelanggan($r->id_paket_wisata)->result();
                                            foreach($pelanggan as $datas):
                                            if($datas->id_paket_wisata == $r->id_paket_wisata):
                                        ?>
                                        <li><?=$datas->no_telp?></li>
                                        <?php endif; endforeach;?>    
                                    </ul>  
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