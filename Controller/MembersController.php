<?php

////
// app/Controller/MembersController.php


////////
////まだ全然完成していません。(azb-p4のuserコントローラの転用)

class MembersController extends AppController {

    public $helpers = array('Html', 'Form', 'Session', 'Flash');
    public $components = array('Auth', 'Paginator', 'Flash');
    public $uses = array('Member', 'StaffSchedule', 'User');

    public function beforeFilter() {
        parent::beforeFilter();
        // ユーザ自信による登録とログアウトを許可
        // $this->Auth->allow('index', 'add', 'login', 'logout');
    }

    public function index() {
        $this->Member->recursive = 0;
        //recursive =0; 自身とbelongsToのデータ、=1でbelongsTo, hasManyのデータを取得
        $members = $this->Member->find('all', array('order' => array('staff_order' => 'asc')));
        $this->set('members', $members);
    }


    public function view($id = null) {
        $this->Member->id = $id;
        if (!$this->Member->exists()) {
            throw new NotFoundException(__('Invalid member'));
        }
        $this->set('member', $this->Member->read(null, $id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Member->create();
            if ($this->Member->save($this->request->data)) {
                $this->Flash->success(__('登録しました'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('登録できませんでした'));
            }
        }
    }

    public function edit($id = null) {
        $this->Member->id = $id;
        if (!$this->Member->exists()) {
            throw new NotFoundException(__('Invalid member'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Member->save($this->request->data)) {
                $this->Session->setFlash(__('The member has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The member could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Member->read(null, $id);
            unset($this->request->data['Member']['password']);
        }
    }

    public function delete($id = null) {
        $this->request->onlyAllow('post');

        $this->Member->id = $id;
        if (!$this->Member->exists()) {
            throw new NotFoundException(__('Invalid member'));
        }
        if ($this->Member->delete()) {
            $this->Flash->set(__('Member deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Flash->set(__('Member was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

	// public function login() {
	//     if ($this->request->is('post')) {
 //    	    if ($this->Auth->login()) {
 //                $this->redirect(array('controller'=>'Tops', 'action' =>'index'));
 //    	        //$this->redirect($this->Auth->redirectUrl());
 //    	    } else {
 //    	        $this->Flash->set(__('Invalid membername or password, try again'));
 //    	    }
 //    	}
	// }

	// public function logout() {
 //    	$this->redirect($this->Auth->logout());
	// }

}