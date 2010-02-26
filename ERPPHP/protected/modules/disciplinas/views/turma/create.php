<?php
$this->breadcrumbs=array(
	'Turmas'=>array('index'),
	'Create',
);
?>
<h1>Create Turma</h1>

<ul class="actions">
	<li><?php echo CHtml::link('List Turma',array('index')); ?></li>
	<li><?php echo CHtml::link('Manage Turma',array('admin')); ?></li>
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>