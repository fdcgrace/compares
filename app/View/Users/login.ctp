<div class="row">
	<div>
		<?php echo $this->Session->flash('auth'); ?>
		<?php echo $this->Form->create('User', array('controller' => 'Users', 'action' => 'login')); ?>
	    <fieldset>
	        <legend><?php echo __('Please enter your username and password'); ?></legend>
	        <?php 
		        echo $this->Form->input('username');
		        echo $this->Form->input('password');
	    	?>
	    </fieldset>
	    <div class="row" style="margin-top: 10px">
		  <div class="medium-2 columns"><?php echo $this->Form->submit('Login', array('class' => 'button small')); ?></div>
		  <div class="medium-10 columns"><?php  echo $this->Html->link( "Register",   array('action'=>'add'), array('class' => 'button small') ); ?></div>
		</div>
	</div>
</div>
