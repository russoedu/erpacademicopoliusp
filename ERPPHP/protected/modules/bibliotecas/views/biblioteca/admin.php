<?php
$this->breadcrumbs=array(
	'Bibliotecas'=>array('index'),
	'Manage',
);
?>
<h1>Manage Bibliotecas</h1>

<ul class="actions">
	<li><?php echo CHtml::link('List Biblioteca',array('index')); ?></li>
	<li><?php echo CHtml::link('Create Biblioteca',array('create')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'ID',
		'nome',
		'local',
		'bibliotecario',
		'outros',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
