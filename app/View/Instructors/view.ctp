<div class="row black-content">
  <!-- page title here -->
  <div class="row white-text">
    <h2 class="white-text">サイトロゴ/タイトル</h2>
  </div>

  <hr> <!-- divider -->

  <div class="row white-text">
    <!-- content and links -->
    <div class="small-9 columns white-text">
     	<div class="row">
			<div class="small-3 columns">
				<img src="http://placehold.it/300x240&text=[img]" />
			</div>
			<div class="small-9 columns">
				<p>名前（英語）: <?php echo $instructor['Instructor']['e_name']; ?> / 名前（日本語）: <?php echo $instructor['Instructor']['k_name']; ?></p>
				<p>所属サイト: <?php echo $instructor['Instructor']['site_id']; ?></p>
				<p>居住地: <?php echo $instructor['Instructor']['address']; ?></p>
				<p>性別: <?php echo $instructor['Instructor']['gender']; ?></p>
				<p>年齢: <?php echo $instructor['Instructor']['age']; ?></p>
				<p>最終学歴: <?php echo $instructor['Instructor']['education']; ?></p>
				<p>学科: <?php echo $instructor['Instructor']['course']; ?></p>
				<p>日本語対応: <?php echo $instructor['Instructor']['speak_japanese']; ?></p>
				<p>講師歴: <?php echo $instructor['Instructor']['instructor_history']; ?></p>
				<p>勤務場所: <?php echo $instructor['Instructor']['work_place']; ?></p>
			</div>
		</div>
		<div class="center-text">
			<?php if ($loggedIn): ?>
		 			<a href='#' id='goodAction' class='button tiny round'>Good!（数）</a>
					<?php 
						/*echo $this->Html->link(__('Good!（数）'), array('controller' => 'inscomments', 'action' => 'conversation', $instructor['Instructor']['id']), array('class' => 'button tiny round', 'id' => 'goodAction'));*/
					?>
					<a href='#' id='badAction' class='button tiny alert round'>Bad!（数）</a>
					<?php 
						/*echo $this->Html->link(__('Bad!（数）'), array('controller' => 'inscomments', 'action' => 'conversation', $instructor['Instructor']['id']), array('class' => 'button tiny alert round', 'id' => 'badAction'));*/
					?>
		
			<?php  endif; ?>
			<a href='#' class='button tiny round'>動画を見る</a>
			<a href='#' class='button tiny round'>サイトを見る</a>
			<h4><small>押したらテキストボックスがポップアップしてコメント出来る</small></h4>
		</div>
		<?php if($comments): ?>

            <?php if(isset($sessionCheck) && $instructor['Instructor']['id'] == $commentSes['Inscomment']['instructor_id']): ?>
                
                <span style="color: #FFF">Your comment is waiting for approval and will look like this.</span>
                <div class="panel">
	                <div class="row">
		                <div class="small-2 columns">
		                	<span class="ratings<?php echo $commentSes['Inscomment']['rate']?>"><?php echo ($commentSes['Inscomment']['rate'] == 1)?'Good':'Bad';?></span>
		                </div>
		                <div class="small-10 columns">
		                	<?php if($commentSes['Inscomment']['message']): ?>
		                  		<p class="alert-box info radius" style="word-wrap: break-word;"><?php echo $commentSes['Inscomment']['message']; ?></p>
		                  	<?php endif; ?>
		                </div>
		                
	                  	<h5><small>By: <?php echo (isset($commentSes['User']['name']))? $comment['User']['name'] : 'Anonymous'; ?></small></h5>
	                  	<h5><small>Created: <?php echo $commentSes['Inscomment']['created']; ?></small></h5>
		            </div>
                </div>
            <?php endif;?>

            <?php foreach($comments as $key => $comment):?>
                <?php 
                    $val1 = date("Y-m-d H:i:s");
                    $val2 = $comment['Inscomment']['created'];
                    $datetime1 = new DateTime($val1);
                    $datetime2 = new DateTime($val2);
                    $getdays = $datetime1->diff($datetime2);
                ?>
                
                <?php if($key == 0):?>
                    <h5><small>Latest comment: <?php echo $getdays->d;?> Days <?php echo $getdays->h;?> hours <?php echo $getdays->i;?> mins <?php echo $getdays->s;?> secs ago</small></h5>
                <?php endif; ?>
                <div class="panel">
	                <div class="row">
		                <div class="small-2 columns">
		                	<span class="ratings<?php echo $comment['Inscomment']['rate']?>"><?php echo ($comment['Inscomment']['rate'] == 1)?'Good':'Bad';?></span>
		                </div>
		                <div class="small-10 columns">
		                	<?php if($comment['Inscomment']['message']): ?>
		                  		<p class="alert-box info radius" style="word-wrap: break-word;"><?php echo $comment['Inscomment']['message']; ?></p>
		                  	<?php endif; ?>
		                </div>
		                
	                  	<h5><small>By: <?php echo (isset($comment['User']['name']))? $comment['User']['name'] : 'Anonymous'; ?></small></h5>
	                  	<h5><small>Created: <?php echo $comment['Inscomment']['created']; ?></small></h5>
		                <?php if($key > 0):?>
		                 	 <h5><small>Posted: <?php echo $getdays->d;?> Days <?php echo $getdays->h;?> hours <?php echo $getdays->i;?> mins <?php echo $getdays->s;?> secs ago</small></h5>
		                <?php endif; ?>
		            </div>
                </div>
                
            <?php endforeach; ?>

        <?php else: ?>

            <?php if(isset($sessionCheck) && $instructor['Instructor']['id'] == $commentSes['Inscomment']['site_id']): ?>

                <div class="panel">
                <span style="color: #FFF">Your comment is waiting for approval and will look like this.</span>
                	<div class="row">
		                <div class="small-2 columns button">
		                	<span class="ratings<?php echo $commentSes['Inscomment']['rate']?>"><?php echo ($commentSes['Inscomment']['rate'] == 1)?'Good':'Bad';?></span>
		                </div>
		                <div class="small-10 columns">
		                	<?php if($commentSes['Inscomment']['message']): ?>
		                  		<p class="alert-box info radius" style="word-wrap: break-word;"><?php echo $commentSes['Inscomment']['message']; ?></p>
		                  	<?php endif; ?>
		                </div>
		                
	                  	<h5><small>By: <?php echo (isset($commentSes['User']['name']))? $comment['User']['name'] : 'Anonymous'; ?></small></h5>
	                  	<h5><small>Created: <?php echo $commentSes['Inscomment']['created']; ?></small></h5>
		            </div>
                </div>

            <?php else:?>

                <div class="panel">
                    <h5><small>Write your comment now.</small>
                </div>

            <?php endif; ?>

        <?php endif; ?> 
    </div>

   

    <!-- side ads -->
    <div class="small-3 columns white-text">



    </div>
  </div>
