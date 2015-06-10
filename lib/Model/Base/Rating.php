<?php
App::uses('AppModel', 'Model');
/**
 * Rating Model
 *
 * @property Instructor $Instructor
 * @property User $User
 */
class Rating extends AppModel {
//var $useTable = 'sites';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Instructor' => array(
			'className' => 'Instructor',
			'foreignKey' => 'Instructor_id',
			'conditions' => '',
			'fields' => array('id', 'e_name'),
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
