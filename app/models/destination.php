<?php
class Destination extends AppModel {
	var $name = 'Destination';
	var $labels = array('region_id'=>'Región');
	var $skipValidation = array();
	var $validate = array();

	var $hasMany = array(
		'Hotel'=>array(
			'className'=>'Hotel',
			'dependent'=>true
		)
	);  
	 var $belongsTo = array(
	 	'Region'=>array(
	 		'className'=>'Region',
	 		'counterCache'=>true
	 	)
	 );
}
?>