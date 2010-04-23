<div class="form">

    <?php echo CHtml::beginForm(); ?>

    <p class="note">Campos com <span class="required">*</span> são obrigatórios.</p>

    <?php echo CHtml::errorSummary($model); ?>


    <div class="row">
        <?php echo CHtml::activeLabelEx($model,'id_professor'); ?>
        <?php echo CHtml::activeDropDownList($model, 'id_professor', $professores); ?>
        <?php echo CHtml::error($model,'id_professor'); ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabelEx($model,'id_turma'); ?>
        <?php echo CHtml::activeTextField($model,'id_turma'); ?>
        <?php echo CHtml::error($model,'id_turma'); ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabelEx($model,'id_sala'); ?>
        <?php 
            if($model->isNewRecord){
                echo CHtml::activeDropDownList($model, 'id_sala', $salas);
                }
            else{
                echo $salas[$model->id_sala];
            }
        ?>
        <?php echo CHtml::error($model,'id_sala'); ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabelEx($model,'data_inicio'); ?>
        <?php $model->data_inicio=date('Y/m/d');
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'id'=>'dpDataInicio',
                'model'=>$model,
                'attribute'=>'data_inicio',
                'language'=>'pt-br',
                'options'=>array(
                        'showAnim'=>'fold',
                ),
                'htmlOptions'=>array(
                        'style'=>'height:20px;'
                ),
                )
        );
        ?>
        <?php echo CHtml::error($model,'data_inicio'); ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabelEx($model,'data_fim'); ?>
        <?php $today = date("Y-m-d");// current date
        $model->data_fim = date("Y/m/d",strtotime(date("Y-m-d", strtotime($today)) . " +6 months"));
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'id'=>'dpDataFim',
                'model'=>$model,
                'attribute'=>'data_fim',
                'language'=>'pt-br',
                'options'=>array(
                        'showAnim'=>'fold',
                ),
                'htmlOptions'=>array(
                        'style'=>'height:20px;'
                ),
                )
        );
        ?>


        <?php echo CHtml::error($model,'data_fim'); ?>
    </div>

    <div class="row">
        <?php echo '<b>Dia da semana<b/><br/>';?>
        <?php
        $dias = array(
                'SEGUNDA'=>'Segunda-feira',
                'TERÇA'=>'Terça-feira',
                'QUARTA'=>'Quarta-feira',
                'QUINTA'=>'Quinta-feira',
                'SEXTA'=>'Sexta-feira',
        );
        if ($model->isnewRecord) {
            $selected = 'SEGUNDA';
            if(isset($diaSemana)) {
                $selected = $diaSemana;
            }
            echo CHtml::dropDownList('dia_semana', $selected,
            $dias);
        }else {
            echo $dias[$diaSemana];
        }
        ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabelEx($model,'vagas'); ?>
        <?php echo CHtml::activeTextField($model,'vagas'); ?>
        <?php echo CHtml::error($model,'vagas'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Criar' : 'Salvar'); ?>
    </div>

    <?php echo CHtml::endForm(); ?>

</div><!-- form -->