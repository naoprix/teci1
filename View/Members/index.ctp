<!-- app/View/Members/index.ctp -->

<?php //pr($members); ?>

<h2>出張者名簿一覧</h2>

<div>
<?php echo $this->Html->link('出張者名簿を追加する', 
                        array('controller' => 'Members',
                            'action' => 'add')); ?>
</div>

<div>
<?php //pr($members); ?>
<table>
<tr>
	<!-- <th>id</th> -->
	<th>社員番号</th>
	<th>氏名</th>
	<th>所属</th>
	<th>パスポート番号</th>
	<th>パスポート有効期限</th>
	<th>国内携帯電話</th>
	<!-- <th>国内住所</th> -->
	<th>緊急連絡先</th>
	
	<th>緊急時電話</th>

</tr>

<?php
foreach ($members as $member) {
	echo '<tr>';
		// echo '<td>'.$member['Member']['id'].'</td>';
		echo '<td>'.$member['Member']['staff_code'].'</td>';
		echo '<td>'.$member['Member']['name'].'</td>';
		echo '<td>'.$member['Member']['group'].'</td>';
		echo '<td>'.$member['Member']['passport_no'].'</td>';
		echo '<td>'.$member['Member']['passport_validity'].'</td>';
		echo '<td>'.$member['Member']['mobile_phone'].'</td>';
		// echo '<td>'.$member['Member']['home_address'].'</td>';
		echo '<td>'.$member['Member']['emergency_contact_person'].'</td>';
		echo '<td>'.$member['Member']['emergency_contact_no'].'</td>';
		echo '<td>'.$this->Html->link('編集', 
                        array('controller' => 'Members',
                            'action' => 'edit',
                            $member['Member']['id'])).'</td>';
		echo '<td>'.$this->Html->link('削除', 
                        array('controller' => 'Members',
                            'action' => 'delete',
                            $member['Member']['id'])).'</td>';
	echo '</tr>';
}
?>
</table>
</div>