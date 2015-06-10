
<div class="row">
  <div class="small-11 small-centered columns">
  	<?php echo $this->Session->flash('auth'); ?>
	<?php echo $this->Form->create('User'); ?>
	    <fieldset>
	        <legend><?php echo __('Please enter your username and password'); ?></legend>
	        <?php 
		        echo $this->Form->input('username');
		        echo $this->Form->input('password');
	    	?>
	    </fieldset>
	<?php echo $this->Form->end('Login'); echo $this->Html->link( "Create Account",   array('action'=>'add') ); ?>
  </div>
</div>
