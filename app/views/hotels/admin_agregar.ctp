<?php
echo
	$this->element('adminhdr',array('links'=>array('back'))),
	$this->element('inputs',array('schema'=>array(
		'destination_id'=>array('div'=>'col col50'),
		'categoria'=>array('div'=>'col col50 omega'),

		'checkin'=>array('div'=>'col col50'),
		'checkout'=>array('div'=>'col col50 omega'),

		'desayuno'=>array('div'=>'col col33'),
		'all_inclusive'=>array('div'=>'col col33 omega'),
	))),
	$this->element('tinymce',array('advanced'=>1,'size'=>'m'));
?>