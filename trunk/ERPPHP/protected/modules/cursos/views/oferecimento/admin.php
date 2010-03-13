<?php
$this->breadcrumbs=array(
	'Oferecimentos'=>array('index'),
	'Manage',
);
?>
<h1>Manage Oferecimentos</h1>

<ul class="actions">
	<li><?php echo CHtml::link('List oferecimento',array('index')); ?></li>
	<li><?php echo CHtml::link('Create oferecimento',array('create')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'id_oferecimento',
		'id_disciplina',
		'id_professor',
		'id_turma',
		'id_sala',
		'data_inicio',
		/*
		'data_fim',
		'vagas',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
