<div class="instructors form">
<?php echo $this->Form->create('Instructor'); ?>
	<fieldset>
		<legend><?php echo __('Add Instructor'); ?></legend>
	<?php
		echo $this->Form->input('site_id', array('label'=>'所属サイト Affiliated Site'));
		echo $this->Form->input('e_name', array('label' => '名前（英語） Name (English)'));
		echo $this->Form->input('k_name', array('label' => '名前（英語） Name (katakana)'));
		echo $this->Form->input('address', array('label' => '居住地/出身国 Address/Homeland'));
		echo $this->Form->input('gender', array('label' => '性別 Gender',  'type'=>'select',
                        'options'=> $gender));
		echo $this->Form->input('birth', array('label' => '生年月日 Date of Birth', 'id' => 'datepicker', 'name' => 'data[Instructor][birthdate]', 'class' => 'readonly', 'default' => $birthdate));
		echo $this->Form->input('age', array('label' => '年齢 Age', 'id' => 'age', 'class' => 'readonly', 'default' => $age));
		echo $this->Form->input('educ', array('label' => '最終学歴 Latest Education Background'));
		echo $this->Form->input('course', array('label' => '学科 Course Of Study'));
		echo $this->Form->input('speak_japanese', array('label' => '日本語対応 Can speak Japanese',  'type'=>'select',
                        'options'=> $speak_japanese));
		echo $this->Form->input('language');
		echo $this->Form->input('history', array('label' => '講師歴 Instructor History '));
		echo $this->Form->input('hobby', array('label' => '趣味 Hobby'));
		echo $this->Form->input('evaluation', array('label' => '評価 Evaluation',  'type'=>'select',
                        'options'=> $evaluation));
		echo $this->Form->input('eval_comment', array('label' => '評価コメント Evaluation Comments'));
		echo $this->Form->input('video', array('label' => '紹介動画 Introduction Video'));
		echo $this->Form->input('movie', array('label' => '好きな映画 Favorite Movie'));
		echo $this->Form->input('work_place', array('label' => '勤務場所 Work Place'));
		echo $this->Form->input('message', array('label' => '講師からのメッセージ（自己紹介） Message from the Intructor (self-introduction)'));
		echo $this->Form->input('tag', array('label' => 'タグ Tag'));
		echo $this->Form->input('instructor_url', array('label' => '講師リンクURL Instructor link URL'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

