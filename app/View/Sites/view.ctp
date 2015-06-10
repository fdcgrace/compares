<div class="sites view">
<h2><?php echo __('Site Details'); ?></h2>
<?php if (!empty($site)): ?>
<table>
	<thead>
		<tr>
			<th><?php echo __('Id'); ?></th>
			<th><?php echo __('Merit Site'); ?></th>
			<th><?php echo __('Demerite Site'); ?></th>
			<th><?php echo __('Site Image'); ?></th>
			<th><?php echo __('Site Name'); ?></th>
			<th><?php echo __('Site Url Display'); ?></th>
			<th><?php echo __('Site Url Link'); ?></th>
			<th><?php echo __('Company Name'); ?></th>
			<th><?php echo __('Trial Lesson'); ?></th>
			<th><?php echo __('Admission Fee'); ?></th>
			<th><?php echo __('Rate Plan'); ?></th>
			<th><?php echo __('Textbook'); ?></th>
			<th><?php echo __('Lesson Time'); ?></th>
			<th><?php echo __('Lowest Price'); ?></th>
			<th><?php echo __('Payment Method'); ?></th>
			<th><?php echo __('Nationality'); ?></th>
			<th><?php echo __('Group Lesson'); ?></th>
			<th><?php echo __('Certified'); ?></th>
			<th><?php echo __('Bus Conv Course'); ?></th>
			<th><?php echo __('Kisd Course'); ?></th>
			<th><?php echo __('No Teachers'); ?></th>
			<th><?php echo __('Smartphone Support'); ?></th>
			<th><?php echo __('Duty System'); ?></th>
			<th><?php echo __('Required Device'); ?></th>
			<th><?php echo __('Support System'); ?></th>

		</tr>
	</thead>
	<tr>

		<td>
			<?php echo h($site[0]['Site']['id']); ?>
	
		</td>
	
		<td>
			<?php echo h($site[0]['Site']['merit_site']); ?>

		</td>
		
		<td>
			<?php echo h($site[0]['Site']['demerite_site']); ?>
		
		</td>
	
		<td>
			<?php echo h($site[0]['Site']['site_image']); ?>
		
		</td>

		<td>
			<?php echo h($site[0]['Site']['site_name']); ?>
		
		</td>

		<td>
			<?php echo h($site[0]['Site']['site_url_display']); ?>
		
		</td>
		
		<td>
			<?php echo h($site[0]['Site']['site_url_link']); ?>
		
		</td>
		
		<td>
			<?php echo h($site[0]['Site']['company_name']); ?>
		
		</td>
		
		<td>
			<?php echo h($site[0]['Site']['trial_lesson']); ?>
			&nbsp;
		</td>
		
		<td>
			<?php echo h($site[0]['Site']['admission_fee']); ?>
		
		</td>
	
		<td>
			<?php echo h($site[0]['Site']['rate_plan']); ?>
			
		</td>
	
		<td>
			<?php echo h($site[0]['Site']['textbook']); ?>
		
		</td>
		
		<td>
			<?php echo h($site[0]['Site']['lesson_time']); ?>
			
		</td>
		
		<td>
			<?php echo h($site[0]['Site']['lowest_price']); ?>
			
		</td>
		
		<td>
			<?php echo h($site[0]['Site']['payment_method']); ?>
			
		</td>
	
		<td>
			<?php echo h($site[0]['Site']['nationality']); ?>
			
		</td>
		
		<td>
			<?php echo h($site[0]['Site']['group_lesson']); ?>
			
		</td>
		
		<td>
			<?php echo h($site[0]['Site']['certified']); ?>
			
		</td>
	
		<td>
			<?php echo h($site[0]['Site']['bus_conv_course']); ?>
			
		</td>
		
		<td>
			<?php echo h($site[0]['Site']['kisd_course']); ?>
			
		</td>
		
		<td>
			<?php echo h($site[0]['Site']['no_teachers']); ?>
			
		</td>
		
		<td>
			<?php echo h($site[0]['Site']['smartphone_support']); ?>
			
		</td>
		
		<td>
			<?php echo h($site[0]['Site']['duty_system']); ?>
	
		</td>
		
		<td>
			<?php echo h($site[0]['Site']['required_device']); ?>

		</td>
		
		<td>
			<?php echo h($site[0]['Site']['support_system']); ?>
	
		</td>
	</tr>
</table>
</div>

