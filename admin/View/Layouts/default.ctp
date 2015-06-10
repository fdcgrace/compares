<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'Compare Prototype');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		//echo $this->Html->css(array('cake.generic','profile-homepage','bootstrap.min','foundation','normalize'));
		echo $this->Html->css(array('profile-homepage','bootstrap.min','foundation','normalize'));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script>
		$(function() {
			$(".readonly").keydown(false);

			$( "#datepicker" ).datepicker({
				onSelect: function (date) {
					var today = new Date(), 
				    birthday = $('#datepicker').datepicker("getDate"),
				    age = ((today.getMonth() > birthday.getMonth()) || (today.getMonth() == birthday.getMonth() && today.getDate() >= birthday.getDate())) ? today.getFullYear() - birthday.getFullYear() : today.getFullYear() - birthday.getFullYear()-1;
				    $('#age').val(age);
				},
				dateFormat: 'yy-mm-dd',
		        changeMonth: true,
		        changeYear: true,
				yearRange: '1950:c',
		        minDate: new Date(1950, 10 - 1, 25),
		        maxDate: '0'
			});
			$('#SiteNoTeachers').bind("paste", function(e) {
                e.preventDefault();
            });

			$('#SiteNoTeachers').keypress("paste",function(evt){
				evt = (evt) ? evt : window.event;
				var charCode = (evt.which) ? evt.which : evt.keyCode;
				if (charCode > 31 && (charCode < 48 || charCode > 57)) {
					return false;
				}
				return true;
			});

		});

	</script>
</head>
<body>
<div id="header">
	<nav class="top-bar" data-topbar>
		<ul class="title-area">
			<li class="name">
				<h1><a href="#"><?php echo $this->Html->link('Admin', array('controller' => 'sites', 'action' => 'index')); ?></a></h1>
			</li>
			<li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
		</ul>
		<section class="top-bar-section">
			<ul class="right">
				<?php if ($loggedIn): ?>
					<li>
			       		<a href="#">
			       		<?php echo $this->Html->link($currUser['name'], array('controller' => 'users', 'action' => 'edit', $currUser['id'])); ?>
			        	</a>
			        </li>
				    <li>
				    	<a href="#"><?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?></a>
				    </li>
				<?php else: ?>
				    <li>
				    	<a href="#"><?php echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login')); ?></a>
				    </li>
				<?php endif; ?>
			</ul>
		</section>
		</nav>
	</div>
	<div id="container">
		<?php
			echo $this->element('header');
			echo $this->fetch('header_block'); 
		?>
		<div id="content">

			<?php 
				echo $this->Session->flash(); 
				//sidebar
				echo $this->element('sidebar');
				echo $this->fetch('sidebar_block'); 
			?>
			<div class="small-10 columns">
			    <?php echo $this->fetch('content'); ?>
			</div>			
		</div>
		<?php
			echo $this->element('footer');
			echo $this->fetch('footer_block'); 
		?>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
