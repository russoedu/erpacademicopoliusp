<?php
$this->breadcrumbs=array(
	'Oferecimentos'=>array('index'),
	$model->id_oferecimento=>array('view','id'=>$model->id_oferecimento),
	'Update',
);
?>

<h1>Atualizar <?php echo disciplina::model()->findByPk($model->id_disciplina)->nome . '-' .$model->id_turma; ?></h1>

<ul class="actions">
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model
        , 'professores'=>$professores)); ?>