</div>

<div id="myModal" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
  <div class="row alert-box warning radius" style="padding-left: 1.5rem!important; background-color: #FF944D;margin-top: 15px; border-radius: 7pt;box-shadow: 9px 9px 1px 0 rgba(0,0,0,0.2);">
    <div class="row" >
        
        <div class="small-10 columns">
            <ul class="side-nav">

                <li>Teacher: <?php echo $instructor['Instructor']['e_name']?></li>
      
                <li><span class="round label">Good <?php echo $good; ?></span></li>
                <li><span class="round alert label">Bad <?php echo $bad; ?></span></li>
            </ul>
        
        </div>
    </div>

    <hr>
        <!-- <div class="small-2 columns"></div>
        <div class="small-10 columns"> -->
        <div class="row">
            <?php echo $this->Form->create('Inscomment', array('controller' => 'inscomments', 'action' => 'sendmessage'));?>
            <div class="row collapse" style="margin-top: 10px; margin-bottom: 10px;">
                <div class="small-10 columns">
                    <?php echo $this->Form->input(_('user_id'), array('type' => 'hidden', 'value' => $users['id']));?>
                    <?php echo $this->Form->input(_('instructor_id'), array('type' => 'hidden', 'value' => $instructor['Instructor']['id']));?>
                    <?php echo $this->Form->input(_('rate'), array('type' => 'hidden', 'id' => 'eval'));?>
                    <?php echo $this->Form->input(_('message'), array('type' => 'textarea', 'placeholder' => 'Type your comment here...', 'label' => false, 'style'=>'color: #000;'));?>
                </div>
                <div class="small-2 columns">
                  <?php echo $this->Form->submit('Send', array('class' => 'button postfix',  'title' => 'Click here to send') );?>
                </div>
        <!--     </div>
        </div> -->
        </div>
	<a class="close-reveal-modal" aria-label="Close">x</a>
</div>

<!-- js -->
<script type="text/javascript">
	$('#goodAction').click(function() {
		$('#myModal').foundation('reveal', 'open');
		$('#myModal').foundation('reveal', 'close');
		$('#eval').val('1');
	});
	$('#badAction').click(function() {
		$('#myModal').foundation('reveal', 'open');
		$('#myModal').foundation('reveal', 'close');
		$('#eval').val('0');
	});
</script>