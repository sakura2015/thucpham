<?php
App::uses('AppModel', 'Model');

class NewsPost extends AppModel{
	
	public $validate = array(
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Title không được để trống',
		)),
		'info' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'info không được trống'
		))
	);
}