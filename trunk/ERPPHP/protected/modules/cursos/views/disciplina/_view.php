<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('nome')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->nome), array('view', 'id'=>$data->id_disciplina)); ?>
	<br />

	<b>Nome do Curso:</b>
	<?php echo CHtml::encode(curso::model()->findByPk($data->id_curso)->nome);?>
	<br />

	<b><?php echo 'Professor Responsável'; ?>:</b>
	<?php echo 'TODO'; ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('sigla')); ?>:</b>
	<?php echo CHtml::encode($data->sigla); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creditos_aula')); ?>:</b>
	<?php echo CHtml::encode($data->creditos_aula); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creditos_trabalho')); ?>:</b>
	<?php echo CHtml::encode($data->creditos_trabalho); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('semestre')); ?>:</b>
	<?php echo CHtml::encode($data->semestre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('programa')); ?>:</b>
	<?php echo CHtml::encode($data->programa); ?>
	<br />

	*/ ?>

</div>
