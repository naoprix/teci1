<?php

////
// app/Controller/UsersController.php

App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class UsersController extends AppController {

    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Auth', 'Paginator', 'Flash');
    public $uses = array('User', 'Member', 'Top');

    public function beforeFilter() {
        parent::beforeFilter();
        // ユーザ自信による登録を許可
        $this->Auth->allow('add');

    }

    // public function beforeRender() {
    //     parent::beforeRender();

    //     $this->set('log', $this->Auth->login());
    // }

    public function index() {
        $this->User->recursive = 1;
        //recursive = 1; 自身とbelongsToのデータ、=1でbelongsTo, hasManyのデータを取得
        $users = $this->User->find('all');
        $this->set('users', $users);
        //$this->set('users', $this->paginate());
    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->findById($id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('登録しました'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('登録できませんでした'));
            }
        }
    }

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->set(__('The user has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->set(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->User->findById($id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        $this->request->allowMethod('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('無効なユーザーです'));
        }
        if ($this->User->delete()) {
            $this->Flash->set(__('ユーザーを削除しました'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Flash->set(__('ユーザーを削除できませんでした'));
        $this->redirect(array('action' => 'index'));
    }

	public function login() {
	    if ($this->request->is('post')) {
             // pr($this->request->data);
             // pr($this->Auth->login());
             // echo $this->Auth->login();
             // pr($this->redirect(array('action' =>'index')));

    	    if ($this->Auth->login()) {
                $this->Flash->success(__('ログインに成功しました'));
                // $this->redirect(
                        // array('controller' => 'Tops',
                             // 'action' =>'index'));
    	    } else {
                // pr($this->request->data);
                // pr($this->Auth->login());
                // echo $this->Auth->login();
    	        $this->Flash->error(__('ユーザ名かパスワードが無効です'));
    	    }
    	}
        // pr($this->Auth->login());
        // $this->set('login', $this->request->data);

	}

	public function logout() {
    	$this->redirect($this->Auth->logout());
	}

}