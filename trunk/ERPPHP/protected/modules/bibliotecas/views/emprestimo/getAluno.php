<?php
//$this->breadcrumbs=array(
//	'Emprestimos'=>array('index'),
//	'Create',
//);
?>

<h1>Procurar Aluno</h1>

<?php echo $this->renderPartial('_procurarAluno', array('aluno'=>$aluno, 'livro'=>$livro));?>
