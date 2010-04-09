<?php
$this->breadcrumbs=array(
	'Oferecimentos'=>array('index'),
	'Novo oferecimento',
);
?>
<h1>Create oferecimento</h1>

<ul class="actions">
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model,
        'professores'=>$professores)); ?>