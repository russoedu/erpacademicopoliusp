<?php
$this->breadcrumbs=array(
	'Disciplinas'=>array('index'),
	'Manage',
);
?>
<h1>Manage Disciplinas</h1>

<ul class="actions">
	<li><?php echo CHtml::link('List Disciplina',array('index')); ?></li>
	<li><?php echo CHtml::link('Create Disciplina',array('create')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'ID',
		'nome',
		'sigla',
		'ementa',
		'professoresResponsaveis',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
