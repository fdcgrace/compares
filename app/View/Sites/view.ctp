<div class="modified-row white-content">
  <!-- page title here -->
  <?php if($site):?>
  <div class="row">
    <h2>サイトロゴ/タイトル</h2>
  </div>

  <hr> <!-- divider -->
  
  <div class="row">
    <!-- content and links -->
    
    <div class="small-9 columns">
    	<div class="row">
			<div class="small-3 columns">
				<img src="http://placehold.it/300x240&text=[img]" />
			</div>
			<div class="small-9 columns">
				<p class="p-title">サイト名: <span class="p-content"><?php echo $site[0]['Site']['site_name']; ?></span></p>
				<p class="p-title">表示URL（リンク） : <?php echo $this->Html->link($site[0]['Site']['site_url_link'], array(), array('class' => 'p-content')); ?></p>

				<div class="panel" data-equalizer-watch="">
			    	<h3 class="subheader">サイトのメリット</h3>
			    	<p>ぐじりゃ谦廥 びヴィ卣娩びょ を㤣チュ びヴィ, わ楜 㶣馜蟨わ楜 ウュぱハ杦禧 㤣チュゆ嶥廩 	て餣ひょ, ぶ横 け砥あ 槜づにゅ簥ぢゅ で趣䋨せしゅ 韦ぬむ詞珥 騌棌鄢㩟ぜ ッきゃ	て餣ひょ 監カ飌きゅを 䝣揣 ヴィ卣娩, 䪦滥だ ミャ栨 栨姨た嶣夯 がちげひゅ囤 绣駺𐤦曣訣 槎䰥ぶ 鄩で 天杩蛣穟鄩 監カ飌きゅを ッ䩩な よ奚榊饣叧 な駧蟤覩䧦 勯ーぞしょぢ 䋤䧎 む詞珥 府谨驩楯揦 れのぴゅか駪 しブ獤キャ礥 ウュぱ, びょ雤㧦 ちょ槎䰥ぶ横 騌棌鄢㩟ぜ 驚ねみゅ䝣揣 	て餣 谦廥 埣檤訊ガ穃 襧こゼ㠤ズ 䪦滥だ, 褤襩ぼゑお 䪦滥だ菣ラ゜ 監カ飌きゅを 鏨ぺ ゆ嶥廩 椺ゞ ッきゃ	て餣ひょ 㤣チュゆ嶥廩 狧っ润, 狧っ润䥜楃 㶣馜蟨わ楜 ニョ姌ら祧ば 奥䩦ディ げひゅ ぶ横 栨姨た嶣夯 府谨驩楯揦 驚ねみゅ䝣揣 ニョ姌ら, 馤きレニュコ 府谨驩楯揦 㶣馜蟨わ楜 ピュみゃ 饃矤禤 饯とにゃり饺 ッきゃ	て餣ひょ 樦隊ウゥ 妥㠣 卣娩 杦禧䏦 ちゃ誧ピュみゃ騪 な駧蟤覩䧦 蝣椺ゞちゅ馨 しブ獤キャ礥 みゅ䝣揣 じょう</p>
			    </div>

			    <div class="panel" data-equalizer-watch="">
			    	<h3 class="subheader">サイトのデメリット</h3>
			    	<p>ぐじりゃ谦廥 びヴィ卣娩びょ を㤣チュ びヴィ, わ楜 㶣馜蟨わ楜 ウュぱハ杦禧 㤣チュゆ嶥廩 	て餣ひょ, ぶ横 け砥あ 槜づにゅ簥ぢゅ で趣䋨せしゅ 韦ぬむ詞珥 騌棌鄢㩟ぜ ッきゃ	て餣ひょ 監カ飌きゅを 䝣揣 ヴィ卣娩, 䪦滥だ ミャ栨 栨姨た嶣夯 がちげひゅ囤 绣駺𐤦曣訣 槎䰥ぶ 鄩で 天杩蛣穟鄩 監カ飌きゅを ッ䩩な よ奚榊饣叧 な駧蟤覩䧦 勯ーぞしょぢ 䋤䧎 む詞珥 府谨驩楯揦 れのぴゅか駪 しブ獤キャ礥 ウュぱ, びょ雤㧦 ちょ槎䰥ぶ横 騌棌鄢㩟ぜ 驚ねみゅ䝣揣 	て餣
			    	</p>
			    </div>

			    <table>
			    	<tr>
			    		<th class="table-header-black">無料体験レッスン:</th>
			    		<td class="table-content"><?php echo h($site[0]['Site']['trial_lesson']); ?></td>
			    	</tr>
			    	<tr>
			    		<th class="table-header-black">入会金:</th>
			    		<td class="table-content"><?php echo h($site[0]['Site']['admission_fee']); ?></td>
			    	</tr>
			    	<tr>
			    		<th class="table-header-black">料金プラン:</th>
			    		<td class="table-content"><?php echo h($site[0]['Site']['rate_plan']); ?></td>
			    	</tr>
			    	<tr>
			    		<th class="table-header-black">1レッスンの最安値:</th>
			    		<td class="table-content"><?php echo h($site[0]['Site']['lowest_price']); ?></td>
			    	</tr>
			    	<tr>
			    		<th class="table-header-black">教材:</th>
			    		<td class="table-content">???</td>
			    	</tr>
			    	<tr>
			    		<th class="table-header-black">受講可能時間:</th>
			    		<td class="table-content"><?php echo h($site[0]['Site']['lesson_time']); ?></td>
			    	</tr>
			    	<tr>
			    		<th class="table-header-black">講師国籍:</th>
			    		<td class="table-content"><?php echo h($site[0]['Site']['nationality']); ?></td>
			    	</tr>
			    	<tr>
			    		<th class="table-header-black">講師勤務体系:</th>
			    		<td class="table-content"><?php echo h($site[0]['Site']['support_system']); ?></td>
			    	</tr>
			    </table>
			</div>
			<div class="small-3 columns">
				<span class="tag"><h4 class="white-text">タグ</h4></span>
			</div>
			<div class="small-9 columns">
				<table>
			    	<tr>
			    		<th class="table-header-red">マンツーマン</th>
			    		<td class="table-content-red"><?php //echo h($site[0]['Site']['trial_lesson']); ?></td>
			    		<th class="table-header-red">TOEIC対応</th>
			    		<td class="table-content-red"><?php echo h($site[0]['Site']['certified']); ?></td>
			    	</tr>
			    	<tr>
			    		<th class="table-header-green">ビジネス英会話</th>
			    		<td class="table-content-green"><?php echo h($site[0]['Site']['bus_conv_course']); ?></td>
			    		<th class="table-header-green">Kidsコース</th>
			    		<td class="table-content-green"><?php echo h($site[0]['Site']['kisd_course']); ?></td>
			    	</tr>
			    	<tr >
			    		<th class="table-header-blue">TOEFL対応</th>
			    		<td class="table-content-blue" colspan="3"><?php //echo h($site[0]['Site']['rate_plan']); ?></td>
			    	</tr>
			    </table>
			</div>
		</div>
    </div>

    <!-- side ads -->
    <div class="small-3 columns">

    </div>
    <?php else:?>
		<div class="row">
	    	<h2>Not Found</h2>
	  	</div>
	  	<hr>
	  	<div class="row"> 
			<div class="small-9 columns">
				<h1>Site not found.</h1>
			</div>
		</div>
	<?php endif;?>	
  </div>
</div>