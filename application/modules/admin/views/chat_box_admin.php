<?php if($id_user > 0):?>
	<?php if(count($chat) > 0):?>
		<?php foreach($chat->result() as $r):?>
			<?php if($r->id_karyawan == $this->session->userdata('id_user')):?>
				<div class="col-md-12">
				    <b>Anda : </b>
				    <?=$r->isi?>
				    <br />
				    <small class="text-muted"><?=$r->create_at?></small>
				    <hr />    
				</div>
			<?php else:?>
				<div class="col-md-12">
					<?php $id_user = $this->user->get_all($r->id_user)->row_array();?>    
				    <b><?=$id_user->username?></b>
				    <?=$r->isi?>
				    <br />
				    <small class="text-muted"><?=$r->create_at?></small>
				    <hr/>
				</div>
			<?php endif;?>
		<?php endforeach;?>
	<?php endif;?>
<?php endif;?>


<input type="hidden" name="id_user" value="<?=$id_user?>" id="id_user">
<input type="hidden" name="id_last_chat" value="<?=isset($id_last_chat) ? $id_last_chat: '' ;?>" id="id_last_chat">