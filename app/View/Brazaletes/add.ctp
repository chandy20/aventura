<div class="bracelets form">
    <?php echo $this->Form->create('Brazalete'); ?>
    <fieldset>
        <h1><legend><?php echo __('Crear Pasaportes'); ?></legend></h1>
        <br><br>
        <?php
        echo $this->Form->input('tipo_brazalete_id', array('label' => 'Tipo ', 'options'=>$tipos));
        ?>
        <br>
        <?php
        echo $this->Form->input('cod_barras', array('label' => 'Código '));
        ?>
        <br>
    </fieldset>
    <?php echo $this->Form->end(__('Crear')); ?>
</div>