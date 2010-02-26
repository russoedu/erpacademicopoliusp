<?php
$this->breadcrumbs=array(
	'Bibliotecas'=>array('index'),
	'Create',
);
?>
<h1>Create Biblioteca</h1>

<ul class="actions">
	<li><?php echo CHtml::link('List Biblioteca',array('index')); ?></li>
	<li><?php echo CHtml::link('Manage Biblioteca',array('admin')); ?></li>
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>