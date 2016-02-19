<?php
App::uses('AppModel','Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class Member extends AppModel {

    public $hasMany = array(
         'StaffSchedule');

}