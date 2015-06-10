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

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		Compare Prototype
		<?php //echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');
		echo $this->Html->css(array('foundation', 'normalize', 'common'));
		echo $this->Html->script(array(
			'jquery.js', 
			'foundation.js', 
			'foundation.dropdown.js',
			'foundation.tooltip.js',
			'foundation.magellan.js'
			)
		);

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');

	?>
</head>
<body style="background-color: #e7e7e7;">
	<div id="container">
		<div id="header">
			<nav class="top-bar" data-topbar>
			<ul class="title-area">
				<li class="name">
					<h1><a href="#"><?php echo $this->Html->link('Compare Prototype', array('controller' => 'sites', 'action' => 'index')); ?></a></h1>
				</li>
			  <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
			</ul>

			<section class="top-bar-section">
			 
			  <ul class="right">
			    <li>
			    	<a href="#"><?php echo $this->Html->link('Sites', array('controller' => 'sites', 'action' => 'index')); ?></a></li>
			    <li>
			    	<a href="#"><?php echo $this->Html->link('Instructors', array('controller' => 'instructors', 'action' => 'index')); ?></a></li>
			    <li>
			  		<a href="#">
			  		<?php echo $this->Html->link($currUser['name'], array('controller' => 'users', 'action' => 'edit', $currUser['id'])); ?>
			  		</a>
			  	</li>
			    <!-- <li><a href="#">Nav Button</a></li>
			    <li><a href="#">Nav Button</a></li>
			    <li><a href="#">Nav Button</a></li>
			    <li><a href="#">Nav Button</a></li> -->
			    <?php if ($loggedIn): ?>
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

		<div id="content" >

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
		</div>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
