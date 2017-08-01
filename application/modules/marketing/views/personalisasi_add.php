<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line">Personalisasi Pelanggan <?=$pelanggan->nama?></h4>

            </div>

        </div>
        <div class="row">
            <div class="col-md-12">

                <form class="form-horizontal personalisasi" action="<?=base_url()?>marketing/personalisasi/add" method="POST" 
                enctype="multipart/form-data">

                    <input type="hidden" name="id_pelanggan" value="<?=$pelanggan->id_pelanggan?>">
                    <input type="hidden" name="nama" value="<?=$pelanggan->nama?>">
                    <input type="hidden" name="email" value="<?=$pelanggan->email?>">

                    <div class="form-group">
                        <label class="col-md-3 control-label">Ucapan Selamat Ulang Tahun</label>
                        <div class="col-md-8">
                            <textarea class="form-control" name="isi" rows="3" placeholder="Ucapan Selamat Ulang Tahun"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Tanggal Personalisasi</label>
                        <div class="col-md-8">
                            <input type="date" name="tgl_personal" class="form-control" value="<?=date('Y-m-d')?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>

                </form>
                

            </div>

        </div>
    </div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->