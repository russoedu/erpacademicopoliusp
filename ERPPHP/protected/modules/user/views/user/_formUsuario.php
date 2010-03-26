<div class="form">
    <?php echo CHtml::beginForm(); ?>

    <p class="note"><?php echo 'Campos com <span class="required">*</span> são obrigatórios.'; ?></p>



    <?php echo CHtml::errorSummary($form); ?>
    <?php echo CHtml::errorSummary($profile); ?>

    <div class="row">
        <?php echo CHtml::activeLabelEx($form,'Login'); ?>
        <?php echo CHtml::activeTextField($form,'username'); ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabelEx($form,'Senha'); ?>
        <?php echo CHtml::activePasswordField($form,'password'); ?>
        <p class="hint">
            <?php echo UserModule::t("Mínimo de 4 caracteres."); ?>
        </p>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabelEx($form,'Repetir senha'); ?>
        <?php echo CHtml::activePasswordField($form,'verifyPassword'); ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabelEx($form,'email'); ?>
        <?php echo CHtml::activeTextField($form,'email'); ?>
    </div>

    <?php
    $profileFields=ProfileField::model()->forRegistration()->sort()->findAll();
    if ($profileFields) {
        foreach($profileFields as $field) {
            ?>
    <div class="row">
                <?php echo CHtml::activeLabelEx($profile,$field->varname); ?>
                <?php
                if ($field->field_type=="TEXT") {
                    echo CHtml::activeTextArea($profile,$field->varname,array('rows'=>6, 'cols'=>50));
                } else {
                    echo CHtml::activeTextField($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255)));
                }
                ?>
                <?php echo CHtml::error($profile,$field->varname); ?>
    </div>
            <?php
        }
    }
    ?>

    <div class ="row">
        <?php echo CHtml::label('Tipo de usuário', 'group')?>
        <?php
        $selected = 'a';
        if(isset ($group)){
            $selected = $group;
        }
        echo CHtml::dropDownList('group', $selected,
                array('a'=>'Administrador',
                    'p'=>'Professor',
                    'b'=>'Bibliotecario',
                    )
                   
                );
                ?>

    </div>

    <div class="row">
        <?php echo CHtml::label('Id ','id') ?>
        <?php echo Chtml::textField('id') ?>
    </div>

    <div class="row submit">
        <?php echo CHtml::submitButton('Criar novo usuário'); ?>
    </div>

    <?php echo CHtml::endForm(); ?>


</div>