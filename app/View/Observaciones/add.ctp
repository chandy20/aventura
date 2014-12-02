<div class="observaciones form" align="center">
    <?php echo $this->Form->create('Observacione'); ?>
    <fieldset>
        <h1><legend><?php echo __('Crear Observación'); ?></legend></h1>
        <br>
        <br>
        <?php
        echo $this->Form->input('observacion');
        ?>
        <br>
        <?php
        echo $this->Form->input('fecha');
        ?>
        <br>
    </fieldset>
    <?php echo $this->Form->end(__('Crear')); ?>
</div>
