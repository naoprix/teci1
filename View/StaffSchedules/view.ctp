<!-- File: /app/View/StaffSchedule/view.ctp -->

<?php echo $this->Html->css('staffschedules'); ?>

<h1><?php echo ($this->element('menu')); ?> </h1>

<h2>出張先データ</h2>

<?php//pr($data); ?>

<h3><?php echo $data['Member']['staff_code']; ?>
	<?php echo $data['Member']['name']; ?>
</h3>
<h3><?php echo $data['Member']['group']; ?></h2>

<table>

<tr>
	<th>【出張先】</th>
	<th>【件　番】</th>
	<th>【件　名】</th>
	<th>【出発日】</th>
	<th>【帰国日】</th>
	<th>【旅行保険】</th>
	<th>【滞在先】</th>
	<th>【携帯電話】</th>
	<th>【帰国便】</th>
	<th>【帰国経路】</th>
</tr>

<?php if(!empty($data['StaffSchedule'])) : ?>
	<?php foreach ($data['StaffSchedule'] as $info): ?>
	<tr>
		<td><?php echo $info['destination'];?></td>
		<td><?php echo $info['job_no'];?></td>
		<td><?php echo $info['job_title'];?></td>
		<td><?php echo $info['from'];?></td>
		<td><?php echo $info['to'];?></td>
		<td><?php echo $info['insurance'];?></td>
		<td><?php echo $info['accommodation'];?></td>
		<td><?php echo $info['mobile_no'];?></td>
		<td><?php echo $info['return_flight']; ?></td>
		<td><?php echo $info['flight_route'];?></td>

        <td><?php echo $this->Html->link('編集', 
                        array('controller' => 'StaffSchedules',
                            'action' => 'edit',
                            $info['id'])); ?>
        </td>
	</tr>
	<?php endforeach; ?>
<?php endif; ?>

</table>

<?php echo $this->Html->link('出張データ追加', 
                        array('controller' => 'StaffSchedules', 
                            'action' => 'add', 
                            $data['Member']['id'])); ?>