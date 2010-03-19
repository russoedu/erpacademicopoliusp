<?php
$this->breadcrumbs=array(
	'Disciplinas'=>array('index'),
	'Create',
);
?>
<h1>Create disciplina</h1>

<ul class="actions">
	<li><?php echo CHtml::link('List disciplina',array('index')); ?></li>
	<li><?php echo CHtml::link('Manage disciplina',array('admin')); ?></li>
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model, 'cursos'=>$cursos)); ?>
