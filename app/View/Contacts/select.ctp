<?php
/**
 * @var $this View
 */

echo $this->Html->script('contacts/selectAll');
echo $this->Html->div('add', $this->Html->link('Add Contact', array('action' => 'add')));
echo $this->Html->div('select', $this->Html->link('Select Contact', array('action' => 'select')));
echo '<br/>';

echo $this->Form->create('Contact', array('url' => array('controller' => 'contacts', 'action' => 'accept')));
$paginator = $this->Paginator;
$tableHeaders = array(
  '<label>'.'Select All'.$this->Form->checkbox('contacts', array('id' => 'select_all')).'</label>',
  $paginator->sort('firstname', 'Firstname'),
  $paginator->sort('lastname', 'Lastname'),
  $paginator->sort('email', 'Email'),
  'Bestphone'
);

echo '<fieldset>';
echo "<table>";
echo $this->Html->tableHeaders($tableHeaders);

foreach($contacts as $contact) {
  $tableCells = array(
    /*$this->Form->checkbox('contacts', array(
              'value' => $contact['Contact']['email'],
              'name' => 'contactEmail',
              'id' => $contact['Contact']['email'])),*/
    "<input type='checkbox' name='contactsEmail[]' value='{$contact['Contact']['email']}'",
    $contact['Contact']['firstname'],
    $contact['Contact']['lastname'],
    $contact['Contact']['email'],
    $contact['Contact']['bestphone']);

  echo $this->Html->tableCells($tableCells);
}

echo "</table>";
echo '</fieldset>';
echo $this->Form->submit();
//pagination menu
/*
echo "<div class='paging'>";
echo $paginator->first("First");

if($paginator->hasPrev()){
  echo $paginator->prev("Prev");
}

echo $paginator->numbers(array('modulus' => 2));

if($paginator->hasNext()){
  echo $paginator->next("Next");
}

echo $paginator->last("Last");
echo "</div>";*/