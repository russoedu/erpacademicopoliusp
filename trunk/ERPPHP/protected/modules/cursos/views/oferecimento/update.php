<?php
$this->breadcrumbs=array(
	'Oferecimentos'=>array('index'),
	$model->id_oferecimento=>array('view','id'=>$model->id_oferecimento),
	'Update',
);
?>

<h1>Atualizar oferecimento <?php echo $model->id_oferecimento; ?></h1>

<ul class="actions">
	<li><?php echo CHtml::link('List oferecimento',array('index')); ?></li>
	<li><?php echo CHtml::link('Create oferecimento',array('create')); ?></li>
	<li><?php echo CHtml::link('View oferecimento',array('view','id'=>$model->id_oferecimento)); ?></li>
	<li><?php echo CHtml::link('Manage oferecimento',array('admin')); ?></li>
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>