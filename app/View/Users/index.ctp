<h1>K USER INDE<span class="r">X</span></h1>
<hr>
<div class="entry"><?php echo $this->Html->link('Entry..',['action'=>'entry']);?></div>
<hr>
<table cellspacing="0">
    <tr>
        <th>ID</th>
        <th>UserName</th>
        <th>Pass</th>
        <th>Authority</th>
        <th>Created</th>
        <th>Modified</th>
        <th colspan="2">Ope</th>
    </tr>
<?php foreach ($users as $user):?>
    <tr>
        <td>
            <?php echo $user['User']['id'];?>
        </td>
        <td>
            <?php echo $user['User']['username'];?>
        </td><td>
            <?php echo $user['User']['password'];?>
        </td><td>
            <?php echo $user['User']['role'];?>
        </td><td>
            <?php echo $user['User']['created'];?>
        </td><td>
            <?php echo $user['User']['modified'];?>
        </td>
        <td>
           <?php echo $this->Html->link('Edit',['action'=>'edit',$user['User']['id']]);?>
                 </td><td><?php echo $this->Form->postLink('Delete',['action'=>'delete',$user['User']['id']],
                         array('confirm' => '本当に消去してもいいです？')
                         
                         );?>
        </td>
        
    </tr>  
    
    <?php endforeach;?>
   </td>
</table>
<?php echo $this->paginator->numbers (
    array (
        'before' => $this->paginator->hasPrev() ? $this->paginator->first('<<').' | ' : '',
        'after' => $this->paginator->hasNext() ? ' | '.$this->paginator->last('>>') : '',
    )
);
?>
<hr>
<hr>
