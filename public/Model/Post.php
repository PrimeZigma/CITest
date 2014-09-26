<?php
App::uses('AppModel', 'Model');
/**
 * Post Model
 *
 * @property User $User
 */
class Post extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'title' => array(
			'rule' => 'notEmpty',
			'message' => 'Please enter title.'
		),
		'body' => array(
			'rule' => 'notEmpty',
			'message' => 'Please enter body.'
		),
		'category_id' => array(
			'rule' => array('inModelList', 'Category'),
			'message' => 'Please select category.'
		),
		'video_link' => array(
			'rule' => 'notEmpty',
			'message' => 'Please enter video link.'
		)
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
			'foreignKey' => 'user_id'
		),
		'Category' => array(
			'counterCache' => true
		)
	);

	public function inModelList($check, $modelName) {
		$val = array_shift($check);
		$model = ClassRegistry::init($modelName);
		$list = $model->find('list',array('fields'=>array($model->primaryKey)));
		return in_array($val, $list);
	}

	public function isYoutubeLink($check) {
		$val = array_shift($check);
		$rx = '~
		    ^(?:https?://)?              # Optional protocol
		     (?:www\.)?                  # Optional subdomain
		     (?:youtube\.com|youtu\.be)  # Mandatory domain name
		     /watch\?v=([^&]+)           # URI with video id as capture group 1
		     ~x';
     	return preg_match($rx, $val);
	}

	public function getPost ($catId = 0) {
		if($catId == 0)
			return $this->find('all',array('contain'=>array('User','Category')));
		else 
			return $this->find('all',array('conditions'=>array('Post.category_id' => $catId)));
	}

	public function getPostByCategory ($catId) {
		return $this->find('all',array('conditions'=>array('Post.category_id' => $catId)));
	}
}
