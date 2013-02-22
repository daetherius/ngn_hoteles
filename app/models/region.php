<?php
class Region extends AppModel {
	var $name = 'Region';
	var $labels = array();
	var $skipValidation = array();
	var $validate = array();
	var $actsAs = array('Tree');

	var $hasMany = array(
		'Destination'=>array(
			'className'=>'Destination',
			'dependent'=>true
		)
	);
}
?>