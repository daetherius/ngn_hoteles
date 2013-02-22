<?php
class Hotel extends AppModel {
	var $name = 'Hotel';
	var $labels = array(
		'destination_id'=>'Destino',
		'tipo_disponibilidad'=>'Tipo de Disponibilidad',
		'src'=>'Logo',
		'all_inclusive'=>'Todo incluído',
		'permite_menores'=>'Incluye menores',
		'edad_max_menor'=>'Edad máxima del menor'
	);
	var $actsAs = array('ExtendAssociations','File' => array('portada'=>false));
	var $skipValidation = array();
	var $validate = array();
	var $hasAndBelongsToMany = array('User');

	var $belongsTo = array(
		'Destination'=>array(
			'className'=>'Destination',
			'counterCache'=>true
		)
	);

	var $hasMany = array(
		'Blackout'=>array(
			'className'=>'Blackout',
			'dependent'=>true
		),
		'Hotelimg'=>array(
			'className'=>'Hotelimg',
			'dependent'=>true
		),
		'Room'=>array(
			'className'=>'Room',
			'dependent'=>true
		)
	);    
}
?>