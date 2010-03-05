<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID), array('view', 'id'=>$data->ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('aluno_id')); ?>:</b>
	<?php echo CHtml::encode($data->aluno_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('livro_id')); ?>:</b>
	<?php echo CHtml::encode($data->livro_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_emprestimo')); ?>:</b>
	<?php echo CHtml::encode($data->data_emprestimo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_combinada')); ?>:</b>
	<?php echo CHtml::encode($data->data_combinada); ?>
	<br />


</div>