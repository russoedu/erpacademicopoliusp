<?php
$this->breadcrumbs=array(
	'Horarios'=>array('index'),
	'Create',
);
?>
<h1>Create horario</h1>

<ul class="actions">
	<li><?php echo CHtml::link('List horario',array('index')); ?></li>
	<li><?php echo CHtml::link('Manage horario',array('admin')); ?></li>
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>