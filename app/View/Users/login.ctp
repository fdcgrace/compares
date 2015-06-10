<div class="row" style="margin-top: 100px; box-shadow: 9px 9px 1px 0 rgba(0,0,0,0.2); background-color: #fff; border-radius: 5pt; border: 1px solid #ccc; padding: 20px;">
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
		  <div class="medium-2 columns"><?php echo $this->Form->submit('Login', array('class' => 'button small radius')); ?></div>
		  <div class="medium-10 columns"><?php  echo $this->Html->link( "Register",   array('action'=>'add'), array('class' => 'button small radius') ); ?></div>
		</div>
	</div>
</div>
