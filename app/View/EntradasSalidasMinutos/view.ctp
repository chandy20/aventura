<div class="entradasSalidasMinutos view">
<h2><?php echo __('Entradas Salidas Minuto'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($entradasSalidasMinuto['EntradasSalidasMinuto']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha'); ?></dt>
		<dd>
			<?php echo h($entradasSalidasMinuto['EntradasSalidasMinuto']['fecha']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hour'); ?></dt>
		<dd>
			<?php echo h($entradasSalidasMinuto['EntradasSalidasMinuto']['hour']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Entradas'); ?></dt>
		<dd>
			<?php echo h($entradasSalidasMinuto['EntradasSalidasMinuto']['entradas']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Salidas'); ?></dt>
		<dd>
			<?php echo h($entradasSalidasMinuto['EntradasSalidasMinuto']['salidas']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Torniquete'); ?></dt>
		<dd>
			<?php echo $this->Html->link($entradasSalidasMinuto['Torniquete']['id'], array('controller' => 'torniquetes', 'action' => 'view', $entradasSalidasMinuto['Torniquete']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Entradas Salidas Minuto'), array('action' => 'edit', $entradasSalidasMinuto['EntradasSalidasMinuto']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Entradas Salidas Minuto'), array('action' => 'delete', $entradasSalidasMinuto['EntradasSalidasMinuto']['id']), array(), __('Are you sure you want to delete # %s?', $entradasSalidasMinuto['EntradasSalidasMinuto']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Entradas Salidas Minutos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entradas Salidas Minuto'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Torniquetes'), array('controller' => 'torniquetes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Torniquete'), array('controller' => 'torniquetes', 'action' => 'add')); ?> </li>
	</ul>
</div>
