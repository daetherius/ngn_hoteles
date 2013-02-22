<?php
echo
	$this->element('adminhdr',array('links'=>array('back'))),
	$this->element('inputs',array('schema'=>array(
		'hotel_id'=>array('type'=>'hidden','value'=>$this->params['named']['hotel_id'])
	))),
	$this->element('tinymce',array('advanced'=>1,'size'=>'m'));
?>