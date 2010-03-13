<?php
$this->breadcrumbs=array(
	'Emprestimos'=>array('index'),
	$model->id_emprestimo,
);
?>
<h1>View emprestimo #<?php echo $model->id_emprestimo; ?></h1>

<ul class="actions">
	<li><?php echo CHtml::link('List emprestimo',array('index')); ?></li>
	<li><?php echo CHtml::link('Create emprestimo',array('create')); ?></li>
	<li><?php echo CHtml::link('Update emprestimo',array('update','id'=>$model->id_emprestimo)); ?></li>
	<li><?php echo CHtml::linkButton('Delete emprestimo',array('submit'=>array('delete','id'=>$model->id_emprestimo),'confirm'=>'Are you sure to delete this item?')); ?></li>
	<li><?php echo CHtml::link('Manage emprestimo',array('admin')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_emprestimo',
		'data_retirada',
		'data_devolucao',
		'id_aluno',
		'id_livro',
	),
)); ?>
