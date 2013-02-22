<?php
class Blackout extends AppModel {
	var $name = 'Blackout';
	var $labels = array();
	var $skipValidation = array();
	var $validate = array();
	var $displayField = 'inicio';

	var $belongsTo = array(
		'Hotel'=>array(
			'className'=>'Hotel',
			'counterCache'=>true
		)
	);
}
?>