<?php 
	$base_url = array('controller' => 'sites', 'action' => 'view');
	echo $this->Form->create("Filter",array('url' => $base_url, 'class' => 'filter')); 
?>
<div class="row">
	
      	<div class="row collapse postfix-round">
	        <div class="small-9 columns">
	        	<?php 
	        		echo $this->Form->input("Search", array('label' => false, 'placeholder' => 'Search Instructor here...'));
	        		echo $this->Form->input("site_id", array('type' => 'hidden', 'value' => $site[0]['Site']['id']));
	        	?>
	        	<!-- <input type="text" placeholder="Search sites here..."> -->
	        </div>
	        <div class="small-3 columns">
	        	<?php echo $this->Form->submit("Go", array("class" => "button postfix")); ?>
	        </div>
      	</div>
	
</div>

<div class="related">
	<h3><?php echo __('Related Instructors'); ?></h3>
	
	<table cellpatding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Site Id'); ?></th>
		<th><?php echo __('E Name'); ?></th>
		<th><?php echo __('K Name'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Gender'); ?></th>
		<th><?php echo __('Birthdate'); ?></th>
		<th><?php echo __('Age'); ?></th>
		<th><?php echo __('Education'); ?></th>
		<th><?php echo __('Course'); ?></th>
		<th><?php echo __('Speak Japanese'); ?></th>
		<th><?php echo __('Language'); ?></th>
		<th><?php echo __('Instructor History'); ?></th>
		<th><?php echo __('Hobby'); ?></th>
		<th><?php echo __('Evaluation'); ?></th>
		<th><?php echo __('Eval Comment'); ?></th>
		<th><?php echo __('Introduction Video'); ?></th>
		<th><?php echo __('Favorite Movie'); ?></th>
		<th><?php echo __('Work Place'); ?></th>
		<th><?php echo __('Message'); ?></th>
		<th><?php echo __('Tag'); ?></th>
		<th><?php echo __('Instructor Url'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>

	<?php foreach ($site as $instructor): ?>
		<tr>
			<td><?php echo $instructor['Instructor']['id']; ?></td>
			<td><?php echo $instructor['Instructor']['site_id']; ?></td>
			<td><?php echo $instructor['Instructor']['e_name']; ?></td>
			<td><?php echo $instructor['Instructor']['k_name']; ?></td>
			<td><?php echo $instructor['Instructor']['address']; ?></td>
			<td><?php echo $instructor['Instructor']['gender']; ?></td>
			<td><?php echo $instructor['Instructor']['birthdate']; ?></td>
			<td><?php echo $instructor['Instructor']['age']; ?></td>
			<td><?php echo $instructor['Instructor']['education']; ?></td>
			<td><?php echo $instructor['Instructor']['course']; ?></td>
			<td><?php echo $instructor['Instructor']['speak_japanese']; ?></td>
			<td><?php echo $instructor['Instructor']['language']; ?></td>
			<td><?php echo $instructor['Instructor']['instructor_history']; ?></td>
			<td><?php echo $instructor['Instructor']['hobby']; ?></td>
			<td><?php echo $instructor['Instructor']['evaluation']; ?></td>
			<td><?php echo $instructor['Instructor']['eval_comment']; ?></td>
			<td><?php echo $instructor['Instructor']['introduction_video']; ?></td>
			<td><?php echo $instructor['Instructor']['favorite_movie']; ?></td>
			<td><?php echo $instructor['Instructor']['work_place']; ?></td>
			<td><?php echo $instructor['Instructor']['message']; ?></td>
			<td><?php echo $instructor['Instructor']['tag']; ?></td>
			<td><?php echo $instructor['Instructor']['instructor_url']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'instructors', 'action' => 'view', $instructor['Instructor']['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php else: ?>
<table>
	<thead>
		<tr>
			<th><?php echo __('Id'); ?></th>
			<th><?php echo __('Merit Site'); ?></th>
			<th><?php echo __('Demerite Site'); ?></th>
			<th><?php echo __('Site Image'); ?></th>
			<th><?php echo __('Site Name'); ?></th>
			<th><?php echo __('Site Url Display'); ?></th>
			<th><?php echo __('Site Url Link'); ?></th>
			<th><?php echo __('Company Name'); ?></th>
			<th><?php echo __('Trial Lesson'); ?></th>
			<th><?php echo __('Admission Fee'); ?></th>
			<th><?php echo __('Rate Plan'); ?></th>
			<th><?php echo __('Textbook'); ?></th>
			<th><?php echo __('Lesson Time'); ?></th>
			<th><?php echo __('Lowest Price'); ?></th>
			<th><?php echo __('Payment Method'); ?></th>
			<th><?php echo __('Nationality'); ?></th>
			<th><?php echo __('Group Lesson'); ?></th>
			<th><?php echo __('Certified'); ?></th>
			<th><?php echo __('Bus Conv Course'); ?></th>
			<th><?php echo __('Kisd Course'); ?></th>
			<th><?php echo __('No Teachers'); ?></th>
			<th><?php echo __('Smartphone Support'); ?></th>
			<th><?php echo __('Duty System'); ?></th>
			<th><?php echo __('Required Device'); ?></th>
			<th><?php echo __('Support System'); ?></th>

		</tr>
	</thead>
	<tr>

		<td>
			<?php echo h($sites['Site']['id']); ?>
	
		</td>
	
		<td>
			<?php echo h($sites['Site']['merit_site']); ?>

		</td>
		
		<td>
			<?php echo h($sites['Site']['demerite_site']); ?>
		
		</td>
	
		<td>
			<?php echo h($sites['Site']['site_image']); ?>
		
		</td>

		<td>
			<?php echo h($sites['Site']['site_name']); ?>
		
		</td>

		<td>
			<?php echo h($sites['Site']['site_url_display']); ?>
		
		</td>
		
		<td>
			<?php echo h($sites['Site']['site_url_link']); ?>
		
		</td>
		
		<td>
			<?php echo h($sites['Site']['company_name']); ?>
		
		</td>
		
		<td>
			<?php echo h($sites['Site']['trial_lesson']); ?>
		</td>
		
		<td>
			<?php echo h($sites['Site']['admission_fee']); ?>
		
		</td>
	
		<td>
			<?php echo h($sites['Site']['rate_plan']); ?>
			
		</td>
	
		<td>
			<?php echo h($sites['Site']['textbook']); ?>
		
		</td>
		
		<td>
			<?php echo h($sites['Site']['lesson_time']); ?>
			
		</td>
		
		<td>
			<?php echo h($sites['Site']['lowest_price']); ?>
			
		</td>
		
		<td>
			<?php echo h($sites['Site']['payment_method']); ?>
			
		</td>
	
		<td>
			<?php echo h($sites['Site']['nationality']); ?>
			
		</td>
		
		<td>
			<?php echo h($sites['Site']['group_lesson']); ?>
			
		</td>
		
		<td>
			<?php echo h($sites['Site']['certified']); ?>
			
		</td>
	
		<td>
			<?php echo h($sites['Site']['bus_conv_course']); ?>
			
		</td>
		
		<td>
			<?php echo h($sites['Site']['kisd_course']); ?>
			
		</td>
		
		<td>
			<?php echo h($sites['Site']['no_teachers']); ?>
			
		</td>
		
		<td>
			<?php echo h($sites['Site']['smartphone_support']); ?>
			
		</td>
		
		<td>
			<?php echo h($sites['Site']['duty_system']); ?>
	
		</td>
		
		<td>
			<?php echo h($sites['Site']['required_device']); ?>

		</td>
		
		<td>
			<?php echo h($sites['Site']['support_system']); ?>
	
		</td>
	</tr>
</table>
<?php 
	$base_url = array('controller' => 'sites', 'action' => 'view');
	echo $this->Form->create("Filter",array('url' => $base_url, 'class' => 'filter')); 
?>
<div class="row">
	
      	<div class="row collapse postfix-round">
	        <div class="small-9 columns">
	        	<?php 
	        		echo $this->Form->input("Search", array('label' => false, 'placeholder' => 'Search Instructor here...'));
	        		echo $this->Form->input("site_id", array('type' => 'hidden', 'value' => $sites['Site']['id']));
	        	?>
	        	<!-- <input type="text" placeholder="Search sites here..."> -->
	        </div>
	        <div class="small-3 columns">
	        	<?php echo $this->Form->submit("Go", array("class" => "button postfix")); ?>
	        </div>
      	</div>
	
</div>
<div class="related">
	<h3><?php echo __('Related Instructors'); ?></h3>
	<h6>Search results zero.</h6>
</div>
<?php endif; ?>
	
</div>
