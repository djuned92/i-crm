<script>
    $(document).ready(function(){
        $('#myTable').DataTable();
    });

    $('#pesan-submit').on('click', function() {
        $('#pesan').submit();
    })
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

<!-- Validation script -->
<script type="text/javascript">
    $(document).ready(function() {
        $('.defaultForm').formValidation({
            framework : 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                username: {
                    message: 'The username is not valid',
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
                }
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.profile').formValidation({
            framework : 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
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
        $('.ulasan').formValidation({
            framework : 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                isi_kritik: {
                    message: 'The username is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Kritik tidak boleh kosong'
                        }
                    }
                },
                isi_testimoni: {
                    validators: {
                        notEmpty: {
                            message: 'Testimoni tidak boleh kosong'
                        }
                    }
                }
            }
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
        url     : "<?=site_url('pelanggan/chat/getChatAll')?>",
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
        url     : "<?php echo site_url('pelanggan/chat/getChat') ?>",
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
        url     : "<?php echo site_url('pelanggan/chat/getLastId') ?>",
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
            url     : "<?php echo site_url('pelanggan/chat/sendMessage') ?>",
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