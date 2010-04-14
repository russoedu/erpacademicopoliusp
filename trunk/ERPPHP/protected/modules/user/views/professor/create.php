<?php
$this->breadcrumbs=array(
	'Professors'=>array('index'),
	'Create',
);
?>
<h1>Create professor</h1>

<ul class="actions">
	<li><?php echo CHtml::link('Listar professores',array('index')); ?></li>
	<li><?php echo CHtml::link('Gerenciar professores',array('admin')); ?></li>
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>