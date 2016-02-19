<!-- File: /app/View/StaffSchedules/edit.ctp -->

<h1>出張予定を編集して下さいよ</h1>

<?php

//pr($assigndata);

$id = $assigndata['StaffSchedule']['id'];
$member_id = $assigndata['StaffSchedule']['member_id'];
$staff_code = $assigndata['StaffSchedule']['staff_code'];
$name = $assigndata['StaffSchedule']['name'];
$group = $assigndata['StaffSchedule']['group'];
$destination = $assigndata['StaffSchedule']['destination'];
$job_no = $assigndata['StaffSchedule']['job_no'];
$job_title = $assigndata['StaffSchedule']['job_title'];
$from = $assigndata['StaffSchedule']['from'];
$to = $assigndata['StaffSchedule']['to'];
$insurance = $assigndata['StaffSchedule']['insurance'];
$status = $assigndata['StaffSchedule']['status'];
$accommodation = $assigndata['StaffSchedule']['accommodation'];
$mobile_no = $assigndata['StaffSchedule']['mobile_no'];
$return_flight = $assigndata['StaffSchedule']['return_flight'];
$flight_route = $assigndata['StaffSchedule']['flight_route'];


echo $staff_code;
echo $name;

echo $this->Form->create('StaffSchedule');//, array('action' => 'edit', $id));
echo $this->Form->input('id', array('value' => $id, 'type'=> 'hidden'));
echo $this->Form->input('member_id', array('value' => $member_id, 'type'=> 'hidden'));
echo $this->Form->input('staff_code', array('value' => $staff_code, 'type'=> 'hidden'));
echo $this->Form->input('name', array('value' => $name, 'type'=> 'hidden'));
echo $this->Form->input('group', array('value' => $group, 'type'=> 'hidden'));

echo $this->Form->input('destination', array('value' => $destination, 'rows' => '1'));
echo $this->Form->input('job_no', array('value' => $job_no, 'rows' => '1'));
echo $this->Form->input('job_title', array('value' => $job_title, 'rows' => '1'));
echo $this->Form->input('from', array('value' => $from, 'rows' => '1'));
echo $this->Form->input('to', array('value' => $to, 'rows' => '1'));
echo $this->Form->select('insurance', array('あり', 'なし'));
echo $this->Form->select('status', array('確定', '予定'));
echo $this->Form->input('accommodation', array('value' => $accommodation, 'rows' => '1'));
echo $this->Form->input('mobile_no', array('value' => $mobile_no, 'rows' => '1'));
echo $this->Form->input('return_flight', array('value' => $return_flight, 'rows' => '1'));
echo $this->Form->input('flight_route', array('value' => $flight_route, 'rows' => '1'));

echo $this->Form->end('更新(UPDATE)');

?>
