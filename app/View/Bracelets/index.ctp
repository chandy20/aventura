<div class="bracelets index">
	<h2><?php echo __('Bracelets'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('date'); ?></th>
			<th><?php echo $this->Paginator->sort('cod_barras'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($bracelets as $bracelet): ?>
	<tr>
		<td><?php echo h($bracelet['Bracelet']['id']); ?>&nbsp;</td>
		<td><?php echo h($bracelet['Bracelet']['date']); ?>&nbsp;</td>
		<td><?php echo h($bracelet['Bracelet']['cod_barras']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $bracelet['Bracelet']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $bracelet['Bracelet']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $bracelet['Bracelet']['id']), array(), __('Are you sure you want to delete # %s?', $bracelet['Bracelet']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Bracelet'), array('action' => 'add')); ?></li>
	</ul>
</div>
