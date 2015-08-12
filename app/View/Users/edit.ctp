<?php
/**
 * @var $this View
 */

  echo $this->Html->tag('h1', 'Edit User');

  echo $this->Form->create('User', array('type' => 'file'));
  echo $this->Form->input('username');
  echo $this->Form->input('password');
  echo $this->Form->input('role', array('options' =>
    array('admin' => 'Admin', 'author' => 'Author')));
  echo $this->Form->input('id', array('type' => 'hidden'));
  echo $this->Form->end('Save User');