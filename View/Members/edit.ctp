<!-- app/View/Members/edit.ctp -->

<div class="users form">

<h2>出張者の情報を編集してください</h2>

<?php

//pr($member);

$id = $member['Member']['id'];
$staff_code = $member['Member']['staff_code'];
$name = $member['Member']['name'];
$group = $member['Member']['group'];
$staff_order = $member['Member']['staff_order'];


echo $staff_code;
echo $name;

echo $this->Form->create('Member');//, array('action' => 'edit', $id));
echo $this->Form->input('id', array('value' => $id, 'type'=> 'hidden'));
echo $this->Form->input('staff_code', array('value' => $staff_code, 'type'=> 'hidden'));
echo $this->Form->input('name', array('value' => $name, 'type'=> 'hidden'));
echo $this->Form->input('group', array('value' => $group));

echo $this->Form->input('staff_order', array('value' => $staff_order));

echo $this->Form->end(__('更新(UPDATE)'));

?>
</div>