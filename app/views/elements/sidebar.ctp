<div class="sidebar">
<div class="pad">
<?php
if(is_c('inicio',$this)){
	
}
if(is_c('products',$this) && isset($item) && $item){
	echo $this->element('add2cart',array('data'=>$item));
}

echo $html->div('banners',$this->element('banners'),array('id'=>'banners')), $moo->showcase('banners',array('nav'=>'out'));
?>
</div>
</div>