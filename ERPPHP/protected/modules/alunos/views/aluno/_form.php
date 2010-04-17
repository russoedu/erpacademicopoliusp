<div class="form">

<?php echo CHtml::beginForm(); ?>

	<p class="note">Campos com <span class="required">*</span> são obrigatórios.</p>

	<?php echo CHtml::errorSummary($model); ?>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'nome'); ?>
		<?php echo CHtml::activeTextField($model,'nome',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo CHtml::error($model,'nome'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'rg'); ?>
		<?php echo CHtml::activeTextField($model,'rg',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo CHtml::error($model,'rg'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'cpf'); ?>
		<?php echo CHtml::activeTextField($model,'cpf',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo CHtml::error($model,'cpf'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'endereco'); ?>
		<?php echo CHtml::activeTextField($model,'endereco',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo CHtml::error($model,'endereco'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'telefone'); ?>
		<?php echo CHtml::activeTextField($model,'telefone',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo CHtml::error($model,'telefone'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'celular'); ?>
		<?php echo CHtml::activeTextField($model,'celular',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo CHtml::error($model,'celular'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'email'); ?>
		<?php echo CHtml::activeTextField($model,'email',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo CHtml::error($model,'email'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Enviar'); ?>
	</div>

<?php echo CHtml::endForm(); ?>

</div><!-- form -->