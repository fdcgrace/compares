<div class="sites index">
	<h2><?php echo __('Sites'); ?></h2>
	<?php 
		$base_url = array('controller' => 'sites', 'action' => 'index');
    	echo $this->Form->create("Filter",array('url' => $base_url, 'class' => 'filter')); 
    ?>
    <div class="small-9 small-centered large-uncentered columns">
	    <div class="small-9 columns">
			<?php 
	    		echo $this->Form->input("Search", array('label' => false, 'placeholder' => 'Search sites here...'));
	    	?>
	    </div>
	    <div class="small-3 columns">
			<?php echo $this->Form->submit("Go", array("class" => "button postfix")); ?>
		</div>
	
	
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('site_image'); ?></th>
			<th><?php echo $this->Paginator->sort('site_name', 'サイト名'); ?></th>
			<th><?php echo $this->Paginator->sort('site_url_link','サイトURL（リンク用）'); ?></th>
			<th><?php echo $this->Paginator->sort('trial_lesson','無料体験レッスン'); ?></th>
			<th><?php echo $this->Paginator->sort('lowest_price','1レッスンの最安値'); ?></th>
			<th><?php echo $this->Paginator->sort('nationality','講師国籍（ネイティブ在籍）'); ?></th> 
			<th><?php echo $this->Paginator->sort('no_teachers','講師数'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($sites as $site): $img = $retrieveSiteThumb.$site['Site']['site_image']; ?>
	<tr>
		<td><img src="<?php echo $img; ?>" width="120" height="120"></td>
		<td><?php echo h($site['Site']['site_name']); ?>&nbsp;</td>
		<td><?php echo h($site['Site']['site_url_link']); ?>&nbsp;</td>
		<td><?php echo h($site['Site']['trial_lesson']); ?>&nbsp;</td>
		<td><?php echo h($site['Site']['lowest_price']); ?>&nbsp;</td>
		<td><?php echo h($site['Site']['nationality']); ?>&nbsp;</td>
		<td><?php echo h($site['Site']['no_teachers']); ?>&nbsp;</td>
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
</div>
