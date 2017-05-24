<?php
echo $this->Form->create('Customer');
echo $this->Form->input('name');
echo $this->Form->select('line_type',$line_type),"<br>";
echo $this->Form->select('contract_type',$plans),"<br>";
echo $this->Form->input('agency_id',array('options' => $hash_agencies)),"<br>";
echo $this->Form->select('status',['契約中','解約済み']),"<br>";
echo $this->Form->input('contract_day',['type'=>'datetime','dateFormat'=>'YMD','monthNames'=>'false','timeFormat'=>'24']);
echo $this->Form->end('登録');