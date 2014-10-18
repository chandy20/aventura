<div class="users index" align="center">
    <h1><?php echo __('Usuarios'); ?></h1>
    <table cellpadding="0" cellspacing="0" class="container">
        <thead>
            <tr>			
                <th><h2><?php echo $this->Paginator->sort('username', 'Nombre de Usuario'); ?></h2></th>
                <th><h2><?php echo $this->Paginator->sort('nombres', 'Nombres'); ?></h2></th>
                <th><h2><?php echo $this->Paginator->sort('apellidos', 'Apellidos'); ?></h2></th>
                <th class="actions"><h2><?php echo __('Operaciones'); ?></h2></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                   
                    <td><?php echo h($user['User']['username']); ?>&nbsp;</td>                    
                    <td><?php echo h($user['User']['nombres']); ?>&nbsp;</td>
                    <td><?php echo h($user['User']['apellidos']); ?>&nbsp;</td>
                    
                    <td class="actions">                       
                        <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $user['User']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $user['User']['id']), array(), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Pagina {:page} de {:pages}, motrando {:current} de {:count} totales, iniciando en {:start}, termianndo en {:end}')
        ));
        ?>	</p>
    <div class="paging">
        <?php
        echo $this->Paginator->prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));
        ?>
    </div>
</div>
