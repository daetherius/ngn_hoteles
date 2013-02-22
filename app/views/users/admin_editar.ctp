<?php
echo
	$this->element('adminhdr',array('links'=>array('back'))),
	$this->element('inputs',array(
		'schema'=>array(
			'nombre'=>array('div'=>'col col50'),
			'apellidos'=>array('div'=>'col col50'),
			'password'=>array('div'=>'col col50','afterof'=>'activo'),
			'passwordc'=>array(
				'div'=>'col col50 required',
				'afterof'=>'activo',
				'type'=>'password',
				'label'=>'Repetir Contraseña:'
			),
			'agencia'=>array('div'=>'col col25'),
			'telefono'=>array('div'=>'col col25'),
			'extension'=>array('div'=>'col col25'),
			'celular'=>array('div'=>'col col25'),
			'activo'=>array(),
			$html->div('label fail','Esta parte es opcional. Escriba una contraseña nueva para cambiarla.')
		)
	));
?>