<?php

App::uses('AppModel', 'Model');

/**
 * Story Model
 *
 * @property User $User
 */
class Story extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public function beforeSave($options = array()) {

		if (isset($this->data[$this->alias]['title'])) {

			$this->data[$this->alias]['title'] = htmlentities(trim($this->data[$this->alias]['title']));

		}

		if (isset($this->data[$this->alias]['text'])) {

			$this->data[$this->alias]['text'] = htmlentities(trim($this->data[$this->alias]['text']));

		}

		return true;

	}

}
