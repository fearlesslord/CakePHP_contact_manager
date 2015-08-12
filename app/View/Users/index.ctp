<?php
/**
 * @var $this View
 */

echo $this->Html->link('Add user', array('action' => 'add'));
$paginator = $this->Paginator;

$tableHeaders = array(
  $paginator->sort('id', 'ID'),
  $paginator->sort('username', 'Username'),
  $paginator->sort('role', 'Role'),
  'Image'
);

echo "<table>";

  echo $this->Html->tableHeaders($tableHeaders);

  foreach($users as $user) {
    $tableCells = array(
      $user['User']['id'],
      $user['User']['username'],
      $user['User']['role'],
      $this->Html->link('Edit/View', array('action' => 'edit', $user['User']['id'])),
      $this->Form->postLink(
        'Delete',
        array('action' => 'delete', $user['User']['id']),
        array('confirm' => 'Are you sure?'))
    );
    echo $this->Html->tableCells($tableCells);
  }

echo "</table>";

//pagination menu

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

  echo $paginator->counter(
    ' Page {:page} of {:pages}, showing {:current} records out of
     {:count} total'
  );
  echo "</div>";