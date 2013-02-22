<?php
echo
	$html->div('content'),
	$html->div('pad');

	if(!empty($items)){
		echo $this->element('pages');

		foreach ($items as $item)
			echo $this->element('resultado',compact('item'));

		echo $this->element('pages');
	} else {
		echo $html->para('noresults','No hay resultados que mostrar.');
	}

?>
</div>
</div>
<?php echo $this->element('sidebar'); ?>