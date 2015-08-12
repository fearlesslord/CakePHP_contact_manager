<?php

/**
 * @property Contact $Contact
 */
class ContactsController extends AppController
{
  public $components = array(
    'Paginator'
  );

  public $helpers = array(
    'Js',
    'Html',
    'Form'
  );

  public $paginate = array(
      'limit' => 5,
      'order' => array(
        'lastname' => 'asc'),
  );

  public function index()
  {
    $this->Paginator->settings = $this->paginate;
    $data = $this->Paginator->paginate();

    $this->set('contacts', $data);
   }

   public function add()
   {
     if ($this->request->is('post')) {
       $this->Contact->create();

     if ($this->Contact->save($this->request->data)) {
       $this->Session->setFlash(__('Your contact has been saved'));
       return $this->redirect(array('action' => 'index'));
     }

     $this->Session->setFlash(__('Unable to add your contact'));
    }
  }

  public function edit($id = false)
  {
    if (!$id) {
      throw new NotFoundException('Invalid contact id');
    }

    if ($this->request->is(array('post', 'put'))) {
      $this->Contact->id = $id;
      if ($this->Contact->save($this->request->data)) {
        $this->Session->setFlash(__('Your contact has been updated.'));
        return $this->redirect(array('action' => 'index'));
      }

      $this->Session->setFlash(__('Unable to update your contact'));
    }

    $contact = $this->Contact->findById($id);
    if (!$contact) {
      throw new NotFoundException("The contact with id '$id' doesn't exists");
    }

    if (!$this->request->data) {
      $this->request->data = $contact;
    }
  }

  public function delete($id)
  {
    if ($this->request->is('get')) {
      throw new MethodNotAllowedException();
    }

    $message = $this->Contact->delete($id) ? "The contact with id: $id has been deleted" :
      "The contact with id: $id has NOT been deleted";

    $this->Session->setFlash(__($message));
    return $this->redirect(array('action' => 'index'));
  }

  public function select()
  {
//  $this->Paginator->settings = $this->paginate;
    $this->set('contacts', $this->Paginator->paginate());
  }

  public function accept()
  {
    if ($this->request->is('post') && !empty($this->request->data['Accept'])) {
      $this->set('mails', $this->request->data['Accept']);
      $this->render('new');
    } else {
        $data = isset($this->data['contactsEmail']) ? $this->data['contactsEmail'] : array();
        $this->set('contactsEmails', $data );
    }
  }
}