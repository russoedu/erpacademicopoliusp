<?php
$this->breadcrumbs=array(
	'Livros'=>array('index'),
	'Novo',
);
?>
<h1>Novo Livro</h1>

<ul class="actions">
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>