<div class="bracelets form">
    <?php echo $this->Form->create('Brazalete'); ?>
    <fieldset>
        <h1><legend><?php echo __('Crear Pasaportes'); ?></legend></h1>
        <br><br>
        <?php
        echo $this->Form->input('tipo_brazalete_id', array('label' => 'Tipo ', "empty" => "Seleccione un tipo", 'options'=>$tipos, 'required'));
        ?>
        <br>
        <?php
        echo $this->Form->input('cod_barras_inicio', array('label' => 'Código inicial ', 'required'));
        ?>
        <br>
        <?php
        echo $this->Form->input('cod_barras_fin', array('label' => 'Código final ', 'required'));
        ?>
        <br>
    </fieldset>
    <?php echo $this->Form->end(__('Crear')); ?>
</div>