<?php

/**
 * @property User $User
 */
class UsersController extends AppController
{
  public $helpers = array(
    'Js',
    'Html',
    'Form'
  );
  public $components = array(
    'Paginator',
    'Security');
  public $paginate = array(
    'limit' => 5,
    'order' => array(
      'id' => 'asc')
  );

  public function beforeFilter()
  {
    parent::beforeFilter();
//    $this->Auth->allow('add', 'logout');
  }

  public function index()
  {
    $this->Paginator->settings = $this->paginate;
    $users = $this->Paginator->paginate();
    $this->set('users', $users);
  }

  public function login()
  {
    if ($this->request->is('post')) {

      if ($this->Auth->login()) {
        return $this->redirect($this->Auth->redirectUrl(array(
          'controller'=> 'contacts',
          'action' => 'index')));
      }
      $this->Session->setFlash('Invalid username or password, try again');
    }
  }

  public function logout()
  {
    return $this->redirect($this->Auth->logout());
  }

  public function view($id = null)
  {
    $this->User->id = $id;
    if (!$this->User->exists()) {
      throw new NotFoundException('Invalid user');
    }
    $this->set('user', $this->User->read(null, $id));
  }

  public function add()
  {
    if ($this->request->is('post')) {
      $this->User->create();
      $data = $this->request->data['User'];

      if ($this->User->save($data)) {
        $this->Session->setFlash('The user has been saved');
        return $this->redirect(array('action' => 'index'));
      }

      $this->Session->setFlash('The user could not be saved. Please, try again.');
    }
  }

  public function edit($id = null)
  {
    $this->User->id = $id;

    if (!$this->User->exists()) {
      throw new NotFoundException('Invalid user');
    }

    if ($this->request->is(array('post', 'put'))) {
      if ($this->User->save($this->request->data)) {
        $this->Session->setFlash('The user has been saved');
        return $this->redirect(array('action' => 'index'));
      }
      $this->Session->setFlash('The user could not be saved. Please, try again.');
    } else {
      $this->request->data = $this->User->read(null, $id);
      unset($this->request->data['User']['password']);
    }
  }

  public function delete($id = null)
  {
    if ($this->request->is('get')) {
      throw new MethodNotAllowedException();
    }

    $message = $this->User->delete($id) ? 'User deleted' :
      'User was not deleted';

    $this->Session->setFlash($message);
    return $this->redirect(array('action' => 'index'));
  }
}
 