<div class="row white-content"> 

<header>
<div class="row">
  <div class="large-12 column">
    <img src="http://placehold.it/1500x400&text=[stuff and img]">
  </div>
</div>
</header>
<hr>
<div class="row">
	<div class="large-12 columns ">
	  <div class="panel alert-box">
	    <div class="large-6 columns" style="float:left">
	    	<h5>サイト一覧</h5>
	  	</div>
	    <div class="large-6 columns" style="float:right">
	    	<h5><?php echo $this->Html->link(_('講師一覧'), array('controller' => 'instructors', 'action' => 'index')); ?></h5>
	    	<?php 
				$base_url = array('controller' => 'sites', 'action' => 'index');
		    	echo $this->Form->create("Sort",array('url' => $base_url, 'class' => 'filter')); 
		    ?>
		    <div class="row collapse postfix-round">
		    	<div class="small-9 columns">
				  	<?php 
				  		echo $this->Form->input(
						    'gender', 
						    array(
						        'options' => array(
						        	'0' => 'サイト名', 
						        	'1' => '講師国籍', 
						        	'2' => '無料体験レッスン（回数）', 
						        	'3' => '最安値', 
						        	'4' => '在籍講師数', 
						        	'5' => '重複検索可能・検索後ソート可能', 
						        ),           
						        'empty' => 'Select here for sort option',
						        'label' => '',
						        'class' => 'select-box'
						    )
						);
				  	?>
				</div>
			    <div class="small-3 columns">
			    	<?php echo $this->Form->submit("Sort", array("class" => "button postfix round")); ?>
				</div>
	    	</div>
	
	    </div>
		<?php 
	    	echo $this->Form->create("Filter",array('url' => $base_url, 'class' => 'filter')); 
	    ?>
	    <div class="row">
	    	<div class="large-6 columns" style="float:none">
		      	<div class="row collapse postfix-round">
			        <div class="small-9 columns">
			        	<?php 
			        		echo $this->Form->input("Search", array('label' => false, 'placeholder' => 'Search sites here...'));
			        	?>
			        	<!-- <input type="text" placeholder="Search sites here..."> -->
			        </div>
			        <div class="small-3 columns">
			        	<?php echo $this->Form->submit("Go", array("class" => "button postfix round")); ?>
			        </div>
		      	</div>
	    	</div>
	  	</div>
	  </div>
	</div>
</div>
<div class="small-10 columns">
	<ul class="side-nav ">
		<?php if (!$sites): ?>
			<hr>
			<li>Search result found zero</li>
		<?php endif; ?>
		<?php foreach ($sites as $site): ?>
			<li style="padding-bottom: 20px">
				<div class="row">
					<div class="medium-3 columns image-gray">
						<img src="/app/webroot/img/sites/thumbnail/<?php echo $site['Site']['site_image']?>" class="full-img-size">
					</div><!-- end of div medium-2 columns -->	
				  	<div class="medium-9 columns gray-text-content">
						<h5 class="mini-titlebar-black"><?php echo $this->Html->link(__('サイト名: '.$site['Site']['site_name']), array('action' => 'view', $site['Site']['id']), array('class' => 'black-text')); ?></h5>
							<a href='#' class="black-text">サイト名（リンク）: <?php echo h($site['Site']['site_url_link']); ?></a>
							<hr>
							<table>
								<tr>
									<th class="td-gray-header">無料体験レッスン:</th>
									<th class="td-gray-header">1レッスンあたりの最安値:</th>
									<th class="td-gray-header">講師国籍:</th>
									<th class="td-gray-header">在籍講師数:</th>
								</tr>
								<tr>
									<th class="td-gray-odd"><?php echo h($site['Site']['trial_lesson']);?></th>
									<th class="td-gray-even"><?php echo h($site['Site']['lowest_price']); ?></th>
									<th class="td-gray-odd"><?php echo h($site['Site']['nationality']); ?></th>
									<th class="td-gray-even"><?php echo h($site['Site']['no_teachers']); ?></th>
								</tr>
							</table>
					</div>	  
				</div>
				<hr>
			</li>
		<?php endforeach; ?>
	</ul>
</div>

<div class="small-2 columns">

</div>

</div>
<div class="pagination-centered">
	<p>
		<?php
			echo $this->Paginator->counter(array(
			'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
			));
		?>  
	</p>
	
	<ul class="pagination">
		<li class="arrow unavailable"><?php echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled')); ?></li>
		<li><?php echo $this->Paginator->numbers(array('separator' => '')); ?></li>
		<li class="arrow"><?php echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled')); ?></li>
	</ul>
</div>


  
    

