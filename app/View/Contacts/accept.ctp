<?php
/**
 * @var $this View
 */

  $email = '';
  foreach ($contactsEmails as $contactsEmail) {
    $email .=  $contactsEmail.', ';
  }

  echo $this->Form->create('Accept', array('url' => array('controller' => 'contacts', 'action' => 'accept')));
  echo $this->Form->input('TO', array('rows' => '10', 'value' => $email
  ));
  echo $this->Form->input('Subject');
  echo $this->Form->input('Text', array('rows' => '3'));
  echo $this->Form->end('Sent');