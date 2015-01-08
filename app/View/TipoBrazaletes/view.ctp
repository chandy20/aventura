<div class="tipoBrazaletes view">
<h2><?php echo __('Tipo Brazalete'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tipoBrazalete['TipoBrazalete']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($tipoBrazalete['TipoBrazalete']['nombre']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tipo Brazalete'), array('action' => 'edit', $tipoBrazalete['TipoBrazalete']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tipo Brazalete'), array('action' => 'delete', $tipoBrazalete['TipoBrazalete']['id']), array(), __('Are you sure you want to delete # %s?', $tipoBrazalete['TipoBrazalete']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipo Brazaletes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipo Brazalete'), array('action' => 'add')); ?> </li>
	</ul>
</div>
