<div class="tipoBrazaletes form">
<?php echo $this->Form->create('TipoBrazalete'); ?>
	<fieldset>
		<legend><?php echo __('Add Tipo Brazalete'); ?></legend>
	<?php
		echo $this->Form->input('nombre');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Tipo Brazaletes'), array('action' => 'index')); ?></li>
	</ul>
</div>
