<div class="view">

        <b><?php echo CHtml::encode($data->getAttributeLabel('id_livro')); ?>:</b>
	<?php echo CHtml::encode($data->id_livro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_retirada')); ?>:</b>
	<?php $data_retirada = date("d/m/Y",strtotime($data->data_retirada));
            echo CHtml::encode($data_retirada); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_devolucao')); ?>:</b>
	<?php $data_devolucao = date("d/m/Y",strtotime($data->data_devolucao));
            echo CHtml::encode($data_devolucao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_aluno')); ?>:</b>
	<?php echo CHtml::encode($sortableAttributes->nome_aluno); ?>
	<br />
</div>