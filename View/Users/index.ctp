<!-- app/View/Users/index.ctp -->

<?php pr($login); ?>

<h2>ユーザー名一覧</h2>

<div>
<?php //pr($users); ?>
<table>
<tr>
	<!-- <th>id</th> -->
	<th>社員番号</th>
	<th>氏名</th>
	<th>ログイン名</th>
	<th>権限</th>
</tr>

<?php
foreach ($users as $user) {
	echo '<tr>';
		// pr($user);
		// echo '<td>'.$user['User']['id'].'</td>';
		echo '<td>'.$user['User']['staff_code'].'</td>';
		echo '<td>'.$user['User']['name'].'</td>';
		echo '<td>'.$user['User']['username'].'</td>';
		// echo '<td>'.$user['User']['password'].'</td>';
		// echo '<td>'.$user['User']['auth'].'</td>';
		echo '<td>'.$this->Html->link('編集', 
                array('controller' => 'Users',
                    'action' => 'edit',
                    $user['User']['id'])).'</td>';
		echo '<td>'.$this->Html->link('削除', 
                array('controller' => 'Users',
                    'action' => 'delete',
                    $user['User']['id'])).'</td>';
	echo '</tr>';
}
?>
</table>
</div>