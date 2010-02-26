<?php
$this->breadcrumbs=array(
	'Disciplinas'=>array('index'),
	'Create',
);
?>
<h1>Create Disciplina</h1>

<ul class="actions">
	<li><?php echo CHtml::link('List Disciplina',array('index')); ?></li>
	<li><?php echo CHtml::link('Manage Disciplina',array('admin')); ?></li>
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>