<div class="users view">
<h2><?php echo __('Comment'); ?></h2>
	<dl>
		<dt><?php echo __('Instructors'); ?></dt>
		<dd>
			<?php echo h($inscomments['Instructor']['e_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('講師リンクURL'); ?></dt>
		<dd>
			<?php echo h($inscomments['Instructor']['instructor_url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comment'); ?></dt>
		<dd>
			<?php echo h($inscomments['Inscomment']['message']); ?>
			&nbsp;
		</dd>
		<?php
			if( $inscomments['Inscomment']['approval'] != 0){ 
                echo $this->Html->link("Delete Comment", array('action'=>'delete', $inscomments['Inscomment']['id'], $inscomments['Inscomment']['instructor_id']));
            } else {
                echo $this->Html->link("Approve Comment", array('action'=>'activate', $inscomments['Inscomment']['id'], $inscomments['Inscomment']['instructor_id']));
            }
		?>
	</dl>
</div>