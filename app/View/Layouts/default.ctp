<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo '顧客管理System-X' ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		//echo $this->Html->css('all');
                echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
    <div Class="jun">
	<div id="container">
             <div id="header">
                 <ul>
                     <li><?php echo $this->Html->link('管理ユーザー',['controller'=>'users'])?></li>
                     <li><?php echo $this->Html->link('代理店一覧',['controller'=>'agencies'])?></a></li>
                     <li><?php echo $this->Html->link('顧客管理',['controller'=>'customers'])?></li>
                     <li><?php echo $this->Html->link('ログアウト',['controller'=>'users','action'=>'logout'])?></li>
                 </ul>
            </div>
		
		<div id="content">

			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
           
            <div class="footter">
                <footer>copyright&copy;2017 CRM-Jun All Rights Reserved.</footer>
            </div>
            <?php// echo $this->element('sql_dump'); ?>
        </div>
</body>
</html>
