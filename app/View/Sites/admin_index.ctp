<div class="sites index">
	<h2><?php echo __('Sites'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('merit_site'); ?></th>
			<th><?php echo $this->Paginator->sort('demerite_site'); ?></th>
			<th><?php echo $this->Paginator->sort('site_image'); ?></th>
			<th><?php echo $this->Paginator->sort('site_name'); ?></th>
			<th><?php echo $this->Paginator->sort('site_url_display'); ?></th>
			<th><?php echo $this->Paginator->sort('site_url_link'); ?></th>
			<th><?php echo $this->Paginator->sort('company_name'); ?></th>
			<th><?php echo $this->Paginator->sort('trial_lesson'); ?></th>
			<th><?php echo $this->Paginator->sort('admission_fee'); ?></th>
			<th><?php echo $this->Paginator->sort('rate_plan'); ?></th>
			<th><?php echo $this->Paginator->sort('textbook'); ?></th>
			<th><?php echo $this->Paginator->sort('lesson_time'); ?></th>
			<th><?php echo $this->Paginator->sort('lowest_price'); ?></th>
			<th><?php echo $this->Paginator->sort('payment_method'); ?></th>
			<th><?php echo $this->Paginator->sort('nationality'); ?></th>
			<th><?php echo $this->Paginator->sort('group_lesson'); ?></th>
			<th><?php echo $this->Paginator->sort('certified'); ?></th>
			<th><?php echo $this->Paginator->sort('bus_conv_course'); ?></th>
			<th><?php echo $this->Paginator->sort('kisd_course'); ?></th>
			<th><?php echo $this->Paginator->sort('no_teachers'); ?></th>
			<th><?php echo $this->Paginator->sort('smartphone_support'); ?></th>
			<th><?php echo $this->Paginator->sort('duty_system'); ?></th>
			<th><?php echo $this->Paginator->sort('required_device'); ?></th>
			<th><?php echo $this->Paginator->sort('support_system'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($sites as $site): ?>
	<tr>
		<td><?php echo h($site['Site']['id']); ?>&nbsp;</td>
		<td><?php echo h($site['Site']['merit_site']); ?>&nbsp;</td>
		<td><?php echo h($site['Site']['demerite_site']); ?>&nbsp;</td>
		<td><?php echo h($site['Site']['site_image']); ?>&nbsp;</td>
		<td><?php echo h($site['Site']['site_name']); ?>&nbsp;</td>
		<td><?php echo h($site['Site']['site_url_display']); ?>&nbsp;</td>
		<td><?php echo h($site['Site']['site_url_link']); ?>&nbsp;</td>
		<td><?php echo h($site['Site']['company_name']); ?>&nbsp;</td>
		<td><?php echo h($site['Site']['trial_lesson']); ?>&nbsp;</td>
		<td><?php echo h($site['Site']['admission_fee']); ?>&nbsp;</td>
		<td><?php echo h($site['Site']['rate_plan']); ?>&nbsp;</td>
		<td><?php echo h($site['Site']['textbook']); ?>&nbsp;</td>
		<td><?php echo h($site['Site']['lesson_time']); ?>&nbsp;</td>
		<td><?php echo h($site['Site']['lowest_price']); ?>&nbsp;</td>
		<td><?php echo h($site['Site']['payment_method']); ?>&nbsp;</td>
		<td><?php echo h($site['Site']['nationality']); ?>&nbsp;</td>
		<td><?php echo h($site['Site']['group_lesson']); ?>&nbsp;</td>
		<td><?php echo h($site['Site']['certified']); ?>&nbsp;</td>
		<td><?php echo h($site['Site']['bus_conv_course']); ?>&nbsp;</td>
		<td><?php echo h($site['Site']['kisd_course']); ?>&nbsp;</td>
		<td><?php echo h($site['Site']['no_teachers']); ?>&nbsp;</td>
		<td><?php echo h($site['Site']['smartphone_support']); ?>&nbsp;</td>
		<td><?php echo h($site['Site']['duty_system']); ?>&nbsp;</td>
		<td><?php echo h($site['Site']['required_device']); ?>&nbsp;</td>
		<td><?php echo h($site['Site']['support_system']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $site['Site']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $site['Site']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $site['Site']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $site['Site']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Site'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Instructors'), array('controller' => 'instructors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Instructor'), array('controller' => 'instructors', 'action' => 'add')); ?> </li>
	</ul>
</div>
