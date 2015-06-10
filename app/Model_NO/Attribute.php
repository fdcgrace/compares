<?php
App::uses('AppModel', 'Model');
/**
 * Attribute Model
 *
 * @property Site $Site
 * @property User $User
 */
class Attribute extends AppModel {
//var $useTable = 'sites';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Site' => array(
			'className' => 'Site',
			'foreignKey' => 'site_id',
			'conditions' => '',
			'fields' => array('id', 'site_name'),
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => array('id', 'name'),
			'order' => ''
		),
	);
}
