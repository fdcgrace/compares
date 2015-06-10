<div class="row alert-box info radius" style="padding-left: 1.5rem!important"> 

<header>
<div class="row">
  <div class="large-12 column">
    <img src="http://placehold.it/1500x400&text=[stuff and img]">
  </div>
</div>
</header>
<br>
<div class="row">
	<div class="large-12 columns ">
	  <div class="panel alert-box">
	    <div class="large-6 columns" style="float:left">
	    	<h5>List of Sites</h5>
	  	</div>
	    <div class="large-6 columns" style="float:right">
	    		<?php echo $this->Html->link(_('List of instructors'), array('controller' => 'instructors', 'action' => 'index')); ?>
	    </div>
		<?php 
			$base_url = array('controller' => 'sites', 'action' => 'index');
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
			        	<?php echo $this->Form->submit("Go", array("class" => "button postfix")); ?>
			        </div>
		      	</div>
	    	</div>
	  	</div>
	  </div>
	</div>
</div>

<ul class="side-nav ">
	<?php if (!$sites): ?>
	<li>Search result found zero</li>
	<?php endif; ?>
	<li>
		<?php foreach ($sites as $site): ?>
		
			<div class="row">
				<!-- <div class="medium-2 columns "><a class="th" href="#"><img src="../compare/app/webroot/img/sites/<?php //echo $site['Site']['site_image']?>"></a></div> -->
				<div class="medium-2 columns alert-box" style="height: 133px; max-height: 133px;">
					<img src="/app/webroot/img/sites/<?php echo $site['Site']['site_image']?>" style="max-height: 105px;">
				</div><!-- end of div medium-2 columns -->	
			  	<div class="medium-10 columns alert-box secondary" style="margin-bottom: 0.25rem!important; height: 133px; max-height: 133px;">
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
				  	<!-- <ul class="inline-list" style="margin-top: 1.25rem;"> -->
					
			 			<?php if ($loggedIn): ?>
						 	<?php if ($cond1 && $cond2): ?>
							 	<!-- <li> -->
									<?php 
										echo $this->Html->link(__('Rate Good'), array('controller' => 'attributes', 'action' => 'good', $site['Site']['id']), array('class' => 'button tiny round'));
									?>
								<!-- </li>
								<li> -->
									<?php 
										echo $this->Html->link(__('Rate Bad'), array('controller' => 'attributes', 'action' => 'bad', $site['Site']['id']), array('class' => 'button tiny alert round'));
									?>
								<!-- </li> -->
						  	<?php  endif; ?>
						<?php  endif; ?>
					  	<!-- <li> -->
					  		<?php 
					  			echo $this->Html->link(__('Comment'), array('controller' => 'comments', 'action' => 'conversation', $site['Site']['id']), array('class' => 'button tiny success round'));

					  		?> 
					<!--   	</li>
				  	</ul> -->
				  	</div>
				</div>	  
			
	
	  	<?php endforeach; ?>
	</div>
	</li>
</ul>

</div>
<div class="row"> 
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


  
    

