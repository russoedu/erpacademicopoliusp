<?php
$this->breadcrumbs=array(
	'Disciplinas'=>array('index'),
	$model->id_disciplina=>array('view','id'=>$model->id_disciplina),
	'Update',
);
?>

<h1>Update disciplina <?php echo $model->id_disciplina; ?></h1>

<ul class="actions">
	<li><?php echo CHtml::link('List disciplina',array('index')); ?></li>
	<li><?php echo CHtml::link('Create disciplina',array('create')); ?></li>
	<li><?php echo CHtml::link('View disciplina',array('view','id'=>$model->id_disciplina)); ?></li>
	<li><?php echo CHtml::link('Manage disciplina',array('admin')); ?></li>
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>