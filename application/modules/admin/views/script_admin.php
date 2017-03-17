<script>
	$(document).ready(function(){
    	$('#myTable').DataTable();
	});
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.data_pelanggan').formValidation({
            framework : 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                username: {
                    validators: {
                        notEmpty: {
                            message: 'Username tidak boleh kosong'
                        }
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'Password tidak boleh kosong'
                        }
                    }
                },
                ulangi_password: {
                    validators: {
                        notEmpty: {
                            message: 'Ulangi Password tidak boleh kosong'
                        },
                        identical: {
                            field: 'password',
                            message: 'Password tidak sama'
                        }
                    }
                },
                nama: {
                    validators: {
                        notEmpty: {
                            message: 'Nama tidak boleh kosong'
                        }
                    }
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: 'Email tidak boleh kosong'
                        },
                        emailAddress: {
                        	message: 'Email tidak valid'
                        }
                    }
                },
                alamat: {
                    validators: {
                        notEmpty: {
                            message: 'Alamat tidak boleh kosong'
                        }
                    }
                },
                tempat_lahir: {
                    validators: {
                        notEmpty: {
                            message: 'Tempat Lahir tidak boleh kosong'
                        }
                    }
                },
                tanggal_lahir: {
                    validators: {
                        notEmpty: {
                            message: 'Tanggal Lahir tidak boleh kosong'
                        }
                    }
                },
                jenis_kelamin: {
                    validators: {
                        notEmpty: {
                            message: 'Jenis kelamin belum dipilih'
                        }
                    }
                },
                no_telp: {
                    validators: {
                        notEmpty: {
                            message: 'No telp tidak boleh kosong'
                        },
                        digits: {
                        message: 'No telp harus berupa angka'
                      }
                    }
                }
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.data_pengguna').formValidation({
            framework : 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                username: {
                    validators: {
                        notEmpty: {
                            message: 'Username tidak boleh kosong'
                        }
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'Password tidak boleh kosong'
                        }
                    }
                },
                ulangi_password: {
                    validators: {
                        notEmpty: {
                            message: 'Ulangi Password tidak boleh kosong'
                        },
                        identical: {
                            field: 'password',
                            message: 'Password tidak sama'
                        }
                    }
                },
                level: {
                    validators: {
                        notEmpty: {
                            message: 'Level belum dipilih'
                        }
                    }
                },
                id_atasan: {
                    validators: {
                        notEmpty: {
                            message: 'Atasan belum dipilih'
                        }
                    }
                },
                nama: {
                    validators: {
                        notEmpty: {
                            message: 'Nama tidak boleh kosong'
                        }
                    }
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: 'Email tidak boleh kosong'
                        },
                        emailAddress: {
                            message: 'Email tidak valid'
                        }
                    }
                },
                alamat: {
                    validators: {
                        notEmpty: {
                            message: 'Alamat tidak boleh kosong'
                        }
                    }
                },
                no_telp: {
                    validators: {
                        notEmpty: {
                            message: 'No telp tidak boleh kosong'
                        },
                        digits: {
                        message: 'No telp harus berupa angka'
                      }
                    }
                },
                jabatan: {
                    validators: {
                        notEmpty: {
                            message: 'Jabatan tidak boleh kosong'
                        }
                    }
                },
            }
        });
    });
</script>


<script>
$(document).ready(function(){
    $("#id_atasan").change(function() {
        var id_atasan = $("#id_atasan").val();
        $.ajax({
          url:"<?=base_url()?>admin/data_pengguna/atasan/"+id_atasan,
          type:"GET",
          dataType:"json",
          // data: {},
          success:function(data)
          {
            console.log(data);
            $("#id_departement").val(data.id_departement);
            $("#nama_departement").val(data.nama_departement);
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
        if($("#id_user").val() > 0){
            //getLastId($("#id_user").val(),$("#id_last_chat").val()); 
            //getChat($("#id_user").val(),$("#id_last_chat").val()); 
            getChatAll($("#id_user").val(),$("#id_last_chat").val());
            autoScroll();
        }else{
            
        }
    },3000);
});

function getChatAll(id_user,id_last_chat){
    
    $.ajax({
        url     : "<?=site_url('admin/chat/getChatAll')?>",
        type    : 'POST',
        dataType: 'html',
        data    : {id_user:id_user,id_last_chat:id_last_chat},
        beforeSend  : function(){
            $("#loading").show();
        },
        success : function(result){
            $("#loading").hide();
            $("#chat-box").html(result);
            $(".panel-footer").show();
            
            autoScroll();
            document.getElementById('isi').focus();
        }
    });
}

function getChat(id_user,id_last_chat){
   
    
    $.ajax({
        url     : "<?php echo site_url('admin/chat/getChat') ?>",
        type    : 'POST',
        dataType: 'html',
        data    : {id_user:id_user,id_last_chat:id_last_chat},
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
            document.getElementById('isi').focus();
        }
    });
}

function getLastId(id_user,id_last_chat){
    $.ajax({
        url     : "<?php echo site_url('admin/chat/getLastId') ?>",
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
    var isi   = $("#isi").val();
    var id_user = $("#id_user").val();
    
    
    if(isi == ''){
        document.getElementById('isi').focus();
    }else{
        $.ajax({
            url     : "<?php echo site_url('admin/chat/sendMessage') ?>",
            type    : 'POST',
            dataType: 'json',
            data    : {id_user:id_user,isi:isi},
            beforeSend  : function(){
            },
            success : function(result){
                getChat($("#id_user").val(),$("#id_last_chat").val());
                getLastId($("#id_user").val(),$("#id_last_chat").val()); 
                $("#isi").val('');
                getChatAll($("#id_user").val(),$("#id_last_chat").val());
                autoScroll();

            }
        });
    }
}

function autoScroll(){
    var elem = document.getElementById('box');
    elem.scrollTop = elem.scrollHeight;
}

function aktifkan(i){
    $("li").removeClass("active");
    $("#aktif-"+i).addClass("active");
}
</script>