<?php
$this->breadcrumbs=array(
	'Alunos'=>array('/alunos/aluno/index'),
	$aluno->nome=>array('/alunos/aluno/view','id'=>$aluno->id_aluno),
	'Atualização de Matrícula Aluno',
);
?>
<h1>Atualização de Matrícula</h1>

<?php echo $this->renderPartial('_formMatricula', array('model'=>$model,'cursos'=>$cursos)); ?>