<div class="form">

<?php echo CHtml::beginForm(); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo CHtml::errorSummary($model); ?>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'firstName'); ?>
		<?php echo CHtml::activeTextField($model,'firstName',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo CHtml::error($model,'firstName'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'lastName'); ?>
		<?php echo CHtml::activeTextField($model,'lastName',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo CHtml::error($model,'lastName'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'email'); ?>
		<?php echo CHtml::activeTextField($model,'email',array('size'=>60,'maxlength'=>70)); ?>
		<?php echo CHtml::error($model,'email'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php echo CHtml::endForm(); ?>

</div><!-- form -->