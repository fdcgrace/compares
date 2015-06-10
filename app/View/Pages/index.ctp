<?php
/**
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 */

if (!Configure::read('debug')):
	throw new NotFoundException();
endif;

App::uses('Debugger', 'Utility');
?>
<header>
<div class="row">
  <div class="large-12 column">
    <img src="http://placehold.it/1500x400&text=[stuff and img]">
  </div>
</div>
</header>
<br>
<div class="row">
<div class="medium-3 large-3 text-center columns">
  <img src="http://placehold.it/150x150&text=[things]">
    <h4>Title of Content</h4>
    <p>Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit.</p>
    <p>Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit.</p>
</div>
<div class="medium-3 large-3 text-center column">
  <img src="http://placehold.it/150x150&text=[things]">
    <h4>Title of Content</h4>
    <p>Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit.</p>
</div>
<div class="medium-3 large-3 text-center column">
  <img src="http://placehold.it/150x150&text=[things]">
    <h4>Title of Content</h4>
    <p>Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit.</p>
</div>
<div class="medium-3 large-3 text-center column">
  <img src="http://placehold.it/150x150&text=[things]">
    <h4>Title of Content</h4>
    <p>Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit.</p>
</div>
</div>
