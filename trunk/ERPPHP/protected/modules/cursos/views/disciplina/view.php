<?php
$this->breadcrumbs=array(
	'Disciplinas'=>array('index'),
	$model->id_disciplina,
);
?>
<h1>View disciplina #<?php echo $model->id_disciplina; ?></h1>

<ul class="actions">
	<li><?php echo CHtml::link('List disciplina',array('index')); ?></li>
	<li><?php echo CHtml::link('Create disciplina',array('create')); ?></li>
	<li><?php echo CHtml::link('Update disciplina',array('update','id'=>$model->id_disciplina)); ?></li>
	<li><?php echo CHtml::linkButton('Delete disciplina',array('submit'=>array('delete','id'=>$model->id_disciplina),'confirm'=>'Are you sure to delete this item?')); ?></li>
	<li><?php echo CHtml::link('Manage disciplina',array('admin')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_disciplina',
		'id_curso',
		'id_professor_responsavel',
		'nome',
		'sigla',
		'creditos_aula',
		'creditos_trabalho',
		'semestre',
		'programa',
	),
)); ?>
