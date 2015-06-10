<?php
App::uses('AppModel', 'Model');
/**
 * Site Model
 *
 * @property Instructor $Instructor
 */
class Site extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'merit_site' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Merit Site is required.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'demerite_site' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Demerite site is required.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'site_image' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Image site is required.',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			/*'extension' => array(
				//'rule' => array('JPG','jpg','PNG','png','GIF','gif'),
				'rule' => array(
						'extension',
			            array('gif', 'jpeg', 'png', 'jpg')
		        	),
				'message' => 'Only jpg, png, and gif file is accepted.',*/
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'update', // Limit validation to 'create' or 'update' operations
			//),
		),
		'site_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Site name is required.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'site_url_display' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Site url is required.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'url' => array(
				'rule' => array('url'),
				'message' => 'Invalid Site URL.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'site_url_link' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Site url is required.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'url' => array(
				'rule' => array('url'),
				'message' => 'Invalid Site URL link.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'admission_fee' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Admission fee is required.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'rate_plan' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Rate plan is required.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'textbook' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Textbook is required.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'lesson_time' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Lesson time is required.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'lowest_price' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Lowest price is required.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'nationality' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Nationality is required.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'group_lesson' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Group lesson is required.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'no_teachers' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'No. of Teacher(s) is/are required.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Invalid input. Only number is accepted.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'duty_system' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Duty system is required.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Instructor' => array(
			'className' => 'Instructor',
			'foreignKey' => 'site_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
