<?php
$this->breadcrumbs=array(
	'Bibliotecarios'=>array('index'),
	'Create',
);
?>
<h1>Create bibliotecario</h1>

<ul class="actions">
	<li><?php echo CHtml::link('List bibliotecario',array('index')); ?></li>
	<li><?php echo CHtml::link('Manage bibliotecario',array('admin')); ?></li>
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>