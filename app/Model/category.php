<?php
App::uses('AppModel', 'Model');

class Category extends AppModel{
	// public $actsAs = array('Tree');
	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Tên không được để trống',
		)),
		'slug' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Slug không được trống'
		)),
		'type' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Type không được trống'
		))
	);
} 