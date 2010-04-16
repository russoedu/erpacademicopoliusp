<?php
$this->breadcrumbs=array(
	'Alunos'=>array('index'),
	'Criar Aluno',
);
?>
<h1>Criar Aluno</h1>

<ul class="actions">
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>