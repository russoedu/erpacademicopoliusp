<?php
$this->breadcrumbs=array(
	'Emprestimos'=>array('index'),
	'Novo',
);
?>
<h1>Novo Empréstimo - Livro</h1>

<ul class="actions">
	<li><?php echo CHtml::link('List emprestimo',array('index')); ?></li>
	<li><?php echo CHtml::link('Manage emprestimo',array('admin')); ?></li>
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>