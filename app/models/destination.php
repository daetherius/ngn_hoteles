<?php
class Destination extends AppModel {
	var $name = 'Destination';
	var $labels = array();
	var $skipValidation = array();
	var $validate = array();

	var $hasOne = array(
		'Hotel'=>array(
			'className'=>'Hotel',
			'dependent'=>true
		)
	);    
}
?>