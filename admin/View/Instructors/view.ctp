<div class="instructors view">
<h2><?php echo __('Instructor'); ?></h2>
	<dl>
		<dt><img src="<?php echo $retrieveInsThumb.$instructor['Instructor']['image']?>"></dt>
		<dt><?php echo __('Site'); ?></dt>
		<dd>
			<?php echo $this->Html->link($instructor['Site']['site_name'], array('controller' => 'sites', 'action' => 'view', $instructor['Site']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('名前（英語）'); ?></dt>
		<dd>
			<?php echo h($instructor['Instructor']['e_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('名前（カタカナ）'); ?></dt>
		<dd>
			<?php echo h($instructor['Instructor']['k_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('居住地/出身国'); ?></dt>
		<dd>
			<?php echo h($instructor['Instructor']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('性別'); ?></dt>
		<dd>
			<?php echo h($instructor['Instructor']['gender'] == 1 ? "Male":"Female" ); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('生年月日'); ?></dt>
		<dd>
			<?php echo h($instructor['Instructor']['birthdate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('年齢'); ?></dt>
		<dd>
			<?php echo h($instructor['Instructor']['age']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('最終学歴'); ?></dt>
		<dd>
			<?php echo h($instructor['Instructor']['education']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('学科'); ?></dt>
		<dd>
			<?php echo h($instructor['Instructor']['course']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('日本語対応'); ?></dt>
		<dd>
			<?php echo h($instructor['Instructor']['speak_japanese'] == 0 ? "Yes":"No" ); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('これなに？'); ?></dt>
		<dd>
			<?php echo h($instructor['Instructor']['language']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('講師歴'); ?></dt>
		<dd>
			<?php echo h($instructor['Instructor']['instructor_history']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('趣味'); ?></dt>
		<dd>
			<?php echo h($instructor['Instructor']['hobby']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('評価'); ?></dt>
		<dd>
			<?php echo h($instructor['Instructor']['evaluation'] == 0 ? "Good":"Bad"); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('評価コメント'); ?></dt>
		<dd>
			<?php echo h($instructor['Instructor']['eval_comment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('紹介動画'); ?></dt>
		<dd>
			<?php echo h($instructor['Instructor']['introduction_video']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('好きな映画 '); ?></dt>
		<dd>
			<?php echo h($instructor['Instructor']['favorite_movie']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('勤務場所'); ?></dt>
		<dd>
			<?php echo h($instructor['Instructor']['work_place']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('講師からのメッセージ（自己紹介）'); ?></dt>
		<dd>
			<?php echo h($instructor['Instructor']['message']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('タグ'); ?></dt>
		<dd>
			<?php echo h($instructor['Instructor']['tag']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('講師リンクURL'); ?></dt>
		<dd>
			<?php echo h($instructor['Instructor']['instructor_url']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
