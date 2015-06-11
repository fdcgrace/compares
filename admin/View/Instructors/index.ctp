<div class="instructors index">
	<h2><?php echo __('Instructors'); ?></h2>
	<?php 
		$base_url = array('controller' => 'instructors', 'action' => 'index');
    	echo $this->Form->create("Filter",array('url' => $base_url, 'class' => 'filter')); 
    ?>
	<div class="row">
		<div class="medium-3 columns">
			<?php 
				echo $this->Form->input("Search", array('label' => '&nbsp;', 'placeholder' => 'Search instructor here...'));
			?>
		</div>
		<div class="medium-3 columns">
			<?php
				$arr = array("");
				echo $this->Form->input('gender', array('label' => '性別',  'type'=>'select',
			'options'=> array_merge($arr,$gender)));
			?>
		</div>
		<div class="medium-3 columns">
			<?php
				$address = array_merge(array(""),$address);
				echo $this->Form->input('address', array('label' => '居住地/出身国',  'type'=>'select',
			'options'=> array_combine($address,$address)));
			?>
		</div>
		<div class="medium-3 columns">
			<?php echo $this->Form->label('&nbsp');  echo $this->Form->submit("Go", array("class" => "button postfix")); ?>
		</div>
	</div>

	<table cellpadding="0" cellspacing="0">
		<thead>
		<tr>
			<th><?php echo $this->Paginator->sort('site_id'); ?></th>
			<th><?php echo $this->Paginator->sort('site_id','Profile'); ?></th>
			<th><?php echo $this->Paginator->sort('e_name', '名前（英語）'); ?></th>
			<th><?php echo $this->Paginator->sort('k_name', '名前（カタカナ）'); ?></th>
			<th><?php echo $this->Paginator->sort('address','居住地/出身国'); ?></th>
			<th><?php echo $this->Paginator->sort('gender','性別'); ?></th>
			<th><?php echo $this->Paginator->sort('speak_japanese','日本語対応'); ?></th>
			<th><?php echo $this->Paginator->sort('instructor_history','講師歴'); ?></th>
			<th><?php echo $this->Paginator->sort('evaluation','評価'); ?></th>
			<th><?php echo $this->Paginator->sort('work_place','勤務場所'); ?></th>
			<th><?php echo $this->Paginator->sort('message','講師からのメッセージ（自己紹介）'); ?></th>
			<th><?php echo $this->Paginator->sort('instructor_url','講師リンクURL'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($instructors as $instructor): ?>
		<tr>
			<td>
				<?php echo $this->Html->link($instructor['Site']['site_name'], array('controller' => 'sites', 'action' => 'view', $instructor['Site']['id'])); ?>
			</td>
			<td><img src="<?php echo $retrieveInsThumb.$instructor['Instructor']['image']?>"></td>
			<td><?php echo h($instructor['Instructor']['e_name']); ?>&nbsp;</td>
			<td><?php echo h($instructor['Instructor']['k_name']); ?>&nbsp;</td>
			<td><?php echo h($instructor['Instructor']['address']); ?>&nbsp;</td>
			<td><?php echo h($instructor['Instructor']['gender']) == 1 ?  "Male":"Female"; ?>&nbsp;</td> 
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
		?>	
	</p>
	<div class="paging">
		<?php
			echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
			echo $this->Paginator->numbers(array('separator' => ''));
			echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
		?>
	</div>
</div>
