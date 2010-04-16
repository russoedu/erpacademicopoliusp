<div class="form">

<?php echo CHtml::beginForm(); ?>

	<p class="note">Campos com <span class="required">*</span> são obrigatórios.</p>

	<?php echo CHtml::errorSummary($model); ?>

	<div class="row">
		<?php echo CHtml::Label('Curso', 'lblCurso'); ?>
		<?php $options = CHtml::listData($cursos, 'id_curso', 'nome');
                      echo CHtml::activeDropDownList($model, 'id_curso', $options); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'ano_inicio'); ?>
		<?php echo CHtml::activeTextField($model,'ano_inicio'); ?>
		<?php echo CHtml::error($model,'ano_inicio'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::Label('Semestre de Início', 'lblSemInicio'); ?>
		<?php $semestres=array(array('value'=>'PRIMEIRO', 'text'=>'PRIMEIRO'),array('value'=>'SEGUNDO', 'text'=>'SEGUNDO'));
                      $options = CHtml::listData($semestres, 'value', 'text');
                      echo CHtml::activeDropDownList($model,'semestre_inicio',$options); ?>
	</div>

        <div class="row">
		<?php echo CHtml::activeLabelEx($model,'status'); ?>
		<?php $status=array(array('value'=>'CURSANDO', 'text'=>'CURSANDO'),array('value'=>'FORMADO', 'text'=>'FORMADO'));
                      $options = CHtml::listData($status, 'value', 'text');
                      echo CHtml::activeDropDownList($model,'status',$options); ?>
	</div>

        <br />
        <p class="note">Preencher somente em caso de curso finalizado.</p>

	<div class="row">
		<?php echo CHtml::Label('Ano de Término', 'lblAnoTermino'); ?>
		<?php echo CHtml::activeTextField($model,'ano_fim'); ?>
		<?php echo CHtml::error($model,'ano_fim'); ?>
	</div>

        <div class="row">
		<?php echo CHtml::Label('Semestre de Término', 'lblSemTermino'); ?>
		<?php $semestres=array(array('value'=>'', 'text'=>''),array('value'=>'PRIMEIRO', 'text'=>'PRIMEIRO'),array('value'=>'SEGUNDO', 'text'=>'SEGUNDO'));
                      $options = CHtml::listData($semestres, 'value', 'text');
                      echo CHtml::activeDropDownList($model,'semestre_fim',$options); ?>
		<?php echo CHtml::error($model,'semestre_fim'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Enviar'); ?>
	</div>

<?php echo CHtml::endForm(); ?>

</div><!-- form -->