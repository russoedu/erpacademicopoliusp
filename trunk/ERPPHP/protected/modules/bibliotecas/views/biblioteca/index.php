<?php
$this->breadcrumbs=array(
        'Bibliotecas',
);
?>

<h1>Listagem de Bibliotecas</h1>

<ul class="actions">
    <?php
    foreach ($actions as $action) {
        echo "<li>";
        echo $action;
        echo "<li/>";
    }
    ?>
</ul>

<?php $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$dataProvider,
        'itemView'=>'_view',
)); ?>
