<?php
/**
 * @var $this View
 */

echo $this->Html->tag('h1','Edit Contact');
echo $this->Form->create('Contact');
echo $this->Form->input('lastname');
echo $this->Form->input('firstname');
echo $this->Form->input('email', array('type' => 'email'));
$options = array(
  'homephone' => $this->Form->input('homephone'),
  'workphone' => $this->Form->input('workphone'),
  'cellphone' => $this->Form->input('cellphone')
);
$attributes = array(
  'value' => $this->data['Contact']['bestphone'],
  'label' => true,
  'type' => 'radio',
  'legend' => false,
  'options' => $options
);

echo $this->Form->input('bestphone', $attributes);
echo $this->Form->input('address1', array('label' => 'Address 1'));
echo $this->Form->input('address2', array('label' => 'Address 2'));
echo $this->Form->input('city');
echo $this->Form->input('state');
echo $this->Form->input('zip');
echo $this->Form->input('country');

echo "<label for='ContactBirthdateDay'>Birthday</label>";
echo  $this->Form->dateTime('birthdate', 'DMY', false, array(
  'minYear' => date('Y') - 50,
  'maxYear' => date('Y') - 0));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Post');