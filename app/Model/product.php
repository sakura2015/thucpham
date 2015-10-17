<?php
App::uses('AppModel', 'Model');

class Product extends AppModel{
	
	public $validate = array(
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Title không được để trống',
		)),
		'slug' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'slug không được trống'
		)),
		'image' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'image không được trống'
		)),
		'info' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'info không được trống'
		)),
		'price' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'price không được trống'
		)),
		'quantity' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'quantity không được trống'
		)),
		'status' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'status không được trống'
		))
	);
}