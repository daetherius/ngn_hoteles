<?php
echo
	$this->element('adminhdr',array('links'=>array('back',array('text'=>'Agregar','href'=>false,'class'=>'add','atts'=>array('id'=>'elistAdder'))))),
	$html->div('OrderContainer'),
		$form->create($_m[0],array('url'=>$this->here)),
		$html->tag('p',null,array('id'=>'elist_instructions')),
			$form->submit('Guardar Cambios',array('div'=>false,'class'=>'submitRt')),
			$html->tag('span',' Haga clic en estos botones y arrastre para reordenar la lista.'),
		'</p>',
			$this->element('elist',array(
				'model'=>$with,
				'fields'=>array(
					'id',
					'Hotel.id'=>array('hide'=>1,'edit'=>1,'div'=>'hide','class'=>'hotelId'),
					'Hotel.nombre'=>array('hide'=>0,'edit'=>1,'class'=>'hotelNombre')
				),
				'options'=>array(
					'data'=>@$orderdata,
					'remover'=>'/admin/users/deletehabtm/Hotel/',
					'adder'=>'elistAdder',
					'oncreate'=>'var tmp = newelistitem.getElement(".hotelId").get("id"); new mooSuggest(tmp,tmp.replace("Id","Nombre"),"/hotels/suggest");'
				)
			)),
		$form->end(),
	'</div>';

	$moo->suggest();
	$moo->buffer('$$(".hotelId").each(function(el){
		var tmp = el.get("id");
		new mooSuggest(tmp,tmp.replace("Id","Nombre"),"/hotels/suggest");
	});');
?>