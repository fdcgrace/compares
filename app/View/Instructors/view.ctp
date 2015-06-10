<div class="instructors view">
<h2><?php echo __('Instructor'); ?></h2>
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

	</tr>
	
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
			
		</tr>

	</table>