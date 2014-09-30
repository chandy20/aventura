<div class="entradasSalidasHoras view">
<h2><?php echo __('Entradas Salidas Hora'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($entradasSalidasHora['EntradasSalidasHora']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Torniquete'); ?></dt>
		<dd>
			<?php echo $this->Html->link($entradasSalidasHora['Torniquete']['id'], array('controller' => 'torniquetes', 'action' => 'view', $entradasSalidasHora['Torniquete']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha'); ?></dt>
		<dd>
			<?php echo h($entradasSalidasHora['EntradasSalidasHora']['fecha']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hora'); ?></dt>
		<dd>
			<?php echo h($entradasSalidasHora['EntradasSalidasHora']['hora']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Entradas'); ?></dt>
		<dd>
			<?php echo h($entradasSalidasHora['EntradasSalidasHora']['entradas']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Salidas'); ?></dt>
		<dd>
			<?php echo h($entradasSalidasHora['EntradasSalidasHora']['salidas']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Entradas Salidas Hora'), array('action' => 'edit', $entradasSalidasHora['EntradasSalidasHora']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Entradas Salidas Hora'), array('action' => 'delete', $entradasSalidasHora['EntradasSalidasHora']['id']), array(), __('Are you sure you want to delete # %s?', $entradasSalidasHora['EntradasSalidasHora']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Entradas Salidas Horas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entradas Salidas Hora'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Torniquetes'), array('controller' => 'torniquetes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Torniquete'), array('controller' => 'torniquetes', 'action' => 'add')); ?> </li>
	</ul>
</div>
