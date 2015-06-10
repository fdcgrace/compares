<div class="row alert-box warning" style="padding-left: 1.5rem!important; background-color: #333333; border-color: #000000;"> 

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
	  <div class="panel alert-box info radius" style="background-color: #FFFFFF; border-color: #FFFFFF;">
	  	<div class="large-6 columns" style="float:left">
	    	<h5>List of Intructors</h5>
	  	</div>
	    <div class="large-6 columns" style="float:right">
	    		<?php echo $this->Html->link(_('List of sites'), array('controller' => 'sites', 'action' => 'index')); ?>
	    </div>
		<?php 
			$base_url = array('controller' => 'instructors', 'action' => 'index');
	    	echo $this->Form->create("Filter",array('url' => $base_url, 'class' => 'filter')); 
	    ?>
	    <div class="row ">
	    	<div class="large-6 columns" style="float:none">
		      	<div class="row collapse postfix-round">
			        <div class="small-9 columns">
			        	<?php 
			        		echo $this->Form->input("Search", array('label' => false, 'placeholder' => 'Search instructors here...'));
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
	<?php if (!$instructors): ?>
	<li>Search result found zero</li>
	<?php endif; ?>
	<li>
		<?php foreach ($instructors as $instructor): ?>
		
			<div class="row">
			  	<div class="small-11 small-centered columns alert-box info radius" style="background-color: #FFFFFF; border-color: #FFFFFF;">
					<h4 class="alert-box" style="color:#fff; background-color: #666666; border-color: #000;">Teacher: <?php echo $instructor['Instructor']['e_name']; ?></h4>
						<h5><small style="color:#000;">Assigned Online School: <?php echo $instructor['Site']['site_name']; ?></small></h5>

					<?php echo $this->Html->link(_('Site info'), array('controller' => 'sites', 'action' => 'view', $instructor['Site']['id'])); ?>	
						<h5><small style="color:#000;">Katakana Name: <?php echo $instructor['Instructor']['k_name']; ?></small></h5>
						<h5><small style="color:#000;">Language: <?php echo $instructor['Instructor']['language']; ?></small></h5>
						
						<?php echo $this->Html->link(__("More info"), array('action' => 'view', $instructor['Instructor']['id'])); ?>

					 <?php 
				  		$good = $ratedGood = $ratedBad = $bad = '';
				  		$cond2 = $cond1 = true;
					  	foreach ($ratings as $val) {
					  		$siteID = $instructor['Instructor']['id'];
					  		$ratingSID = $val['Rating']['instructor_id'];
					  		$ratingUID = $val['Rating']['user_id'];
					  		$ratingGood = $val['Rating']['good'];
					  		$ratingBad = $val['Rating']['bad'];
						  	if ($ratingSID == $siteID) {
						  		if(isset($userID) && $ratingUID == $userID) {
									$ratedGood = $ratingGood;
									$ratedBad = $ratingBad;
						  			$cond1 = $cond2 = false;
						  		}
						  		
						  		$good = $good + $ratingGood;
						  		
						  		$bad = $bad + $ratingBad;
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
						  
						
						
						<?php if($instructor['reviews']): ?>
							<span class="warning label">Reviews: <?php echo $instructor['reviews'];?></span>
						<?php endif;?>
					</div><!-- end of div medium-10 columns -->			  	
					<div class="medium-10 columns" style="padding-top:5px;">
				  	<!-- <ul class="inline-list" style="margin-top: 1.25rem;"> -->
					
			 			<?php if ($loggedIn): ?>
						 	<?php if ($cond1 && $cond2): ?>
							 	<!-- <li> -->
									<?php 
										echo $this->Html->link(__('Rate Good'), array('controller' => 'ratings', 'action' => 'good', $instructor['Instructor']['id']), array('class' => 'button tiny round'));
									?>
								<!-- </li>
								<li> -->
									<?php 
										echo $this->Html->link(__('Rate Bad'), array('controller' => 'ratings', 'action' => 'bad', $instructor['Instructor']['id']), array('class' => 'button tiny alert round'));
									?>
								<!-- </li> -->
						  	<?php  endif; ?>
						<?php  endif; ?>
					  	<!-- <li> -->
					  		<?php 
					  			echo $this->Html->link(__('Comment'), array('controller' => 'inscomments', 'action' => 'conversation', $instructor['Instructor']['id']), array('class' => 'button tiny success round'));

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


  
    


  
    

