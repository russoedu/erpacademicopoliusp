<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_livro')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_livro), array('view', 'id'=>$data->id_livro)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_biblioteca')); ?>:</b>
	<?php echo CHtml::encode($data->id_biblioteca); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isbn')); ?>:</b>
	<?php echo CHtml::encode($data->isbn); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('exemplar')); ?>:</b>
	<?php echo CHtml::encode($data->exemplar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('autor')); ?>:</b>
	<?php echo CHtml::encode($data->autor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('editora')); ?>:</b>
	<?php echo CHtml::encode($data->editora); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ano')); ?>:</b>
	<?php echo CHtml::encode($data->ano); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('edicao')); ?>:</b>
	<?php echo CHtml::encode($data->edicao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('local')); ?>:</b>
	<?php echo CHtml::encode($data->local); ?>
	<br />

	*/ ?>

</div>