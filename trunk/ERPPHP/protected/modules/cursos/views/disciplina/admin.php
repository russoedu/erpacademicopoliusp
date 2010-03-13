<?php
$this->breadcrumbs=array(
	'Disciplinas'=>array('index'),
	'Manage',
);
?>
<h1>Manage Disciplinas</h1>

<ul class="actions">
	<li><?php echo CHtml::link('List disciplina',array('index')); ?></li>
	<li><?php echo CHtml::link('Create disciplina',array('create')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'id_disciplina',
		'id_curso',
		'id_professor_responsavel',
		'nome',
		'sigla',
		'creditos_aula',
		/*
		'creditos_trabalho',
		'semestre',
		'programa',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
