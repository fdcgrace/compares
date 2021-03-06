<div class="instructors index">
	<h2><?php echo __('Instructors'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('site_id'); ?></th>
			<th><?php echo $this->Paginator->sort('e_name'); ?></th>
			<th><?php echo $this->Paginator->sort('k_name'); ?></th>
			<th><?php echo $this->Paginator->sort('address'); ?></th>
			<th><?php echo $this->Paginator->sort('gender'); ?></th>
			<th><?php echo $this->Paginator->sort('speak_japanese'); ?></th>
			<th><?php echo $this->Paginator->sort('instructor_history'); ?></th>
			<th><?php echo $this->Paginator->sort('evaluation'); ?></th>
			<th><?php echo $this->Paginator->sort('work_place'); ?></th>
			<th><?php echo $this->Paginator->sort('message'); ?></th>
			<th><?php echo $this->Paginator->sort('instructor_url'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($instructors as $instructor): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($instructor['Site']['site_name'], array('controller' => 'sites', 'action' => 'view', $instructor['Site']['id'])); ?>
		</td>
		<td><?php echo h($instructor['Instructor']['e_name']); ?>&nbsp;</td>
		<td><?php echo h($instructor['Instructor']['k_name']); ?>&nbsp;</td>
		<td><?php echo h($instructor['Instructor']['address']); ?>&nbsp;</td>
		<td><?php echo h($instructor['Instructor']['gender']) == 0 ?  "Male":"Female"; ?>&nbsp;</td> 
		<td><?php echo h($instructor['Instructor']['speak_japanese']) == 0 ?  "Yes":"No"; ?>&nbsp;</td>
		<td><?php echo h($instructor['Instructor']['instructor_history']); ?>&nbsp;</td>
		<td><?php echo h($instructor['Instructor']['evaluation']) == 0 ?  "Good":"Bad"; ?>&nbsp;</td>
		<td><?php echo h($instructor['Instructor']['work_place']); ?>&nbsp;</td>
		<td><?php echo h($instructor['Instructor']['message']); ?>&nbsp;</td>
		<td><?php echo h($instructor['Instructor']['instructor_url']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $instructor['Instructor']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $instructor['Instructor']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $instructor['Instructor']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $instructor['Instructor']['id']))); ?>
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
