<?php
$this->breadcrumbs=array(
	'Disciplinas'=>array('index'),
	$model->ID,
);
?>
<h1>View disciplina #<?php echo $model->ID; ?></h1>

<ul class="actions">
	<li><?php echo CHtml::link('List disciplina',array('index')); ?></li>
	<li><?php echo CHtml::link('Create disciplina',array('create')); ?></li>
	<li><?php echo CHtml::link('Update disciplina',array('update','id'=>$model->ID)); ?></li>
	<li><?php echo CHtml::linkButton('Delete disciplina',array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure to delete this item?')); ?></li>
	<li><?php echo CHtml::link('Manage disciplina',array('admin')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'nome',
		'sigla',
		'ementa',
		'professoresResponsaveis',
	),
)); ?>
