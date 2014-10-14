<div class="users form">
    <?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Add User'); ?></legend>
        <?php
        echo $this->Form->input('usuario');
        echo $this->Form->input('password');
        echo $this->Form->input('nombres');
        echo $this->Form->input('apellidos');
        echo $this->Form->input('documento');
        echo $this->Form->input('telefono');
        echo $this->Form->input('direccion');
        echo $this->Form->input('cargo');
        echo $this->Form->input('group_id', array(
            "div" => array(
                "class" => "controls"
            ),
            'label' => 'Grupo',
            "options" => $group_id,
            "empty" => "Seleccione un Grupo"
        ));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
    </ul>
</div>
