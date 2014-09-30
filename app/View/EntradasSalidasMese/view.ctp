<div class="entradasSalidasMese view">
<h2><?php echo __('Entradas Salidas Mese'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($entradasSalidasMese['EntradasSalidasMese']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Torniquete'); ?></dt>
		<dd>
			<?php echo $this->Html->link($entradasSalidasMese['Torniquete']['id'], array('controller' => 'torniquetes', 'action' => 'view', $entradasSalidasMese['Torniquete']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha'); ?></dt>
		<dd>
			<?php echo h($entradasSalidasMese['EntradasSalidasMese']['fecha']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Entradas'); ?></dt>
		<dd>
			<?php echo h($entradasSalidasMese['EntradasSalidasMese']['entradas']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Salidas'); ?></dt>
		<dd>
			<?php echo h($entradasSalidasMese['EntradasSalidasMese']['salidas']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Entradas Salidas Mese'), array('action' => 'edit', $entradasSalidasMese['EntradasSalidasMese']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Entradas Salidas Mese'), array('action' => 'delete', $entradasSalidasMese['EntradasSalidasMese']['id']), array(), __('Are you sure you want to delete # %s?', $entradasSalidasMese['EntradasSalidasMese']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Entradas Salidas Mese'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entradas Salidas Mese'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Torniquetes'), array('controller' => 'torniquetes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Torniquete'), array('controller' => 'torniquetes', 'action' => 'add')); ?> </li>
	</ul>
</div>
