<div class="row alert-box info radius" style="padding-left: 1.5rem!important">
    <div class="row" >
        
        <div class="small-10 columns">
            <ul class="side-nav">
                <li>Site Name: <?php echo $instructor['Instructor']['site_name']?></li>
      
                <li><span class="round label">Good <?php echo $good; ?></span></li>
                <li><span class="round alert label">Bad <?php echo $bad; ?></span></li>
            </ul>
        
        </div>
    </div>

    
        <!-- <div class="small-2 columns"></div>
        <div class="small-10 columns"> -->
        <div class="row">
            <?php echo $this->Form->create('Comment', array('controller' => 'comments', 'action' => 'sendmessage'));?>
            <div class="row collapse" style="margin-top: 10px; margin-bottom: 10px;">
                <div class="small-10 columns">
                    <?php echo $this->Form->input(_('user_id'), array('type' => 'hidden', 'value' => $users['id']));?>
                    <?php echo $this->Form->input(_('site_id'), array('type' => 'hidden', 'value' => $instructor['Site']['id']));?>
                    <?php echo $this->Form->input(_('message'), array('type' => 'textarea', 'placeholder' => 'Type your comment here...', 'label' => false));?>
                </div>
                <div class="small-2 columns">
                  <?php echo $this->Form->submit('Send', array('class' => 'button postfix',  'title' => 'Click here to send') );?>
                </div>
        <!--     </div>
        </div> -->
        </div>
        <?php if($comments): ?>
            <?php if(isset($sessionCheck) && $instructors['Site']['id'] == $commentSes['Comment']['site_id']): ?>
                <div class="panel">
                <span style="color: #FF0000">Your comment is waiting for approval and will look like this.</span>
                <?php if($commentSes['Comment']['message']): ?>
                  <p class="alert-box info radius"><?php echo $commentSes['Comment']['message']; ?></p>
                <?php endif; ?>
                  <h5><small>By: <?php echo (isset($commentSes['User']['name']))? $commentSes['User']['name'] : 'Anonymous'; ?></small></h5>
                  <h5><small>Created: <?php echo $commentSes['Comment']['created']; ?></small></h5>
                </div>
            <?php endif;?>
            <?php foreach($comments as $key => $comment):?>
                <?php 
                    $val1 = date("Y-m-d H:i:s");
                    $val2 = $comment['Comment']['created'];
                    $datetime1 = new DateTime($val1);
                    $datetime2 = new DateTime($val2);
                    $getdays = $datetime1->diff($datetime2);
                ?>
                <?php if($key == 0):?>
                    <h5><small>Latest comment: <?php echo $getdays->d;?> Days <?php echo $getdays->h;?> hours <?php echo $getdays->i;?> mins <?php echo $getdays->s;?> secs ago</small></h5>
                <?php endif; ?>
                <div class="panel">
                <?php if($comment['Comment']['message']): ?>
                  <p class="alert-box info radius"><?php echo $comment['Comment']['message']; ?></p>
                <?php endif; ?>
                  <h5><small>By: <?php echo (isset($comment['User']['name']))? $comment['User']['name'] : 'Anonymous'; ?></small></h5>
                  <h5><small>Created: <?php echo $comment['Comment']['created']; ?></small></h5>
                <?php if($key > 0):?>
                  <h5><small>Posted: <?php echo $getdays->d;?> Days <?php echo $getdays->h;?> hours <?php echo $getdays->i;?> mins <?php echo $getdays->s;?> secs ago</small></h5>
                <?php endif; ?>
                </div>
                
            <?php endforeach; ?>
        <?php else: ?>
            <?php if(isset($sessionCheck) && $instructors['Site']['id'] == $commentSes['Comment']['site_id']): ?>
                <div class="panel">
                <span style="color: #FF0000">Your comment is waiting for approval and will look like this.</span>
                <?php if($commentSes['Comment']['message']): ?>
                  <p class="alert-box info radius"><?php echo $commentSes['Comment']['message']; ?></p>
                <?php endif; ?>
                  <h5><small>By: <?php echo (isset($commentSes['User']['name']))? $commentSes['User']['name'] : 'Anonymous'; ?></small></h5>
                  <h5><small>Created: <?php echo $commentSes['Comment']['created']; ?></small></h5>
                </div>
            <?php else:?>
                <div class="panel">
                    <h5><small>Write your comment now.</small>
                </div>
            <?php endif; ?>
        <?php endif; ?> 
    
</div>