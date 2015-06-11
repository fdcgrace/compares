<div class="instructors form">
<?php
echo "<img src='$retrieveInsThumb$img' width='120' height='120'>";
			echo "<br><br>";
?>
<?php echo $this->Form->create('Instructor', array('enctype'=>'multipart/form-data')); ?>
	<fieldset>
		<legend><?php echo __('Edit Instructor'); ?></legend>
	<?php
		echo $this->Form->input('getimage', array('type'=>'hidden', 'default' => $img));
		echo $this->Form->input('id');
		echo $this->Form->input('Profile', array('type'=>'file','name' => 'data[Instructor][image]'));
		echo $this->Form->input('site_id', array('label'=>'所属サイト'));
		echo $this->Form->input('e_name', array('label' => '名前（英語）'));
		echo $this->Form->input('k_name', array('label' => '名前（英語）'));
		echo $this->Form->input('address', array('label' => '居住地/出身国'));
		echo $this->Form->input('gender', array('label' => '性別',  'type'=>'select',
                        'options'=> $gender, 'default' => $getgender));
		echo $this->Form->input('birth', array('label' => '生年月日', 'id' => 'datepicker', 'name' => 'data[Instructor][birthdate]', 'default' => $get_birthdate, 'class' => 'readonly'));
		echo $this->Form->input('age', array('label' => '年齢', 'id' => 'age', 'class' => 'readonly'));
		echo $this->Form->input('educ', array('label' => '最終学歴'));
		echo $this->Form->input('course', array('label' => '学科'));
		echo $this->Form->input('speak_japanese', array('label' => '日本語対応',  'type'=>'select',
                        'options'=> $speak_japanese, 'default' => $get_speak_japanese));
		echo $this->Form->input('language');
		echo $this->Form->input('history', array('label' => '講師歴'));
		echo $this->Form->input('hobby', array('label' => '趣味'));
		echo $this->Form->input('evaluation', array('label' => '評価',  'type'=>'select',
                        'options'=> $evaluation, 'default' => $get_evaluation));
		echo $this->Form->input('eval_comment', array('label' => '評価コメント'));
		echo $this->Form->input('video', array('label' => '紹介動画'));
		echo $this->Form->input('movie', array('label' => '好きな映画'));
		echo $this->Form->input('work_place', array('label' => '勤務場所'));
		echo $this->Form->input('message', array('label' => '講師からのメッセージ（自己紹介）'));
		echo $this->Form->input('tag', array('label' => 'タグ'));
		echo $this->Form->input('instructor_url', array('label' => '講師リンクURL'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

