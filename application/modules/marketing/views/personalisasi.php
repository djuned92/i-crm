<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line">Personalisasi</h4>

            </div>

        </div>
       
        <div class="row">
            <div class="col-md-12">
				
					<h4>Pelanggan yang berulang tahun hari ini</h4>
					<br/>
					<table class="table table-striped">
						<thead>
							<tr>
								<td>#</td>
								<td>Nama</td>
								<td>Alamat</td>
								<td>Tempat, Tanggal Lahir</td>
								<td>Jenis Kelamin</td>
								<td>No Telp</td>
								<td>Aksi</td>
							</tr>
						</thead>
						<tbody>
							<?php
								$i = 1; 
								foreach($pelanggan as $r):
								$tgl_lahir = date_create($r->tanggal_lahir);
								$tgl_lahir = date_format($tgl_lahir,'m-d'); 
								$date_lahir = date('m-d');
								if($tgl_lahir == $date_lahir):
							?>
							<tr>
								<td><?=$i++?></td>
								<td><?=$r->nama?></td>
								<td><?=$r->alamat?></td>
								<td>
									<?=$r->tempat_lahir?>, 
									<?php 
	                                    $tanggal = $r->tanggal_lahir;
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
								<td><?=$r->jenis_kelamin?></td>
								<td><?=$r->no_telp?></td>
								<td>
									<a href="<?=base_url()?>marketing/personalisasi/add/<?=$r->id_pelanggan?>">
	                                    <button class="btn btn-sm btn-success btn-group" data-placement="bottom" title="Personalisasi Pelanggan">
	                                        <i class="fa fa-birthday-cake"></i>
	                                    </button>
	                                </a> 
								</td>
							</tr>
							<?php endif; endforeach;?> 

						</tbody>
					</table>

            </div>
        </div>
    </div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->

