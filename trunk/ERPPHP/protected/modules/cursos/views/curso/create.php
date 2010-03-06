<?php
$this->breadcrumbs=array(
	'Cursos'=>array('index'),
	'Create',
);
?>
<h1>Create curso</h1>

<ul class="actions">
	<li><?php echo CHtml::link('List curso',array('index')); ?></li>
	<li><?php echo CHtml::link('Manage curso',array('admin')); ?></li>
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>