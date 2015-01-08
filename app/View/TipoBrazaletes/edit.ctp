<div class="tipoBrazaletes form">
    <?php echo $this->Form->create('TipoBrazalete'); ?>
    <fieldset>
        <h1><legend><?php echo __('Editar Tipo de Pasaporte'); ?></legend></h1>
        <br><br>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('nombre', array('label'=>'Nombre del pasaporte '));
        ?>
        <br>
    </fieldset>
    <?php echo $this->Form->end(__('Editar')); ?>
</div>

