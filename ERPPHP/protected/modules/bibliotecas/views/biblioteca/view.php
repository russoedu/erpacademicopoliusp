<?php
$this->breadcrumbs=array(
        'Bibliotecas'=>array('index'),
        $model->nome,
);
$is_Admin = Yii::app()->getModule('user')->isAdmin();
?>
<h1>Biblioteca <?php echo $model->nome; ?> </h1>

<ul class="actions">
    <li><?php echo CHtml::link('Listagem de bibliotecas',array('index')); ?></li>
    <li><?php
        if($is_Admin)
            echo CHtml::link('Adicionar livro', array('/bibliotecas/livro/create','bib'=>$model->id_biblioteca));?></li>
    <li><?php echo CHtml::link('Empréstimos', array('/bibliotecas/emprestimo/index','bib'=>$model->id_biblioteca));?></li>

    <li><?php
        if($is_Admin)
            echo CHtml::link('Atualizar biblioteca',array('update','id'=>$model->id_biblioteca)); ?></li>
    <li><?php
        if($is_Admin)
            echo CHtml::linkButton('Deletar biblioteca',array('submit'=>array('delete','id'=>$model->id_biblioteca),'confirm'=>'Tem certeza?')); ?></li>

</ul><!-- actions -->

<?php $this->widget('zii.widgets.CDetailView', array(
        'data'=>$model,
        'attributes'=>array(
                'nome',
                'local',
        ),
)); ?>

<?php
if ($dataProvider->itemCount > 0) {
    $this->widget('zii.widgets.CListView' , array(
            'dataProvider'=>$dataProvider,
            'itemView'=>'_viewLivro',
    ));
}
else
    echo 'Nenhum livro cadastrado na biblioteca';
?>

