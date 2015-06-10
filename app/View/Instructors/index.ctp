<div class="row black-content"> 

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
	  <div class="panel white-text-content">
	  	<div class="large-6 columns" style="float:left">
	    	<h5>講師一覧</h5>
	  	</div>
	  	
	    <div class="large-6 columns" style="float:right">
	    	<h5><?php echo $this->Html->link(_('サイト一覧'), array('controller' => 'sites', 'action' => 'index')); ?></h5>
			<?php 
				$base_url = array('controller' => 'instructors', 'action' => 'index');
		    	echo $this->Form->create("Sort",array('url' => $base_url, 'class' => 'filter')); 
		    ?>
		    <div class="row collapse postfix-round">
		    	<div class="small-9 columns">
				  	<?php 
				  		echo $this->Form->input(
						    'gender', 
						    array(
						        'options' => array(
						        	'0' => '所属サイト', 
						        	'1' => '名前（英語）', 
						        	'2' => '（日本語）', 
						        	'3' => '性別', 
						        	'4' => '居住地', 
						        	'5' => 'good数', 
						        	'6' => 'bad数'
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
	    <div class="row ">
	    	<div class="large-6 columns" style="float:none">
		      	<div class="row collapse postfix-round">
			        <div class="small-9 columns">
			        	<?php 
			        		echo $this->Form->input("Search", array('label' => false, 'placeholder' => '講師検索はこちら...'));
			        	?>
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

<div class="small-9 columns">
	<ul class="side-nav ">
		<?php if (!$instructors): ?>
		<li>Search result found zero</li>
		<?php endif; ?>
		<li>
			<?php foreach ($instructors as $instructor): ?>
			
				<div class="row">
					<div class="medium-3 columns image-gray">
						<!-- <img src="/app/webroot/img/sites/<?php //echo $site['Site']['site_image']?>" style="max-height: 105px;"> -->
					</div><!-- end of div medium-2 columns -->	
				  	<div class="medium-9 columns white-text-content-shadow">
				  		
						<h4 class="mini-titlebar">Teacher: <?php echo $instructor['Instructor']['e_name']; ?></h4>
							<h5><small class="black-text">Assigned Online School: <?php echo $instructor['Site']['site_name']; ?></small></h5>

							<h5><small><?php echo $this->Html->link(_('Site info'), array('controller' => 'sites', 'action' => 'view', $instructor['Site']['id'])); ?></small></h5>
						<div >
							<table>
								<tr>
									<td><h5><small class="black-text">Katakana Name:</small></h5></td>
									<td><h5><small class="black-text">Country:</small></h5></td>
									<td><h5><small class="black-text">Language:</small></h5></td>
									<td><h5><small class="black-text">Gender:</small></h5></td>
								</tr>
								<tr>
									<td><h5><small class="black-text"><?php echo $instructor['Instructor']['k_name']; ?></small></h5></td>
									<td><h5><small class="black-text"><?php echo $instructor['Instructor']['address']; ?></small></h5></td>
									<td><h5><small class="black-text"><?php echo $instructor['Instructor']['language']; ?></small></h5></td>
									<td><h5><small class="black-text"><?php echo ($instructor['Instructor']['gender'] == 1)?'Female':'Male'; ?></small></h5></td>
								</tr>
							</table>
					
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
							<ul class="inline-list pad-right">
								<li><h5><small><?php echo $this->Html->link(__("More info"), array('action' => 'view', $instructor['Instructor']['id'])); ?></small></h5></li>
								 <!-- Good or Bad display -->
								<li><span class="round label">Good <?php echo (isset($userID) && $cond1 <> true && $ratedGood > 0)?$good." You rate this" : $good ;?></span></li>
								<li><span class="round alert label">Bad <?php echo (isset($userID) && $cond2 <> true && $ratedBad > 0)?$bad." You rate this" : $bad; ?></span></li>
								<li>
									<?php if($instructor['reviews']): ?>
										<span class="warning label">Reviews: <?php echo $instructor['reviews'];?></span>
									<?php endif;?>
								</li>
							</ul>
							</div><!-- end of div medium-10 columns -->			  	
							<div class="medium-10 columns" style="padding-top:5px;">
					 			<?php if ($loggedIn): ?>
								 	<?php if ($cond1 && $cond2): ?>
											<?php 
												/*echo $this->Html->link(__('Rate Good'), array('controller' => 'ratings', 'action' => 'good', $instructor['Instructor']['id']), array('class' => 'button tiny round'));*/
											?>
											<?php 
												/*echo $this->Html->link(__('Rate Bad'), array('controller' => 'ratings', 'action' => 'bad', $instructor['Instructor']['id']), array('class' => 'button tiny alert round'));*/
											?>
								
								  	<?php  endif; ?>
								<?php  endif; ?>
							  		<?php 
							  			/*echo $this->Html->link(__('Comment'), array('controller' => 'inscomments', 'action' => 'conversation', $instructor['Instructor']['id']), array('class' => 'button tiny success round'));*/
							  		?> 
						  	</div>
						</div>
					</div>	  
				
		
		  	<?php endforeach; ?>
		</div>
		</li>
	</ul>
</div>

<div class="small-3 columns">
<!-- ad banner here -->
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


  
    


  
    

