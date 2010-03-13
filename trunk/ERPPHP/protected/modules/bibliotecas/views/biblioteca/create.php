<?php
$this->breadcrumbs=array(
	'Bibliotecas'=>array('index'),
	'Create',
);
?>
<h1>Create biblioteca</h1>

<ul class="actions">
	<li><?php echo CHtml::link('List biblioteca',array('index')); ?></li>
	<li><?php echo CHtml::link('Manage biblioteca',array('admin')); ?></li>
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>