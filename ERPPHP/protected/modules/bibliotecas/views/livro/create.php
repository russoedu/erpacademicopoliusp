<?php
$this->breadcrumbs=array(
	'Bibliotecas'=>array('/bibliotecas/biblioteca/index'),
    $biblioteca->nome=>array('/bibliotecas/biblioteca/view' , 'id'=>$biblioteca->id_biblioteca),
	'Novo Livro',
);
?>
<h1>Novo Livro</h1>

<ul class="actions">
	<!-- <li><?php echo CHtml::link('List livro',array('index')); ?></li> -->
	<!-- <li><?php echo CHtml::link('Manage livro',array('admin')); ?></li> -->
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>