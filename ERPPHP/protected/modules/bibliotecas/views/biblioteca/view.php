<?php
$this->breadcrumbs=array(
        'Bibliotecas'=>array('index'),
        $model->nome,
);
?>

<h1>Biblioteca: <?php echo $model->nome; ?></h1>

<ul class="actions">
   <?php
    foreach ($actions as $action){
        echo "<li>";
        echo $action;
        echo "<li/>";
    }
   ?>

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

