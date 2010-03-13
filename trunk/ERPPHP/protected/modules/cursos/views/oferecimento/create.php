<?php
$this->breadcrumbs=array(
	'Oferecimentos'=>array('index'),
	'Create',
);
?>
<h1>Create oferecimento</h1>

<ul class="actions">
	<li><?php echo CHtml::link('List oferecimento',array('index')); ?></li>
	<li><?php echo CHtml::link('Manage oferecimento',array('admin')); ?></li>
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>