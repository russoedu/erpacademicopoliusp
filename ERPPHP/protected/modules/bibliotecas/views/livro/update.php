<?php
$this->breadcrumbs=array(
	'Bibliotecas'=>array('/bibliotecas/biblioteca/index'),
        $biblioteca->nome=>array('/bibliotecas/biblioteca/view' , 'id'=>$biblioteca->ID),
	$model->nome,
	'Editar',
);
?>

<h1>Editar Livro <?php echo $model->nome; ?></h1>
<?php /*
<ul class="actions">
	<li><?php echo CHtml::link('List Livro',array('index')); ?></li>
	<li><?php echo CHtml::link('Create Livro',array('create')); ?></li>
	<li><?php echo CHtml::link('View Livro',array('view','id'=>$model->ID)); ?></li>
	<li><?php echo CHtml::link('Manage Livro',array('admin')); ?></li>
</ul><!-- actions -->
*/?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>