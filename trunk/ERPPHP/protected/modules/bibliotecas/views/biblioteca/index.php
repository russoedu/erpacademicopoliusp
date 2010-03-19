<?php
$this->breadcrumbs=array(
	'Bibliotecas',
);
?>

<h1>Listagem de bibliotecas</h1>

<ul class="actions">
	<li><?php echo CHtml::link('Criar biblioteca',array('create')); ?></li>
        
</ul><!-- actions -->

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
