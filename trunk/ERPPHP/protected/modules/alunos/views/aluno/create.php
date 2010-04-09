<?php
$this->breadcrumbs=array(
	'Alunos'=>array('index'),
	'Criar ',
);
?>
<h1>Criar Aluno</h1>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>