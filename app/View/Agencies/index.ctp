
<h1>D Shop Inde<span class="r">X</span></h1>
<hr>
<hr>
<?php echo $this->Html->link('Entry',['action'=>'entry']);?>
<table>
    <tr>
        <th>ID</th><th>ﾀﾞｲﾘﾃﾝﾒｲ</th><th>ｾｲｻｸﾋﾞ</th><th>ｺｳｼﾝﾋﾞ</th><th>ｿｳｻ</th>
    </tr>
    <?php foreach ($agencies as $agency):?>
        <tr>
            <td><?php echo $agency['Agency']['id'];?></td>
            <td><?php echo $agency['Agency']['agency_name'];?></td>
            <td><?php echo $agency['Agency']['created'];?></td>
            <td><?php echo $agency['Agency']['modified'];?></td>
            <td><?php echo $this->Html->link('ﾍﾝｼｭｳ',['action'=>'edit',$agency['Agency']['id']]); ?> 
            </td> 
            <td><?php echo $this->Form->postlink('ｼｮｳｷｮ',['action'=>'delete',$agency['Agency']['id']],
                    ['confirm' => 'ｼｮｳｷｮｼﾏｽｶﾞｲｲﾃﾞｽｶ?']); ?>
            </td>
        </tr>
    <?php    endforeach;?>
</table>
<?php echo $this->paginator->numbers (
    array (
        'before' => $this->paginator->hasPrev() ? $this->paginator->first('<<').' | ' : '',
        'after' => $this->paginator->hasNext() ? ' | '.$this->paginator->last('>>') : '',
    )
);

