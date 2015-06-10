<?php
App::uses('AuthComponent', 'Controller/Component');
/**
 * Site Model
 *
 * @property Instructor $Instructor
 */
class User extends AppModel {

public $validate = array(
			'name' => array(
				'nonEmpty' => array(
					'rule' => array('notEmpty'),
					'message' => 'Name is required.',
					'allowEmpty' => false
				)
			),
			'username' => array(
				'nonEmpty' => array(
					'rule' => array('notEmpty'),
					'message' => 'Username is required.',
					'allowEmpty' => false
				),
				'between' => array(
					'rule' => array('between',5,15),
					'required' => true,
					'message' => 'Username must be between 5 to 15 characters.'
				),
				'unique' => array(
					'rule' => array('isUniqueUsername'),
					'message' => 'This username is already in use.'
				)
			),
			'password' => array(
	            'required' => array(
	                'rule' => array('notEmpty'),
	                'message' => 'A password is required'
	            ),
	            'min_length' => array(
	                'rule' => array('minLength', '6'),  
	                'message' => 'Password must have a mimimum of 6 characters'
	            )
	        ),
	        'password_confirm' => array(
	        	'required' => array(
					'rule' => array('notEmpty'),
					'message' => 'Pleas confirm your password.'
				),
				'equaltofield' => array(
					'rule' => array('equaltofield','password'),
					'message' => 'Both password must match.'
				)
	        ),
	        'email' => array(
				'required' => array(
					'rule' => array('email', true),
					'message' => 'Please provide a valid email address.'
				), 
				'unique' => array(
					'rule' => array('isUniqueEmail'),
					'message' => 'This email is already in use.'
				)
			),
			/*'role' => array(
	            'valid' => array(
	                'rule' => array('inList', array('admin', 'user')),
	                'message' => 'Please enter a valid role',
	                'allowEmpty' => false
	            )
	        ),*/
         
         
        'password_update' => array(
            'min_length' => array(
                'rule' => array('minLength', '6'),   
                'message' => 'Password must have a mimimum of 6 characters',
                'allowEmpty' => true,
                'required' => false
            )
        ),
        'password_confirm_update' => array(
             'equaltofield' => array(
                'rule' => array('equaltofield','password_update'),
                'message' => 'Both passwords must match.',
                'required' => false,
            )
        )
 
         
    );
	/**
     * Before isUniqueUsername
     * @param array $options
     * @return boolean
     */

	function isUniqueUsername($check){
		$username = $this->find(
            'first',
            array(
                'fields' => array(
                    'User.id',
                    'User.username'
                ),
                'conditions' => array(
                    'User.username' => $check['username']
                )
            )
        );
 
        if(!empty($username)){
            if(isset($this->data[$this->alias]['id']) AND isset($username['User']['id']) AND $this->data[$this->alias]['id'] == $username['User']['id']){
                return true;
            }else{
                return false;
            }
        }else{
            return true;
        }
	}

	/**
     * Before isUniqueEmail
     * @param array $options
     * @return boolean
     */
	function isUniqueEmail($check){
		$email = $this->find(
            'first',
            array(
                'fields' => array(
                    'User.id'
                ),
                'conditions' => array(
                    'User.email' => $check['email']
                )
            )
        );
 
        if(!empty($email)){
            if(isset($this->data[$this->alias]['id']) AND $this->data[$this->alias]['id'] == $email['User']['id']){
                return true;
            }else{
                return false;
            }
        }else{
            return true;
        }
	}

	public function equaltofield($check, $otherfield){
		//get name of the field
		$fname = '';
		foreach ($check as $key => $value) {
			$fname = $key;
			break;
		}
		return $this->data[$this->name][$otherfield] === $this->data[$this->name][$fname];
	}

	function equalToCurrentPassword($check) {
 
        $user = $this->find(
            'first',
            array(
                'fields' => array(
                    'User.password'
                ),
                'conditions' => array(
                    'User.id' => $this->data[$this->alias]['id']
                )
            )
        );

        if(!empty($user)){
            if(AuthComponent::password($check['password_current']) != $user['User']['password']){
                return false;
            }else{
                return true;
            }
        }else{
            return false;
        }

    }

	/**
     * Before Save
     * @param array $options
     * @return boolean
     */
	public function beforeSave($options = array()) {
	   // hash our password
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
         
        // if we get a new password, hash it
        if (isset($this->data[$this->alias]['password_update']) && !empty($this->data[$this->alias]['password_update'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password_update']);
        }
     
        // fallback to our parent
        return parent::beforeSave($options);
    }
}
?>