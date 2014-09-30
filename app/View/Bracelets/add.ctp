<div class="bracelets form">
<?php echo $this->Form->create('Bracelet'); ?>
	<fieldset>
		<legend><?php echo __('Add Bracelet'); ?></legend>
	<?php
		echo $this->Form->input('date');
		echo $this->Form->input('cod_barras');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Bracelets'), array('action' => 'index')); ?></li>
	</ul>
</div>
