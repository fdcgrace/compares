<div class="sites view">
<h2><?php echo __('Site'); ?></h2>
	<dl>
		<dt><?php echo __('サイトのメリット'); ?></dt>
		<dd>
			<?php echo h($site['Site']['merit_site']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('サイトのデメリット'); ?></dt>
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
		<dt><?php echo __('サイト名'); ?></dt>
		<dd>
			<?php echo h($site['Site']['site_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('サイトURL（表示用）'); ?></dt>
		<dd>
			<?php echo h($site['Site']['site_url_display']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('サイトURL（リンク用）'); ?></dt>
		<dd>
			<?php echo h($site['Site']['site_url_link']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('運営会社名'); ?></dt>
		<dd>
			<?php echo h($site['Site']['company_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('無料体験レッスン'); ?></dt>
		<dd>
			<?php echo h($site['Site']['trial_lesson']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('入会金（入学金）'); ?></dt>
		<dd>
			<?php echo h($site['Site']['admission_fee']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('料金プラン'); ?></dt>
		<dd>
			<?php echo h($site['Site']['rate_plan']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('教材'); ?></dt>
		<dd>
			<?php echo h($site['Site']['textbook']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('受講可能時間'); ?></dt>
		<dd>
			<?php echo h($site['Site']['lesson_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('1レッスンの最安値'); ?></dt>
		<dd>
			<?php echo h($site['Site']['lowest_price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('支払い方法'); ?></dt>
		<dd>
			<?php echo h($site['Site']['payment_method']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('講師国籍（ネイティブ在籍）'); ?></dt>
		<dd>
			<?php echo h($site['Site']['nationality']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('マンツーマン/グループレッスン'); ?></dt>
		<dd>
			<?php echo h($site['Site']['group_lesson']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('TOEIC/TOEFL対応'); ?></dt>
		<dd>
			<?php echo h($site['Site']['certified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ビジネス英会話コース'); ?></dt>
		<dd>
			<?php echo h($site['Site']['bus_conv_course']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Kidsコース'); ?></dt>
		<dd>
			<?php echo h($site['Site']['kisd_course']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('講師数'); ?></dt>
		<dd>
			<?php echo h($site['Site']['no_teachers']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('スマホ対応'); ?></dt>
		<dd>
			<?php echo h($site['Site']['smartphone_support']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('講師勤務体系'); ?></dt>
		<dd>
			<?php echo h($site['Site']['duty_system']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('必要設備'); ?></dt>
		<dd>
			<?php echo h($site['Site']['required_device']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('サポート体制'); ?></dt>
		<dd>
			<?php echo h($site['Site']['support_system']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php if (!empty($site['Instructor'])): ?>
<div class="related">
	<h3><?php echo __('Related Instructors'); ?></h3>
	
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Profile'); ?></th>
		<th><?php echo __('E Name'); ?></th>
		<th><?php echo __('K Name'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Gender'); ?></th>
		<th><?php echo __('Speak Japanese'); ?></th>
		<th><?php echo __('Instructor History'); ?></th>
		<th><?php echo __('Evaluation'); ?></th>
		<th><?php echo __('Work Place'); ?></th>
		<th><?php echo __('Message'); ?></th>
		<th><?php echo __('Instructor Url'); ?></th>
	</tr>
	<?php foreach ($site['Instructor'] as $instructor): ?>
		<tr>
			<td><img src="<?php echo $retrieveInsThumb.$instructor['image']?>"></td>
			<td><?php echo $instructor['e_name']; ?></td>
			<td><?php echo $instructor['k_name']; ?></td>
			<td><?php echo $instructor['address']; ?></td>
			<td><?php echo $instructor['gender'] == 1 ?  "Male":"Female"; ?></td>
			<td><?php echo $instructor['speak_japanese'] == 0 ?  "Yes":"No"; ?></td>
			<td><?php echo $instructor['instructor_history']; ?></td>
			<td><?php echo $instructor['evaluation'] == 0 ?  "Good":"Bad"; ?></td>
			<td><?php echo $instructor['work_place']; ?></td>
			<td><?php echo $instructor['message']; ?></td>
			<td><?php echo $instructor['instructor_url']; ?></td>
		</tr>
	<?php endforeach; ?>
	</table>



</div>
<?php endif; ?>