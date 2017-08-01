<script>
    $(document).ready(function(){
        $('#myTable').DataTable();
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
        url     : "<?=site_url('admin/chat/getChatAll')?>",
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
        url     : "<?php echo site_url('admin/chat/getChat') ?>",
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
    var message   = $("#message").val();
    var to_id_user = $("#to_id_user").val();
    
    
    if(message == ''){
        document.getElementById('message').focus();
    }else{
        $.ajax({
            url     : "<?php echo site_url('admin/chat/sendMessage') ?>",
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