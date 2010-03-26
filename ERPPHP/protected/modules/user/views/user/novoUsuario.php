<?php

$this->breadcrumbs=array(
        'Usuários'=>array('admin'),
        'Novo Usuário',
);
?>


<h1>Novo Usuário</h1>


<?php echo $this->renderPartial('_formUsuario',
        array('form'=>$model,
            'profile'=>$profile,
            'group'=>$group)); ?>