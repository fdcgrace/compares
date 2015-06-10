<div class="instructors view">
<h2><?php echo __('Instructor'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($instructor['Instructor']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Site'); ?></dt>
		<dd>
			<?php echo $this->Html->link($instructor['Site']['site_name'], array('controller' => 'sites', 'action' => 'view', $instructor['Site']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('E Name'); ?></dt>
		<dd>
			<?php echo h($instructor['Instructor']['e_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('K Name'); ?></dt>
		<dd>
			<?php echo h($instructor['Instructor']['k_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($instructor['Instructor']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
			<?php echo h($instructor['Instructor']['gender']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Birthdate'); ?></dt>
		<dd>
			<?php echo h($instructor['Instructor']['birthdate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Age'); ?></dt>
		<dd>
			<?php echo h($instructor['Instructor']['age']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Educ'); ?></dt>
		<dd>
			<?php echo h($instructor['Instructor']['education']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course'); ?></dt>
		<dd>
			<?php echo h($instructor['Instructor']['course']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Speak Japanese'); ?></dt>
		<dd>
			<?php echo h($instructor['Instructor']['speak_japanese']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Language'); ?></dt>
		<dd>
			<?php echo h($instructor['Instructor']['language']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('History'); ?></dt>
		<dd>
			<?php echo h($instructor['Instructor']['instructor_history']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hobby'); ?></dt>
		<dd>
			<?php echo h($instructor['Instructor']['hobby']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Evaluation'); ?></dt>
		<dd>
			<?php echo h($instructor['Instructor']['evaluation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Eval Comment'); ?></dt>
		<dd>
			<?php echo h($instructor['Instructor']['eval_comment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Video'); ?></dt>
		<dd>
			<?php echo h($instructor['Instructor']['introduction_video']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Movie'); ?></dt>
		<dd>
			<?php echo h($instructor['Instructor']['favorite_movie']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Work Place'); ?></dt>
		<dd>
			<?php echo h($instructor['Instructor']['work_place']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Message'); ?></dt>
		<dd>
			<?php echo h($instructor['Instructor']['message']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tag'); ?></dt>
		<dd>
			<?php echo h($instructor['Instructor']['tag']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Instructor Url'); ?></dt>
		<dd>
			<?php echo h($instructor['Instructor']['instructor_url']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
