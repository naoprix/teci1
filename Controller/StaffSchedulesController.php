<?php
//StaffSchedulesコントローラ

class StaffSchedulesController extends AppController {//クラス名はテーブル名と整合をとること。
    
    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session', 'Auth');
    public $uses = array('StaffSchedule','Member', 'User');

    //認証できないから仕方なく。
    //認証できないから仕方なく。
    public function beforeFilter() {
        parent::beforeFilter();
        // ユーザ自信による登録とログアウトを許可
        //$this->Auth->allow();//認証できないから仕方なく。
    }

    public function index() {

        $today =new DateTime();
        $month_day1 = new DateTime('first day of'.$today->format('Y-m-d'));
        $month_end = new DateTime('last day of'.$today->format('Y-m-d').'+2 months 1 second');

        
        $staff = $this->Member->find('all', array('order' => array('Member.staff_order'=>'asc')));
        $this->set('staff', $staff);

        $schedule = $this->StaffSchedule->find('all',
                    array(
                        'conditions' => array('and' =>
                            array('StaffSchedule.from <='=>$month_end->format('Y-m-d')),
                            array('StaffSchedule.to >='=>$month_day1->format('Y-m-d'))
                            ),
                        'order'=> array('StaffSchedule.name'=>'asc','StaffSchedule.from'=>'asc')
                        ));
        $this->set('schedule',$schedule);
        // $this->set('loginstatus', $this->Auth->loggedIn());
    }

    public function view($name) {
        $data = $this->Member->find('first',
                    array(
                        'conditions' => array('Member.name' => $name)));
        $this->set('data',$data);
    }

    public function add($id) {
        $assigndata = $this->Member->findById($id);

        if (!$assigndata) {
            throw new NotFoundException(__('不正な入力だぞ'));
        }
        $this->set('member', $assigndata['Member']);        
        $this->set('assigndata',$assigndata['StaffSchedule']);        //recursive = 1; 自身とbelongsToのデータ、=1でbelongsTo, hasManyのデータを取得


        if($this->request->is('post')) {
            $this->StaffSchedule->create();
            if ($this->StaffSchedule->save($this->request->data)) {
                $this->Session->setFlash(__('出張データを追加しましたよー'));
                return $this->redirect(array('action' => 'view',
                                        $this->request->data['StaffSchedule']['name']));
            }
            $this->Session->setFlash(__('出張データを追加できませんでした。。。'));
            return  $this->redirect(array('action' => 'view',
                                        $this->request->data['StaffSchedule']['name']));
        }
    }

    public function edit($id) {
        if(!$id) {
            throw new NotFoundException(__('パラメータがきてませんよー'));
        }

        $assigndata = $this->StaffSchedule->findById($id);
        if (!$assigndata) {
            throw new NotFoundException(__('不正な入力だぞ'));
        }

        $this->set('assigndata', $assigndata);

        if ($this->request->is(array('post', 'put'))) {
            $this->StaffSchedule->id = $id;
            if ($this->StaffSchedule->save($this->request->data)) {
                $this->Session->setFlash(__('出張データを更新しました'));
                return $this->redirect(array('action' => 'view', 
                            $assigndata['StaffSchedule']['name']));
            }
            $this->Session->setFlash(__('データ更新に失敗しました'));
             return $this->redirect(array('action' => 'view', 
                                     $this->request->assigndata['StaffSchedule']['name']));

        }
    }
}


