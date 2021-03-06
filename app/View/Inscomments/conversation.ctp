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
                    <?php echo $this->Form->input(_('message'), array('type' => 'textarea', 'placeholder' => 'Type your comment here...', 'label' => false, 'style'=>'color: #000;'));?>
                </div>
                <div class="small-2 columns">
                  <?php echo $this->Form->submit('Send', array('class' => 'button postfix',  'title' => 'Click here to send') );?>
                </div>
        <!--     </div>
        </div> -->
        </div>
    <hr>
        <?php if($comments): ?>
            <?php if(isset($sessionCheck) && $instructor['Instructor']['id'] == $commentSes['Inscomment']['instructor_id']): ?>
                <div class="panel">
                <span style="color: #FF0000">Your comment is waiting for approval and will look like this.</span>
                <?php if($commentSes['Inscomment']['message']): ?>
                  <p class="alert-box info radius"><?php echo $commentSes['Inscomment']['message']; ?></p>
                <?php endif; ?>
                  <h5><small>By: <?php echo (isset($commentSes['User']['name']))? $commentSes['User']['name'] : 'Anonymous'; ?></small></h5>
                  <h5><small>Created: <?php echo $commentSes['Inscomment']['created']; ?></small></h5>
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
                <?php if($comment['Inscomment']['message']): ?>
                  <p class="alert-box info radius"><?php echo $comment['Inscomment']['message']; ?></p>
                <?php endif; ?>
                  <h5><small>By: <?php echo (isset($comment['User']['name']))? $comment['User']['name'] : 'Anonymous'; ?></small></h5>
                  <h5><small>Created: <?php echo $comment['Inscomment']['created']; ?></small></h5>
                <?php if($key > 0):?>
                  <h5><small>Posted: <?php echo $getdays->d;?> Days <?php echo $getdays->h;?> hours <?php echo $getdays->i;?> mins <?php echo $getdays->s;?> secs ago</small></h5>
                <?php endif; ?>
                </div>
                
            <?php endforeach; ?>
        <?php else: ?>
            <?php if(isset($sessionCheck) && $instructor['Instructor']['id'] == $commentSes['Inscomment']['site_id']): ?>
                <div class="panel">
                <span style="color: #FF0000">Your comment is waiting for approval and will look like this.</span>
                <?php if($commentSes['Inscomment']['message']): ?>
                  <p class="alert-box info radius"><?php echo $commentSes['Inscomment']['message']; ?></p>
                <?php endif; ?>
                  <h5><small>By: <?php echo (isset($commentSes['User']['name']))? $commentSes['User']['name'] : 'Anonymous'; ?></small></h5>
                  <h5><small>Created: <?php echo $commentSes['Inscomment']['created']; ?></small></h5>
                </div>
            <?php else:?>
                <div class="panel">
                    <h5><small>Write your comment now.</small>
                </div>
            <?php endif; ?>
        <?php endif; ?> 
    
</div>