<?php
$this->breadcrumbs=array(
	'Emprestimos'=>array('index'),
	$model->ID,
);
?>
<h1>View emprestimo #<?php echo $model->ID; ?></h1>

<ul class="actions">
	<li><?php echo CHtml::link('List emprestimo',array('index')); ?></li>
	<li><?php echo CHtml::link('Create emprestimo',array('create')); ?></li>
	<li><?php echo CHtml::link('Update emprestimo',array('update','id'=>$model->ID)); ?></li>
	<li><?php echo CHtml::linkButton('Delete emprestimo',array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure to delete this item?')); ?></li>
	<li><?php echo CHtml::link('Manage emprestimo',array('admin')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'aluno_id',
		'livro_id',
		'data_emprestimo',
		'data_combinada',
	),
)); ?>
