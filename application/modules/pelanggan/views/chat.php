<div id="content">
    <div class="container">

        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="#">Home</a>
                </li>
                <li>Chat</li>
            </ul>

        </div>

        <div id="resent_chat" class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    RECENT CHAT HISTORY
                </div>
                <div class="panel-body" id="box">
                    <ul class="media-list">

                        <li class="media">

                            <div class="media-body">

                                <div class="media">
                                    <div id="chat-box">
                                        <div class="media-body" >
                                            <div class="col-md-12">
                                                Chat admin atau marketing untuk mengetahui informasi tentang pemesanan Anda atau lainnya.
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </li>
                        
                    </ul>
                </div>

                <div class="panel-footer" style="display: none">
                    <div class="input-group">
                        <input type="text" id="isi" class="form-control" placeholder="Enter Message" />
                        <span class="input-group-btn">
                            <button class="btn btn-info" id="send" type="button" onclick="sendMessage()">SEND</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4" style="float: right!important;">
            <div class="panel panel-primary">
                <div class="panel-heading">
                   CHAT
                </div>
                
                <div class="panel-body">
                    <ul class="media-list">

                        <?php foreach($user as $r):?>
                            <li class="media">

                                <div class="media-body">

                                    <div class="media">
                                        <a class="pull-left" id="<?=$r->id_user?>" id="id_user" href="javascript:void(0)" 
                                        onclick="getChatAll('<?=$r->id_user?>', '<?=$this->session->userdata('id_user')?>')">
                                            <img class="media-object img-circle" style="max-height:40px;" 
                                            src="<?=base_url()?>assets/obaju/img/blog-avatar.jpg" />
                                        </a>
                                        <div class="media-body" >
                                            <h5><?=$r->username?></h5>
                                            
                                           <small class="text-muted">
                                                Chatting                   
                                           </small>
                                        </div>
                                    </div>

                                </div>
                            </li>
                        <?php endforeach;?>

                    </ul>
                </div>
            </div>
        </div>
    

    </div>
</div>
