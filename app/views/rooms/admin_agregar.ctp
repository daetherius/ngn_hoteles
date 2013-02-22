<?php
echo
	$this->element('adminhdr',array('links'=>array('back'))),
	$this->element('inputs',array('schema'=>array(
		'hotel_id'=>array('type'=>'hidden','value'=>$this->params['named']['hotel_id']),
		'disponibilidad'=>array('default'=>0)
	))),
	$this->element('tinymce',array('advanced'=>1,'size'=>'m'));
	$script = '
		if($("RoomTipoDisponibilidad").value == "Allotment"){
			$("RoomDisponibilidad").set("disabled","");
		} else {
			$("RoomDisponibilidad").set("value","0").set("disabled","disabled");
		}';

	$moo->buffer($script);
	$moo->addEvent('RoomTipoDisponibilidad','click',$script);	
?>