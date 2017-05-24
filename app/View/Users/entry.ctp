
<h1>管理UseR EntrY</h1>

<?php

    echo $this->Form->create('User');
    echo $this->Form->input('username');
    echo $this->Form->input('password');
    echo $this->Form->input('role',array('options'=>array('admin' =>'Admin','author'=>'author')));
    echo $this->Form->end('登録');
    
    echo $this->Html->link('BacK..',['action'=>'index']);
