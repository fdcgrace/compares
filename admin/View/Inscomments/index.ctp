<div class="users form">
    <h1>Instructors Comments List</h1>
    <table>
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('e_name', '名前（英語）'); ?></th>
                <th><?php echo $this->Paginator->sort('k_name', '名前（カタカナ）'); ?></th>
                <th><?php echo $this->Paginator->sort('education','最終学歴'); ?></th>
                <th><?php echo $this->Paginator->sort('speak_japanese','日本語対応'); ?></th>
                <th><?php echo $this->Paginator->sort('instructor_url','講師リンクURL'); ?></th>
                <th>&nbsp;</th>

               
            </tr>
        </thead>
        <tbody>                       
            <?php $count=0; ?>
            <?php foreach($inscomments as $inscomment): ?>                
            <?php $count ++;?>
            <?php if($count % 2): echo '<tr>'; else: echo '<tr class="zebra">' ?>
            <?php endif; ?>
                <td style="text-align: center;">
                    <?php 
                        echo $this->Html->link( $inscomment['Instructor']['e_name']  ,   array('controller' => 'instructors', 'action'=>'view', $inscomment['Instructor']['id']),array('escape' => false) );
                    ?>
                </td>
                <td><?php echo $inscomment['Instructor']['k_name'] ; ?></td>
                <td style="text-align: center;"><?php echo $inscomment['Instructor']['education']; ?></td>
                <td style="text-align: center;"><?php echo $inscomment['Instructor']['speak_japanese'] == 1 ? "Yes" : "No"; ?></td>
                <td style="text-align: center;"><?php echo $inscomment['Instructor']['instructor_url']; ?></td>
                <td style="text-align: center;">
                    <?php
                        echo $this->Html->link( 'View All Comment(s)' ,   array('action'=>'inscomment_list', $inscomment['Inscomment']['instructor_id']),array('escape' => false) );
                    ?>
                </td>
                
            </tr>
            <?php endforeach; ?>
            <?php unset($inscomments); ?>
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
