<?php
$this->breadcrumbs=array(
	'Livros'=>array('index'),
	$model->ID,
);
?>
<h1>View Livro #<?php echo $model->ID; ?></h1>

<ul class="actions">
	<li><?php echo CHtml::link('List Livro',array('index')); ?></li>
	<li><?php echo CHtml::link('Create Livro',array('create')); ?></li>
	<li><?php echo CHtml::link('Update Livro',array('update','id'=>$model->ID)); ?></li>
	<li><?php echo CHtml::linkButton('Delete Livro',array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure to delete this item?')); ?></li>
	<li><?php echo CHtml::link('Manage Livro',array('admin')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'nome',
		'autor',
		'ISDN',
		'numClassfica',
		'editor',
		'ano',
		'local',
		'biblioteca_id',
	),
)); ?>
