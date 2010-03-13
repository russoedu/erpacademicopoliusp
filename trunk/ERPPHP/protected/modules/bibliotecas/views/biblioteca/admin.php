<?php
$this->breadcrumbs=array(
	'Bibliotecas'=>array('index'),
	'Manage',
);
?>
<h1>Manage Bibliotecas</h1>

<ul class="actions">
	<li><?php echo CHtml::link('List biblioteca',array('index')); ?></li>
	<li><?php echo CHtml::link('Create biblioteca',array('create')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'id_biblioteca',
		'nome',
		'local',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
