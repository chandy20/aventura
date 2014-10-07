<div class="locaciones index" align='center'>
	<h1><?php echo __('Locaciones'); ?></h1>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<!--<th><?php echo $this->Paginator->sort('id', ''); ?></th>-->
			<th><?php echo $this->Paginator->sort('cod_locacion', 'Código'); ?></th>
			<th><?php echo $this->Paginator->sort('nombre_locacion', 'Entrada'); ?></th>
			<th><?php echo $this->Paginator->sort('descripcion', 'Descripción'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($locaciones as $locacione): ?>
	<tr>
		<!--<td><?php echo h($locacione['Locacione']['id']); ?>&nbsp;</td>-->
		<td><?php echo h($locacione['Locacione']['cod_locacion']); ?>&nbsp;</td>
		<td><?php echo h($locacione['Locacione']['nombre_locacion']); ?>&nbsp;</td>
		<td><?php echo h($locacione['Locacione']['descripcion']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $locacione['Locacione']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $locacione['Locacione']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $locacione['Locacione']['id']), array(), __('Are you sure you want to delete # %s?', $locacione['Locacione']['id'])); ?>
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

