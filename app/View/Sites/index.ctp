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
		<li>Search result found zero</li>
		<?php endif; ?>
		<li>
			<?php foreach ($sites as $site): ?>
				<div class="row">
					<div class="medium-2 columns image-gray">
						<img src="/app/webroot/img/sites/<?php echo $site['Site']['site_image']?>" style="max-height: 105px;">
					</div><!-- end of div medium-2 columns -->	
				  	<div class="medium-10 columns gray-text-content">
						<h5><?php echo $this->Html->link(__($site['Site']['site_name']), array('action' => 'view', $site['Site']['id'])); ?></h5>
						<a href='#'>Url: <?php echo h($site['Site']['site_url_link']); ?></a>
									  
						 <?php 
					  		$good = $ratedGood = $ratedBad = $bad = '';
					  		$cond2 = $cond1 = true;
						  	foreach ($attributes as $val) {
						  		$siteID = $site['Site']['id'];
						  		$attriSID = $val['Attribute']['site_id'];
						  		$attriUID = $val['Attribute']['user_id'];
						  		$attriGood = $val['Attribute']['good'];
						  		$attriBad = $val['Attribute']['bad'];
							  	if ($attriSID == $siteID) {
							  		if(isset($userID) && $attriUID == $userID) {
										$ratedGood = $attriGood;
										$ratedBad = $attriBad;
							  			$cond1 = $cond2 = false;
							  		}
							  		
							  		$good = $good + $attriGood;
							  		
							  		$bad = $bad + $attriBad;
							  	}
						  	}
						  	if($good == 0) {
						  		$good = "";
						  	}
						  	if($bad == 0) {
						  		$bad = "";
						  	}
						 ?>
						 <!-- Good or Bad display -->
						<span class="round label">Good <?php echo (isset($userID) && $cond1 <> true && $ratedGood > 0)?$good." You rate this" : $good ;?></span> 
						<span class="round alert label">Bad <?php echo (isset($userID) && $cond2 <> true && $ratedBad > 0)?$bad." You rate this" : $bad; ?></span> 
							  	<small>Details:
							  	講師数: <?php echo h($site['Site']['no_teachers']); ?>
								入会金: <?php echo h($site['Site']['admission_fee']); ?>
							  	無料体験レッスン: <?php echo h($site['Site']['trial_lesson']);?>
							  	1レッスンあたりの最安値: <?php echo h($site['Site']['lowest_price']); ?>
							  	</small>
							値段: 
							<?php if($site['reviews']): ?>
								<span class="warning label">Reviews: <?php echo $site['reviews'];?></span>
							<?php endif;?>
						</div><!-- end of div medium-10 columns -->			  	
						<div class="medium-10 columns" style="padding-top:5px;">
				 			<?php if ($loggedIn): ?>
							 	<?php if ($cond1 && $cond2): ?>
										<?php 
											echo $this->Html->link(__('Rate Good'), array('controller' => 'attributes', 'action' => 'good', $site['Site']['id']), array('class' => 'button tiny round'));
										?>
										<?php 
											echo $this->Html->link(__('Rate Bad'), array('controller' => 'attributes', 'action' => 'bad', $site['Site']['id']), array('class' => 'button tiny alert round'));
										?>
							  	<?php  endif; ?>
							<?php  endif; ?>
						  		<?php 
						  			echo $this->Html->link(__('Comment'), array('controller' => 'comments', 'action' => 'conversation', $site['Site']['id']), array('class' => 'button tiny success round'));
						  		?>
					  	</div>
					</div>	  
				
		
		  	<?php endforeach; ?>
		</div>
		</li>
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


  
    

