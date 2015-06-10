<?php
    if($this->Session->check('Auth.User')){
        if ($this->Session->check('sessionRole')) {
            if($this->Session->read('sessionRole') == 1){
                $style="style='display:none'";
                $style1 = '';
                 $hide = "style='display:none'";
            }else{
                $style = '';
                $style1 = '';
                $hide = "style='display:none'";
            }
        }
    }else{
        $style = "style='display:none'";
        $style1 = "style='display:none'";
        $hide = "";
    }
?>

<div class="small-2 columns">
    <ul class="side-nav">
        <li <?php echo $style1; ?>><?php echo $this->Html->link(__('Home'), array('controller' => 'users', 'action' => 'index')); ?> </li>
        <li class="divider" <?php echo $style; ?>></li>
        <li <?php echo $style; ?>><?php echo $this->Html->link(__('New Site'), array('controller' => 'sites', 'action' => 'add')); ?></li>
        <li <?php echo $style; ?>><?php echo $this->Html->link(__('New Instructor'), array('controller' => 'instructors', 'action' => 'add')); ?> </li>
        <li <?php echo $style; ?>><?php echo $this->Html->link( "New User",   array('controller' => 'users','action'=>'add')); ?></li>
        <li class="divider" <?php echo $style1; ?>></li>
        <li <?php echo $style1; ?>><?php echo $this->Html->link(__('Sites List '), array('controller' => 'sites', 'action' => 'index')); ?> </li>
        <li <?php echo $style1; ?>><?php echo $this->Html->link(__('Instructors List '), array('controller' => 'instructors', 'action' => 'index')); ?> </li>
        <li <?php echo $style; ?>><?php echo $this->Html->link(__('Users List'), array('controller' => 'users', 'action' => 'index')); ?> </li>
        <li <?php echo $style1; ?>><?php echo $this->Html->link(__('Sites Comments'), array('controller' => 'comments', 'action' => 'index')); ?> </li>
        <li <?php echo $style1; ?>><?php echo $this->Html->link(__('Instructors Comments'), array('controller' => 'inscomments', 'action' => 'index')); ?> </li>
        
    </ul>
</div>