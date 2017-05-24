<h1>スーパー顧客一覧</h1>
<?php echo $this->Html->link('顧客登録',['action'=>'entry']);

//左のサイドバー
?>
<div class="left">
    <h2>各種顧客情報</h2>
    <h3>回線タイプ</h3>
        <ul class="l1">
            <li>au光</li>
            <li>Docomo光</li>
        </ul>
    <h3>契約タイプ</h3>
    <ul>
        <?php foreach($plans as $plan):?>
        <li><?php echo $plan ;?><br></li>
            <?php endforeach;?>
        </ul>
    <h3>代理店</h3>
    <ul>
    <?php foreach($agencies as $agency):?>
        <li> <?php echo $agency['Agency']['agency_name'];?></li>
    <?php endforeach;?>
    </ul>
    <h3>ステータス</h3>
    <ul>
            <li>契約中</li>
            <li>解約済み</li>
        </ul>
</div>
<table class = "UsersTable">
    <tr>
        <th>ID</th>
        <th>契約者氏名</th>
        <th>回線タイプ</th>
        <th>契約プラン</th>
        <th>代理店</th>
        <th>ステータス</th>
        <th>契約日</th>
        <th>操作</th>
    </tr>
    <tr>
        <?php foreach($customers as $customer): ?>
        <td><?php echo $customer['Customer']['id']; ?></td> 
        <td><?php echo $customer['Customer']['name']; ?></td>
        <td><?php echo $line_type  [$customer['Customer']['line_type']]; ?></td>
        <td><?php echo $plans   [$customer['Customer']['contract_type']]; ?></td>
        <td><?php echo $customer['Agency']['agency_name']; ?></td>
        <td><?php 
        echo $statuses[$customer['Customer']['status']]; ?></td>
        <td><?php echo $customer['Customer']['contract_day']; ?></td>
        <td><?php echo $this->Html->link('編集',['action' => 'edit',$customer['Customer']['id']]); ?></td>
    </tr>
<?php endforeach; ?>
</table>
<?php echo $this->paginator->numbers (
    array (
        'before' => $this->paginator->hasPrev() ? $this->paginator->first('<<').' | ' : '',
        'after' => $this->paginator->hasNext() ? ' | '.$this->paginator->last('>>') : '',
    )
);
?>
<div class="right">
    <?php
    echo $this->Form->create('Customer');
    echo $this->Form->find('name');
    echo $this->Form->radio('line_type',$line_type);
    echo $this->Form->input('contract_type',['type' => 'radio','options' =>$plans]);
    echo $this->Form->radio('status',['契約中','解約済み']);
    echo $this->Form->end  ('検索');

    ?>
</div>