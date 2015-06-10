<div class="sites form">
<?php echo $this->Form->create('Site'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Site'); ?></legend>
	<?php
		echo $this->Form->input('merit_site');
		echo $this->Form->input('demerite_site');
		echo $this->Form->input('site_image');
		echo $this->Form->input('site_name');
		echo $this->Form->input('site_url_display');
		echo $this->Form->input('site_url_link');
		echo $this->Form->input('company_name');
		echo $this->Form->input('trial_lesson');
		echo $this->Form->input('admission_fee');
		echo $this->Form->input('rate_plan');
		echo $this->Form->input('textbook');
		echo $this->Form->input('lesson_time');
		echo $this->Form->input('lowest_price');
		echo $this->Form->input('payment_method');
		echo $this->Form->input('nationality');
		echo $this->Form->input('group_lesson');
		echo $this->Form->input('certified');
		echo $this->Form->input('bus_conv_course');
		echo $this->Form->input('kisd_course');
		echo $this->Form->input('no_teachers');
		echo $this->Form->input('smartphone_support');
		echo $this->Form->input('duty_system');
		echo $this->Form->input('required_device');
		echo $this->Form->input('support_system');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Sites'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Instructors'), array('controller' => 'instructors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Instructor'), array('controller' => 'instructors', 'action' => 'add')); ?> </li>
	</ul>
</div>
