
<h1>管理User Edit</h1>

<?php
echo $this->Form->create('User');
    echo $this->Form->input('username');
    echo $this->Form->input('password');
    echo $this->Form->input('role',array('options'=>array('admin' =>'Admin','author'=>'author')));
    echo $this->Form->end('Edit');
    
    echo $this->Html->link('BacK..',['action'=>'index']);