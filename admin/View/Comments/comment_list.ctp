<div class="users form">
    <h1>Comment List</h1>
    <table>
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('user_id', 'User');?>  </th>
                <th><?php echo $this->Paginator->sort('message', 'Message');?>  </th>
                <th><?php echo $this->Paginator->sort('created', 'Created');?>  </th>
                <th><?php echo $this->Paginator->sort('rate', 'Rate');?>  </th>
                <th><?php echo "Actions"; ?>  </th>
            
            </tr>
        </thead>
        <tbody>                       
            <?php $count=0; ?>
            <?php foreach($comments as $comment): ?>                
            <?php $count ++;?>
            <?php if($count % 2): echo '<tr>'; else: echo '<tr class="zebra">' ?>
            <?php endif; ?>
                <td style="text-align: center;"><?php echo ($comment['User']['name']) ? $comment['User']['name'] : 'Anonymous'; ?></td>
                <td style="text-align: center;">
                    <?php $getmsg = $comment['Comment']['message']; echo strlen($getmsg) > 49 ? substr($getmsg,0,50).'...' : $getmsg; ?>
                </td>
                <td style="text-align: center;"><?php echo $comment['Comment']['created']; ?></td>
                <td style="text-align: center;"><?php echo $comment['Comment']['rate']; ?></td>
                <td >
                <?php
                    echo $this->Html->link("View", array('action'=>'view', $comment['Comment']['id'])) .' | ';
                    if( $comment['Comment']['approval'] != 0){ 
                        echo $this->Html->link("Delete", array('action'=>'delete', $comment['Comment']['id'], $comment['Comment']['site_id']));
                    } else {
                        echo $this->Html->link("Approve", array('action'=>'activate', $comment['Comment']['id'], $comment['Comment']['site_id']));
                    }
                ?>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php unset($comment); ?>
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
