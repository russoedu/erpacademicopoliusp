<?php
$this->breadcrumbs=array(
	'Alunos'=>array('index'),
	$model->nome=>array('view','id'=>$model->id_aluno),
	'Atualizar Aluno',
);
?>

<h1>Atualizar Aluno</h1>

<ul class="actions">
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>