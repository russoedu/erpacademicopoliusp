<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_emprestimo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_emprestimo), array('view', 'id'=>$data->id_emprestimo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_retirada')); ?>:</b>
	<?php echo CHtml::encode($data->data_retirada); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_devolucao')); ?>:</b>
	<?php echo CHtml::encode($data->data_devolucao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_aluno')); ?>:</b>
	<?php echo CHtml::encode($data->id_aluno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_livro')); ?>:</b>
	<?php echo CHtml::encode($data->id_livro); ?>
	<br />


</div>