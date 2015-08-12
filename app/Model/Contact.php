<?php

class Contact extends AppModel
{
  public $validate = array(
    'firstname' => array('rule' => 'notEmpty'),
    'lastname'  => array('rule' => 'notEmpty'),
    'email'     => array(
      'rule' => 'email',
      'message' => 'Please enter a valid email'),
    'homephone' => array(
      'rule' => 'numeric',
      'allowEmpty' => true,
      'message' => 'Please enter a valid phone number'),
    'cellphone' => array(
      'rule' => 'numeric',
      'allowEmpty' => true,
      'message' => 'Please enter a valid phone number'),
    'workphone' => array(
      'rule' => 'numeric',
      'allowEmpty' => true,
      'message' => 'Please enter a valid phone number'),
  );

  public function beforeSave($options = array()) {
    $this->data['Contact']['user_id'] = AuthComponent::user('id');
  }
}