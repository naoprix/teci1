<?php
App::uses('AppModel','Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {

    // public $hasOne = array(
    //      'Member' => array(
    //         'className' => 'Member',
    //         'foreignKey' => 'staff_code',
    //         'conditions' => array('Member.staff_code' => 'User.staff_code'),
    //         // 'conditions' => array('staff_code' => 'Member.staff_code'),
    //         //'type' => 'inner',
    //         //'fields' => array('Member.id', 'Member.staff_code', 'Member.name')
    //         )
    // );

    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notBlank', 'isUnique'),
                'message' => 'ユーザ名が入力されていないか登録済みです'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'パスワードを入力してください'
            )
        )
    );

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new BlowfishPasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
        }
        return true;
    }

}


    