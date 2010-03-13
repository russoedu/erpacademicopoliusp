<?php
$this->breadcrumbs=array(
	'Cursos'=>array('index'),
	'Manage',
);
?>
<h1>Manage Cursos</h1>

<ul class="actions">
	<li><?php echo CHtml::link('List curso',array('index')); ?></li>
	<li><?php echo CHtml::link('Create curso',array('create')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'id_curso',
		'nome',
		'duracao',
		'periodo',
		'descricao',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
