<?php
$hasimgs = in_array(strtolower($_m[0]).'imgs',array_keys(Configure::read('Modules')));
echo
	$this->element('adminhdr',array(
		'title'=>$_ts.' - '.$nombre_hotel,
		'links'=>array(
			array('text'=>'Regresar','href'=>array('controller'=>'hotels','action'=>'index','admin'=>1),'class'=>'back'),
			'add'
		),
		'filtro'=>false
	)),
	$this->element('pages');
	
	if($items){
	echo
		$form->create('todelete',array('url'=>$this->here,'id'=>'todeleteForm')),
		$form->submit('Eliminar marcados',array('div'=>'deleteSubmit')),
		$html->tag('table',null,array('class'=>'datagrid')),
			$html->tableHeaders(array(
				$paginator->sort('#', 'id'),
				$paginator->sort('Inicio', 'inicio'),
				$paginator->sort('Fin', 'fin'),
				$paginator->sort('Creado', 'created'),
				'Acciones'
			));

			foreach($items as $it){
				$id = $it[$_m[0]]['id'];
				
				echo $html->tableCells(array(array(
					$form->input($id,array('type'=>'checkbox','div'=>'hide','class'=>'delete')).$html->link($id,'javascript:;',array('class'=>'id','id'=>'it'.$id)),
					$util->fdate('%d / %B / %Y',$it[$_m[0]]['inicio']),
					$util->fdate('%d / %B / %Y',$it[$_m[0]]['fin']),
					$util->fdate('s',$it[$_m[0]]['created']),
					array(
						$html->link('Editar',array('action'=>'editar','admin'=>1,$id)).
						$html->link('Eliminar',array('action'=>'eliminar','admin'=>1,$id),null,'¿Seguro que quiere eliminar este elemento?')
					,array('class'=>'actions'))
				)),array('class'=>'odd'));
			}

	echo
		'</table>',
		$form->submit('Eliminar marcados',array('div'=>'deleteSubmit'));
			
	} else echo $html->para('noresults','No hay elementos para mostrar');
	
	if($items)
		$moo->addEvent('todeleteForm','submit','e.stop(); if(confirm("Se eliminarán los elementos seleccionados. ¿Desea continuar?")){ this.submit(); } ');
	$moo->addEvent('.datagrid tr','click','this.removeProperty("style"); this.toggleClass("selected"); this.getElement(".delete").set("checked",!this.getElement(".delete").get("checked"));',array('css'=>1));
	$moo->addEvent('.datagrid a:not(.id)','click','e.stopPropagation();',array('css'=>1));
?>