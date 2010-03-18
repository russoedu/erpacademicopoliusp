<?php
$this->breadcrumbs=array(
	'Emprestimos'=>array('index'),
	$model->id_emprestimo=>array('view','id'=>$model->id_emprestimo),
	'Update',
);
?>

<h1>Update emprestimo <?php echo $model->id_emprestimo; ?></h1>

<ul class="actions">
	<li><?php echo CHtml::link('List emprestimo',array('index')); ?></li>
	<li><?php echo CHtml::link('Create emprestimo',array('create')); ?></li>
	<li><?php echo CHtml::link('View emprestimo',array('view','id'=>$model->id_emprestimo)); ?></li>
	<li><?php echo CHtml::link('Manage emprestimo',array('admin')); ?></li>
</ul><!-- actions -->

<?php echo $this->renderPartial('_formRenovacao', array('model'=>$model, 'aluno'=>$aluno)); ?>