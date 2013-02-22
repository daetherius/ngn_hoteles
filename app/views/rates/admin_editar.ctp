<?php
echo
	$this->element('adminhdr',array('links'=>array('back'))),
	$this->element('inputs',array('schema'=>array(
		'room_id'=>array('type'=>'hidden','value'=>$this->params['named']['room_id']),
		'inicio'=>array('div'=>'col col50'),
		'fin'=>array('div'=>'col col50'),
		'sencilla'=>array('div'=>'col col16'),
		'doble'=>array('div'=>'col col16'),
		'triple'=>array('div'=>'col col16'),
		'cuadruple'=>array('div'=>'col col16'),
		'extra'=>array('div'=>'col col16 omega'),
		'menor1'=>array('div'=>'col col25'),
		'menor2'=>array('div'=>'col col25'),
		'menor3'=>array('div'=>'col col25'),
	))),
	$this->element('tinymce',array('advanced'=>1,'size'=>'m'));
?>