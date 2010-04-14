<?php
$this->breadcrumbs=array(
	'Horarios'=>array('index'),
	'Manage',
);
?>
<h1>Manage Horarios</h1>

<ul class="actions">
	<li><?php echo CHtml::link('List horario',array('index')); ?></li>
	<li><?php echo CHtml::link('Create horario',array('create')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'id_horario',
		'id_oferecimento',
		'dia',
		'horario_inicio',
		'horario_fim',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
