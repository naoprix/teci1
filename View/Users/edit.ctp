<!-- app/View/Users/edit.ctp -->

<div class="users form">

<h2>ユーザ情報を編集してください</h2>

<?php

//pr($user);

$id = $user['User']['id'];
$staff_code = $user['User']['staff_code']
$name = $user['User']['name'];
$username = $user['User']['username'];
$password = $user['User']['password'];
$auth = $user['User']['auth'];


echo $username;

echo $this->Form->create('User');
echo $this->Form->input('id', array('value' => $id, 'type'=> 'hidden'));
echo $this->Form->input('username', array('value' => $username, 'type'=> 'hidden'));
echo $this->Form->input('staff_code', array('value' => $staff_code));
echo $this->Form->input('name', array('value' => $name));
echo $this->Form->input('password', array('value' => $password));
echo $this->Form->input('auth', array('value' => $auth));

echo $this->Form->end(__('更新(UPDATE)'));

?>

</div>