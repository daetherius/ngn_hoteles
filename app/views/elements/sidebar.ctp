<div class="sidebar">
<div class="pad">
<?php
	echo
		$form->create(null,array('url'=>$this->here,'id'=>'buscador')),
			$form->input('destination_id',array('label'=>'Destino')),
			$form->input('nombre',array('label'=>'Hotel')),
			$form->input('categoria',array(
				'label'=>'Categoría',
				'empty'=>'[Todos]',
				'options'=>Configure::read('Site.categorias')
			)),
			$form->input('inicio',array('label'=>'Fecha de Entrada','dateFormat'=>'DMY','type'=>'date')),
			$form->input('alimentos',array(
				'label'=>'Plan de Alimentos',
				'empty'=>'[Todos]',
				'options'=>Configure::read('Site.alimentos')
			)),
		$form->end('Buscar');
?>
</div>
</div>