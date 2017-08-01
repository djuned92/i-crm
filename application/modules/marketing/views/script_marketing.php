<script>
	$(document).ready(function(){
    	$('#myTable').DataTable();
	});
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.paket_wisata').formValidation({
            framework : 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                nama_wisata: {
                    validators: {
                        notEmpty: {
                            message: 'Wisata tidak boleh kosong'
                        }
                    }
                },
                lokasi: {
                    validators: {
                        notEmpty: {
                            message: 'Lokasi tidak boleh kosong'
                        }
                    }
                },
                userfile: {
                    validators: {
                        // notEmpty: {
                        //     message: 'Gambar tidak boleh kosong'
                        // },
                        file: {
                            extension: 'jpg,png',
                            // type: '<?=base_url()?>assets/img/jpg?>,<?=base_url()?>assets/img/png?>',
                            message: 'Tipe gambar harus .jpg atau .png'
                        }
                    }
                },
                deskripsi: {
                    validators: {
                        notEmpty: {
                            message: 'Deskripsi tidak boleh kosong'
                        }
                    }
                },
                tgl_mulai: {
                    validators: {
                        notEmpty: {
                            message: 'Tanggal mulai tidak boleh kosong'
                        }
                    }
                },
                tgl_akhir: {
                    validators: {
                        notEmpty: {
                            message: 'Tanggal akhir tidak boleh kosong'
                        }
                    }
                },
                harga: {
                    validators: {
                        notEmpty: {
                            message: 'Harga tidak boleh kosong'
                        },
                      //   digits: {
                      //   message: 'Harga tidak benar'
                      // }
                    }
                },
                norek_perusahaan: {
                    validators: {
                        notEmpty: {
                            message: 'Nomor rekening perusahaan tidak boleh kosong'
                        }
                    }
                },
                lokal_agen: {
                    validators: {
                        notEmpty: {
                            message: 'Lokal agen tidak boleh kosong'
                        }
                    }
                },
                no_telp_lokal_agen: {
                    validators: {
                        notEmpty: {
                            message: 'Nomor telepon lokal agen tidak boleh kosong'
                        }
                    }
                },
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.lihat_pemesanan').formValidation({
            framework : 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                kode_pemesanan: {
                    validators: {
                        notEmpty: {
                            message: 'Nomor pemesanan tidak boleh kosong'
                        }
                    }
                }
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.promosi').formValidation({
            framework : 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                id_paket_wisata: {
                    validators: {
                        notEmpty: {
                            message: 'Paket wisata belum dipilih'
                        }
                    }
                },
                nama: {
                    validators: {
                        notEmpty: {
                            message: 'Nama Promosi tidak boleh kosong'
                        }
                    }
                },
                isi: {
                    validators: {
                        notEmpty: {
                            message: 'Isi tidak boleh kosong'
                        }
                    }
                },
                tgl_promosi: {
                    validators: {
                        notEmpty: {
                            message: 'Tanggal promosi tidak boleh kosong'
                        }
                    }
                },
                potongan_harga: {
                    validators: {
                        notEmpty: {
                            message: 'Diskon tidak boleh kosong'
                        }
                    }
                },
            }
        });
    });
</script>

<script>
$(document).ready(function(){
    $("#id_paket_wisata").change(function() {
        var id_paket_wisata = $("#id_paket_wisata").val();
        $.ajax({
          url:"<?=base_url()?>marketing/promosi/paket_wisata/"+id_paket_wisata,
          type:"GET",
          dataType:"json",
          // data: {},
          success:function(data)
          {
            console.log(data);
            $("#nama_wisata").val(data.nama_wisata);
            $("#lokasi").val(data.lokasi);
            $("#gamba_wisata").val(data.gamba_wisata);
            $("#deskripsi").val(data.deskripsi);
            $("#tgl_mulai").val(data.tgl_mulai);
            $("#tgl_akhir").val(data.tgl_akhir);
            $("#harga").val(data.harga);
            $("#norek_perusahaan").val(data.norek_perusahaan);
          }
        });
    });
});
</script>

<!-- chating -->
<script type="text/javascript">
 $(document).ready(function(){
    //getChat(0);
    $("#user").click(function(){
        $("#id_last_chat").val('0');
    });

    setInterval(function(){
        if($("#to_id_user").val() > 0){
            //getLastId($("#id_user").val(),$("#id_last_chat").val());
            //getChat($("#id_user").val(),$("#id_last_chat").val());
            getChatAll($("#to_id_user").val(),$("#id_last_chat").val());
            autoScroll();
        }else{

        }
    },3000);
});

function getChatAll(from_id_user,to_id_user){

    $.ajax({
        url     : "<?=site_url('marketing/chat/getChatAll')?>",
        type    : 'POST',
        dataType: 'html',
        data    : {from_id_user:from_id_user,to_id_user:to_id_user},
        beforeSend  : function(){
            $("#loading").show();
        },
        success : function(result){
            $("#loading").hide();
            $("#chat-box").html(result);
            $(".panel-footer").show();

            autoScroll();
            document.getElementById('message').focus();
        }
    });
}

function getChat(from_id_user,to_id_user){


    $.ajax({
        url     : "<?php echo site_url('marketing/chat/getChat') ?>",
        type    : 'POST',
        dataType: 'html',
        data    : {from_id_user:from_id_user,to_id_user:to_id_user},
        beforeSend  : function(){
            $("#loading").show();
        },
        success : function(result){
            $("#loading").hide();
            if(id_user != $("#id_user").val() ){
                $("#chat-box").html(result);
            }else{
                $("#chat-box").append(result);
            }
            $(".panel-footer").show();
            document.getElementById('message').focus();
        }
    });
}

function getLastId(id_user,id_last_chat){
    $.ajax({
        url     : "<?php echo site_url('marketing/chat/getLastId') ?>",
        type    : 'POST',
        dataType: 'json',
        data    : {id_user:id_user,id_last_chat:id_last_chat},
        beforeSend  : function(){

        },
        success : function(result){
            $("#id_last_chat").val(result.id);
        }
    });
}

function sendMessage(){
    var message   = $("#message").val();
    var to_id_user = $("#to_id_user").val();


    if(message == ''){
        document.getElementById('message').focus();
    }else{
        $.ajax({
            url     : "<?php echo site_url('marketing/chat/sendMessage') ?>",
            type    : 'POST',
            dataType: 'json',
            data    : {to_id_user:to_id_user,message:message},
            beforeSend  : function(){
            },
            success : function(result){
                getChat($("#id_user").val(),$("#id_last_chat").val());
                getLastId($("#id_user").val(),$("#id_last_chat").val());
                $("#message").val('');
                getChatAll($("#id_user").val(),$("#id_last_chat").val());
                autoScroll();

            }
        });
    }
}

// function autoScroll(){
//     var elem = document.getElementById('box');
//     elem.scrollTop = elem.scrollHeight;
// }

function aktifkan(i){
    $("li").removeClass("active");
    $("#aktif-"+i).addClass("active");
}
</script>