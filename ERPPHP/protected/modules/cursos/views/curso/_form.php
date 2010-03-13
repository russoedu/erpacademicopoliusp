<div class="form">

<?php echo CHtml::beginForm(); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo CHtml::errorSummary($model); ?>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'nome'); ?>
		<?php echo CHtml::activeTextField($model,'nome',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo CHtml::error($model,'nome'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'duracao'); ?>
		<?php echo CHtml::activeTextField($model,'duracao'); ?>
		<?php echo CHtml::error($model,'duracao'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'periodo'); ?>
		<?php echo CHtml::activeTextField($model,'periodo',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo CHtml::error($model,'periodo'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'descricao'); ?>
		<?php echo CHtml::activeTextArea($model,'descricao',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo CHtml::error($model,'descricao'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php echo CHtml::endForm(); ?>

</div><!-- form -->