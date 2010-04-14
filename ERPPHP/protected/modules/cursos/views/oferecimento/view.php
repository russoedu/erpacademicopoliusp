<?php
$this->breadcrumbs=array(
	'Oferecimentos'=>array('index'),
	$model->id_oferecimento,
);
?>
<h1>Oferecimento <?php echo $model->id_oferecimento; ?></h1>

<ul class="actions">
	<li><?php echo CHtml::link('List oferecimento',array('index')); ?></li>
	<li><?php echo CHtml::link('Create oferecimento',array('create')); ?></li>
	<li><?php echo CHtml::link('Update oferecimento',array('update','id'=>$model->id_oferecimento)); ?></li>
	<li><?php echo CHtml::linkButton('Delete oferecimento',array('submit'=>array('delete','id'=>$model->id_oferecimento),'confirm'=>'Are you sure to delete this item?')); ?></li>
	<li><?php echo CHtml::link('Manage oferecimento',array('admin')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_oferecimento',
		'id_disciplina',
		'id_professor',
		'id_turma',
		'id_sala',
		'data_inicio',
		'data_fim',
		'vagas',
	),
)); ?>
