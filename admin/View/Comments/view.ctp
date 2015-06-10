<div class="users view">
<h2><?php echo __('Comment'); ?></h2>
	<dl>
		
		<dd><img src="<?php echo $retrieveSiteThumb.$comment['Site']['site_image'] ?>"></dd>
		<dt><?php echo __('Site'); ?></dt>
		<dd>
			<?php echo h($comment['Site']['site_name']); ?>
			&nbsp;
		</dd>
		<dd>
			<?php echo h($comment['Site']['site_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Site URL'); ?></dt>
		<dd>
			<?php echo h($comment['Site']['site_url_link']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo h($comment['User']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comment'); ?></dt>
		<dd>
			<?php echo h($comment['Comment']['message']); ?>
			&nbsp;
		</dd>
		<?php
			if( $comment['Comment']['approval'] != 0){ 
                echo $this->Html->link("Delete Comment", array('action'=>'delete', $comment['Comment']['id'], $comment['Comment']['site_id']));
            } else {
                echo $this->Html->link("Approve Comment", array('action'=>'activate', $comment['Comment']['id'], $comment['Comment']['site_id']));
            }
		?>
	</dl>
</div>