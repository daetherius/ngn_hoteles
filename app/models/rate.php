<?php
class Rate extends AppModel {
	var $name = 'Rate';
	var $labels = array(
		'inicio'=>'Fecha Inicio',
		'fin'=>'Fecha Fin',
		'plan_alimentos'=>'Plan de Alimentos',
		'cuadruple'=>'Cuádruple',
		'extra'=>'Persona Extra',
		'menor1'=>'Primer Menor',
		'menor2'=>'Segundo Menor',
		'menor3'=>'Tercer Menor',
		'menor1'=>'Primer Menor',
	);
	var $skipValidation = array();
	var $validate = array();

	var $belongsTo = array(
		'Room'=>array(
			'className'=>'Room',
			'counterCache'=>true
		)
	);
}
?>