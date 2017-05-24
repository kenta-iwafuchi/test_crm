
<h1>代理店 Edit</h1>

<?php
echo $this->Form->create('Agency');
    echo $this->Form->input('agency_name');
    echo $this->Form->end('Edit');
    
    echo $this->Html->link('BacK..',['action'=>'index']);