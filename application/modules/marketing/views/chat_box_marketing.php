<?php if($id_user > 0):?>
	<?php if(count($chat) > 0):?>
		<?php foreach($chat->result() as $r):
			// return var_dump($r);
		?>
			<?php if($r->from_id_user == $this->session->userdata('id_user')):?>
				<div class="col-md-12">
				    <b><?=$this->session->userdata('username')?> : </b>
				    <?=$r->message?>
				    <br />
				    <small class="text-muted"><?=$r->create_at?></small>
				    <hr />    
				</div>
			<?php else:?>
				<div class="col-md-12">
					<?php $user = $this->user->get_by_id($r->from_id_user)->row();?>    
				    <b><?=$user->username?></b>
				    <?=$r->message?>
				    <br />
				    <small class="text-muted"><?=$r->create_at?></small>
				    <hr/>
				</div>
			<?php endif;?>
		<?php endforeach;?>
	<?php endif;?>
<?php endif;?>


<input type="hidden" name="to_id_user" value="<?=$id_user?>" id="to_id_user">
<input type="hidden" name="id_last_chat" value="<?=isset($id_last_chat) ? $id_last_chat: '' ;?>" id="id_last_chat">