<div class="tipoBrazaletes form" align="center">
    <?php echo $this->Form->create('TipoBrazalete'); ?>
    <fieldset>
        <h1><legend><?php echo __('Crear Tipo de Pasaporte '); ?></legend></h1>
        <br><br>
        <?php
        echo $this->Form->input('nombre', array('label' => 'Nombre ', 'required'));
        ?>
        <br>
    </fieldset>
    <?php echo $this->Form->end(__('Crear')); ?>
</div>
