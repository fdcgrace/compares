<div class="users form">
    <h1>Users</h1>
    <?php 
        $base_url = array('controller' => 'users', 'action' => 'index');
        echo $this->Form->create("Filter",array('url' => $base_url, 'class' => 'filter')); 
    ?>
    <div class="small-9 columns">
        <?php 
            echo $this->Form->input("Search", array('label' => false, 'placeholder' => 'Search users here...'));
        ?>
    </div>
    <div class="small-3 columns">
        <?php echo $this->Form->submit("Go", array("class" => "button postfix")); ?>
    </div>
    <table>
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('name', 'Name');?>  </th>
                <th><?php echo $this->Paginator->sort('username', 'Username');?>  </th>
                <th><?php echo $this->Paginator->sort('email', 'E-Mail');?></th>
                <th><?php echo $this->Paginator->sort('created', 'Created');?></th>
                <th><?php echo $this->Paginator->sort('modified','Last Update');?></th>
                <th><?php echo $this->Paginator->sort('role','Role');?></th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>                       
            <?php $count=0; ?>
            <?php foreach($users as $user): ?>                
            <?php $count ++;?>
            <?php if($count % 2): echo '<tr>'; else: echo '<tr class="zebra">' ?>
            <?php endif; ?>
                <td style="text-align: center;"><?php echo $user['User']['name']; ?></td>
                <td><?php echo $this->Html->link( $user['User']['username']  ,   array('action'=>'edit', $user['User']['id']),array('escape' => false) );?></td>
                <td style="text-align: center;"><?php echo $user['User']['email']; ?></td>
                <td style="text-align: center;"><?php echo $this->Time->niceShort($user['User']['created']); ?></td>
                <td style="text-align: center;"><?php echo $this->Time->niceShort($user['User']['modified']); ?></td>
                <td style="text-align: center;"><?php echo ($user['User']['role'])==0 ? 'Admin':'User'; ?></td>
                <td >
                <?php echo $this->Html->link(    "Edit",   array('action'=>'edit', $user['User']['id']) ); ?> | 
                <?php
                    if( $user['User']['status'] != 0){ 
                        echo $this->Html->link(    "Delete", array('action'=>'delete', $user['User']['id']));}else{
                        echo $this->Html->link(    "Re-Activate", array('action'=>'activate', $user['User']['id']));
                        }
                ?>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php unset($user); ?>
        </tbody>
    </table>
    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));
        ?>  </p>
    <div class="paging">
        <?php
            echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
            echo $this->Paginator->numbers(array('separator' => ''));
            echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
        ?>
    </div>
</div>     
