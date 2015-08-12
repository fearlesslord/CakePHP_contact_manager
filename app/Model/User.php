<?php

App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel
{
  public $validate = array(
    'username' => array(
      'required' => array(
        'rule' => array('notEmpty'),
        'message' => 'A username is required'
      ),
      'alphaNumeric' => array(
        'rule'     => 'alphaNumeric',
        'required' => true,
        'message'  => 'Alphabets and numbers only'
      ),
      'between' => array(
        'rule'    => array('between', 4, 15),
        'message' => 'Between 4 to 15 characters'
      )
    ),
    'password' => array(
      'required' => array(
        'rule' => array('notEmpty'),
        'message' => 'A password is required'
      ),
      'minLength' => array(
        'rule'    => array('minLength', '8'),
        'message' => 'Minimum 8 characters long'
      )
    ),
    'password2' => array(
      'required' => array(
        'rule' => array('notEmpty'),
        'message' => 'repeat a password',
      ),
      'custom' => array(
        'rule' => array('CheckPasswordMatch'),
        'message' => 'Passwords do not match!',
      ),
      'minLength' => array(
        'rule'    => array('minLength', '8'),
        'message' => 'Minimum 8 characters long'
    )),
    'role' => array(
      'valid' => array(
        'rule' => array('inList', array('admin', 'author')),
        'message' => 'Please enter a valid role',
        'allowEmpty' => false
      )
    )
  );

  public function CheckPasswordMatch($data)
  {
    return $this->data['User']['password'] == $this->data['User']['password2'];
  }

  public function beforeSave($options = array()) {
    if (isset($this->data[$this->alias]['password'])) {
      $passwordHasher = new SimplePasswordHasher();
      $this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']);
    }
    return true;
  }

} 