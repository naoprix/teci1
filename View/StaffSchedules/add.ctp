<!-- File: /app/View/StaffSchedules/edit.ctp -->

<h1>出張予定を入力しなさい</h1>

<?php

$id = $member['id'];
$member_id = $id;
$staff_code = $member['staff_code'];
$name = $member['name'];
$group = $member['group'];


echo '<h3>'.$staff_code.'</h3>';
echo '<h2>'.$name.'</h2>';

echo $this->Form->create('StaffSchedule');
echo $this->Form->input('id', array('type'=> 'hidden'));
echo $this->Form->input('member_id', array('value' => $member_id, 'type'=> 'hidden'));
echo $this->Form->input('staff_code', array('value' => $staff_code, 'type'=> 'hidden'));
echo $this->Form->input('name', array('value' => $name, 'type'=> 'hidden'));
echo $this->Form->input('group', array('value' => $group, 'type'=> 'hidden'));

echo $this->Form->input('destination', array('rows' => '1'));
echo $this->Form->input('job_no', array('rows' => '1'));
echo $this->Form->input('job_title', array('rows' => '1'));
echo $this->Form->input('from', array('rows' => '1'));
echo $this->Form->input('to', array('rows' => '1'));
echo $this->Form->select('insurance', array('あり', 'なし'));
echo $this->Form->select('status', array('確定', '予定'));
echo $this->Form->input('accommodation', array('rows' => '1'));
echo $this->Form->input('mobile_no', array('rows' => '1'));
echo $this->Form->input('return_flight', array('rows' => '1'));
echo $this->Form->input('flight_route', array('rows' => '1'));

echo $this->Form->end('データ作成(CREATE DATA)');

?>

