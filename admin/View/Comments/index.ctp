<div class="users form">
    <h1>Sites Comments List</h1>
    <table>
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('site_image'); ?></th>
                <th><?php echo $this->Paginator->sort('site_name','サイト名'); ?></th>
                <th><?php echo $this->Paginator->sort('site_url_link','サイトURL（リンク用）'); ?></th>
                <th><?php echo $this->Paginator->sort('no_teachers','講師数'); ?></th>
                <th>&nbsp;</th>

               
            </tr>
        </thead>
        <tbody>                       
            <?php $count=0; ?>
            <?php foreach($comments as $comment): ?>                
            <?php $count ++;?>
            <?php if($count % 2): echo '<tr>'; else: echo '<tr class="zebra">' ?>
            <?php endif; ?>
                <td><img src="<?php echo $retrieveSiteThumb.$comment['Site']['site_image']?>"></td>
                <td style="text-align: center;">
                    <?php 
                       // echo $comment['Site']['site_name']; 
                        /*echo $this->Html->link( $comment['Site']['site_name']  ,   array('action'=>'comment_list', $comment['Comment']['site_id']),array('escape' => false) );*/
                        echo $this->Html->link( $comment['Site']['site_name']  ,   array('controller' => 'Sites', 'action'=>'view', $comment['Site']['id']),array('escape' => false) );
                    ?>
                </td>
                <td style="text-align: center;"><?php echo $comment['Site']['site_url_link']; ?></td>
                <td style="text-align: center;"><?php echo $comment['Site']['no_teachers']; ?></td>
                <td style="text-align: center;">
                    <?php
                        echo $this->Html->link( 'View All Comment(s)' ,   array('action'=>'comment_list', $comment['Comment']['site_id']),array('escape' => false) );
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
