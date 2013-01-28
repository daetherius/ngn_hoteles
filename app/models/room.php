<?php
class Room extends AppModel {
	var $name = 'Room';
	var $labels = array(
		'tipo_disponibilidad'=>'Tipo Disponibilidad'
	);
	var $skipValidation = array();
	var $validate = array();

	var $belongsTo = array(
		'Hotel'=>array(
			'className'=>'Hotel',
			'counterCache'=>true
		)
	);

	var $hasMany = array(
		'Rates'=>array(
			'className'=>'Rates',
			'dependent'=>true
		)
	);    
}
?>