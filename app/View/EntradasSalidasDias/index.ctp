<div class="entradasSalidasDias index">
	<h2><?php echo __('Entradas Salidas Dias'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('torniquete_id'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha'); ?></th>
			<th><?php echo $this->Paginator->sort('entradas'); ?></th>
			<th><?php echo $this->Paginator->sort('salidas'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($entradasSalidasDias as $entradasSalidasDia): ?>
	<tr>
		<td><?php echo h($entradasSalidasDia['EntradasSalidasDia']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($entradasSalidasDia['Torniquete']['id'], array('controller' => 'torniquetes', 'action' => 'view', $entradasSalidasDia['Torniquete']['id'])); ?>
		</td>
		<td><?php echo h($entradasSalidasDia['EntradasSalidasDia']['fecha']); ?>&nbsp;</td>
		<td><?php echo h($entradasSalidasDia['EntradasSalidasDia']['entradas']); ?>&nbsp;</td>
		<td><?php echo h($entradasSalidasDia['EntradasSalidasDia']['salidas']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $entradasSalidasDia['EntradasSalidasDia']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $entradasSalidasDia['EntradasSalidasDia']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $entradasSalidasDia['EntradasSalidasDia']['id']), array(), __('Are you sure you want to delete # %s?', $entradasSalidasDia['EntradasSalidasDia']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Entradas Salidas Dia'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Torniquetes'), array('controller' => 'torniquetes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Torniquete'), array('controller' => 'torniquetes', 'action' => 'add')); ?> </li>
	</ul>
</div>
