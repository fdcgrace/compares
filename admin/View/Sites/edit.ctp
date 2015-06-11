<div class="sites form">

	<fieldset>
		<legend><?php echo __('Admin Edit Site'); ?></legend>

		<?php 
			echo "<img src='$retrieveSiteThumb$img' width='120' height='120'>";
			echo "<br><br>";
			
			echo $this->Form->create('Site', array('enctype'=>'multipart/form-data')); 
			echo $this->Form->input('getimage', array('type'=>'hidden', 'default' => $img));
			echo $this->Form->input('upload', array('type'=>'file','name' => 'data[Site][site_image]'));
			echo $this->Form->input('id');
			echo $this->Form->input('merit_site', array('label' => 'サイトのメリット'));
			echo $this->Form->input('demerite_site', array('label' => 'サイトのデメリット'));
			echo $this->Form->input('site_name', array('label' => 'サイト名'));
			echo $this->Form->input('site_url_display', array('label' => 'サイトURL（表示用）'));
			echo $this->Form->input('site_url_link', array('label' => 'サイトURL（リンク用）'));
			echo $this->Form->input('company_name', array('label' => '運営会社名'));
			echo $this->Form->input('trial_lesson', array('label' => '無料体験レッスン'));
			echo $this->Form->input('admission_fee', array('label' => '入会金（入学金）'));
			echo $this->Form->input('rate_plan', array('label' => '料金プラン'));
			echo $this->Form->input('textbook', array('label' => '教材'));
			echo $this->Form->input('lesson_time', array('label' => '受講可能時間'));
			echo $this->Form->input('lowest_price', array('label' => '1レッスンの最安値'));
			echo $this->Form->input('payment_method', array('label' => '支払い方法'));
			echo $this->Form->input('nationality', array('label' => '講師国籍（ネイティブ在籍）'));
			echo $this->Form->input('group_lesson', array('label' => 'マンツーマン/グループレッスン'));
			echo $this->Form->input('certified', array('label' => 'TOEIC/TOEFL対応'));
			echo $this->Form->input('bus_conv_course', array('label' => 'ビジネス英会話コース'));
			echo $this->Form->input('kisd_course', array('label' => 'Kidsコース'));
			echo $this->Form->input('no_teachers', array('label' => '講師数'));
			echo $this->Form->input('smartphone_support', array('label' => 'スマホ対応'));
			echo $this->Form->input('duty_system', array('label' => '講師勤務体系'));
			echo $this->Form->input('required_device', array('label' => '必要設備'));
			echo $this->Form->input('support_system', array('label' => 'サポート体制'));
	?>
	<?php echo $this->Form->end(__('Submit')); ?>
	</fieldset>
</div>