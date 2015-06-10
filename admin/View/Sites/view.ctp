<div class="sites view">
<h2><?php echo __('Site'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($site['Site']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Merit Site'); ?></dt>
		<dd>
			<?php echo h($site['Site']['merit_site']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Demerite Site'); ?></dt>
		<dd>
			<?php echo h($site['Site']['demerite_site']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Site Image'); ?></dt>
		<dd>
			<?php $img = $site['Site']['site_image']; //echo h($site['Site']['site_image']); ?>
			<img src="<?php echo $retrieveSiteThumb.$img; ?>">
			&nbsp;
		</dd>
		<dt><?php echo __('Site Name'); ?></dt>
		<dd>
			<?php echo h($site['Site']['site_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Site Url Display'); ?></dt>
		<dd>
			<?php echo h($site['Site']['site_url_display']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Site Url Link'); ?></dt>
		<dd>
			<?php echo h($site['Site']['site_url_link']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company Name'); ?></dt>
		<dd>
			<?php echo h($site['Site']['company_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Trial Lesson'); ?></dt>
		<dd>
			<?php echo h($site['Site']['trial_lesson']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Admission Fee'); ?></dt>
		<dd>
			<?php echo h($site['Site']['admission_fee']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rate Plan'); ?></dt>
		<dd>
			<?php echo h($site['Site']['rate_plan']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Textbook'); ?></dt>
		<dd>
			<?php echo h($site['Site']['textbook']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lesson Time'); ?></dt>
		<dd>
			<?php echo h($site['Site']['lesson_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lowest Price'); ?></dt>
		<dd>
			<?php echo h($site['Site']['lowest_price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Payment Method'); ?></dt>
		<dd>
			<?php echo h($site['Site']['payment_method']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nationality'); ?></dt>
		<dd>
			<?php echo h($site['Site']['nationality']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Group Lesson'); ?></dt>
		<dd>
			<?php echo h($site['Site']['group_lesson']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Certified'); ?></dt>
		<dd>
			<?php echo h($site['Site']['certified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bus Conv Course'); ?></dt>
		<dd>
			<?php echo h($site['Site']['bus_conv_course']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Kisd Course'); ?></dt>
		<dd>
			<?php echo h($site['Site']['kisd_course']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('No Teachers'); ?></dt>
		<dd>
			<?php echo h($site['Site']['no_teachers']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Smartphone Support'); ?></dt>
		<dd>
			<?php echo h($site['Site']['smartphone_support']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Duty System'); ?></dt>
		<dd>
			<?php echo h($site['Site']['duty_system']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Required Device'); ?></dt>
		<dd>
			<?php echo h($site['Site']['required_device']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Support System'); ?></dt>
		<dd>
			<?php echo h($site['Site']['support_system']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php if (!empty($site['Instructor'])): ?>
<?php echo $this->element('sidebar'); ?>
<div class="related">
	<h3><?php echo __('Related Instructors'); ?></h3>
	
	<table cellpadding = "0" cellspacing = "0">
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
	</tr>
	<?php foreach ($site['Instructor'] as $instructor): ?>
		<tr>
			<td><?php echo $instructor['id']; ?></td>
			<td><?php echo $instructor['site_id']; ?></td>
			<td><?php echo $instructor['e_name']; ?></td>
			<td><?php echo $instructor['k_name']; ?></td>
			<td><?php echo $instructor['address']; ?></td>
			<td><?php echo $instructor['gender']; ?></td>
			<td><?php echo $instructor['birthdate']; ?></td>
			<td><?php echo $instructor['age']; ?></td>
			<td><?php echo $instructor['education']; ?></td>
			<td><?php echo $instructor['course']; ?></td>
			<td><?php echo $instructor['speak_japanese']; ?></td>
			<td><?php echo $instructor['language']; ?></td>
			<td><?php echo $instructor['instructor_history']; ?></td>
			<td><?php echo $instructor['hobby']; ?></td>
			<td><?php echo $instructor['evaluation']; ?></td>
			<td><?php echo $instructor['eval_comment']; ?></td>
			<td><?php echo $instructor['introduction_video']; ?></td>
			<td><?php echo $instructor['favorite_movie']; ?></td>
			<td><?php echo $instructor['work_place']; ?></td>
			<td><?php echo $instructor['message']; ?></td>
			<td><?php echo $instructor['tag']; ?></td>
			<td><?php echo $instructor['instructor_url']; ?></td>
		</tr>
	<?php endforeach; ?>
	</table>



</div>
<?php endif; ?>