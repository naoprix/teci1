<?php
////
//Topsコントローラ

class TopsController extends AppController {//クラス名はテーブル名と整合をとること。
    
    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Auth', 'Paginator', 'Flash');
    public $uses = array('User', 'Member', 'StaffSchedule');

    public function beforeFilter() {
        parent::beforeFilter();
        // ユーザ自信による登録とログアウトを許可
        // $this->Auth->allow();//認証できないから仕方なく。
    }

    public function index() {

        $today =new DateTime();
        $after_2weeks = new DateTime($today->format('Y-m-d').'+2 weeks 1 second');

        $this->Member->recursive = 1;
        $staff = $this->Member->find('all',
                    array('order'=> array('Member.staff_order'=>'asc')));
        $this->set('staff',$staff);

        $plan = $this->StaffSchedule->find('all',
                    array(
                        'conditions' => array('and' =>
                            array('StaffSchedule.from <='=>$after_2weeks->format('Y-m-d')),
                            array('StaffSchedule.from >='=>$today->format('Y-m-d'))
                            ),
                        'order'=> array('StaffSchedule.from'=>'asc')
                        ));
        $this->set('plan',$plan);


    }

    public function index2() {

        $today =new DateTime();
        $after_2weeks = new DateTime($today->format('Y-m-d').'+2 weeks 1 second');

        $on_trip = $this->StaffSchedule->find('all',
                    array(
                        'conditions' => array('and' =>
                            array('StaffSchedule.from <='=>$today->format('Y-m-d')),
                            array('StaffSchedule.to >='=>$today->format('Y-m-d'))
                            ),
                        'order'=> array('StaffSchedule.to'=>'asc')
                        ));
        $this->set('on_trip',$on_trip);

        $plan = $this->StaffSchedule->find('all',
                    array(
                        'conditions' => array('and' =>
                            array('StaffSchedule.from <='=>$after_2weeks->format('Y-m-d')),
                            array('StaffSchedule.from >='=>$today->format('Y-m-d'))
                            ),
                        'order'=> array('StaffSchedule.from'=>'asc')
                        ));
        $this->set('plan',$plan);


    }

}
