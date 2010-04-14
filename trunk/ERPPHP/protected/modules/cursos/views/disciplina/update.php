<?php
$this->breadcrumbs=array(
	'Disciplinas'=>array('index'),
	$model->nome=>array('view','id'=>$model->id_disciplina),
	'Atualizar',
);
?>

<h1>Atualizar disciplina <?php echo $model->nome; ?></h1>

<ul class="actions">
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model, 'cursos'=>$cursos
        ,'professores'=>$professores)); ?>
