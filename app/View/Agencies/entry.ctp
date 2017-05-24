
<h1><span class="r">E</span>ntry</h1>
<?php

    echo $this->Form->create('Agency');
    echo $this->Form->input('agency_name');
    echo $this->Form->end('登録');
    
    echo $this->Html->Link('Back..',['action'=>'index']);