<div class="torniquetes index">
	<h2><?php echo __('Torniquetes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('tipo_id'); ?></th>
			<th><?php echo $this->Paginator->sort('locacione_id'); ?></th>
			<th><?php echo $this->Paginator->sort('grupo_id'); ?></th>
			<th><?php echo $this->Paginator->sort('descripcion'); ?></th>
			<th><?php echo $this->Paginator->sort('serial'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($torniquetes as $torniquete): ?>
	<tr>
		<td><?php echo h($torniquete['Torniquete']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($torniquete['Tipo']['id'], array('controller' => 'tipos', 'action' => 'view', $torniquete['Tipo']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($torniquete['Locacione']['id'], array('controller' => 'locaciones', 'action' => 'view', $torniquete['Locacione']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($torniquete['Grupo']['id'], array('controller' => 'grupos', 'action' => 'view', $torniquete['Grupo']['id'])); ?>
		</td>
		<td><?php echo h($torniquete['Torniquete']['descripcion']); ?>&nbsp;</td>
		<td><?php echo h($torniquete['Torniquete']['serial']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $torniquete['Torniquete']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $torniquete['Torniquete']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $torniquete['Torniquete']['id']), array(), __('Are you sure you want to delete # %s?', $torniquete['Torniquete']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Torniquete'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Tipos'), array('controller' => 'tipos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipo'), array('controller' => 'tipos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Locaciones'), array('controller' => 'locaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Locacione'), array('controller' => 'locaciones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Grupos'), array('controller' => 'grupos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Grupo'), array('controller' => 'grupos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Entradas Salidas Anos'), array('controller' => 'entradas_salidas_anos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entradas Salidas Ano'), array('controller' => 'entradas_salidas_anos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Entradas Salidas Dias'), array('controller' => 'entradas_salidas_dias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entradas Salidas Dia'), array('controller' => 'entradas_salidas_dias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Entradas Salidas Horas'), array('controller' => 'entradas_salidas_horas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entradas Salidas Hora'), array('controller' => 'entradas_salidas_horas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Entradas Salidas Mese'), array('controller' => 'entradas_salidas_mese', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entradas Salidas Mese'), array('controller' => 'entradas_salidas_mese', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Entradas Salidas Minutos'), array('controller' => 'entradas_salidas_minutos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entradas Salidas Minuto'), array('controller' => 'entradas_salidas_minutos', 'action' => 'add')); ?> </li>
	</ul>
</div>
