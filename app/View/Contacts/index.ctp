 <?php
/**
* @var $this View
*/

  echo $this->Html->div('add', $this->Html->link('Add Contact', array('action' => 'add')));
  echo $this->Html->div('select', $this->Html->link('Select Contact', array('action' => 'select')));
  echo $this->Html->tag('br');

  $paginator = $this->Paginator;

  $tableHeaders = array(
    $paginator->sort('firstname', 'Firstname'),
    $paginator->sort('lastname', 'Lastname'),
    $paginator->sort('email', 'Email'),
    'Bestphone'
  );

  echo "<table>";
    echo $this->Html->tableHeaders($tableHeaders);
    foreach($contacts as $contact) {
      $bestphone = !empty($contact['Contact']['bestphone']) ? $contact['Contact'][$contact['Contact']['bestphone']] : '';

      $tableCells = array(
        $contact['Contact']['firstname'],
        $contact['Contact']['lastname'],
        $contact['Contact']['email'],
        $bestphone,
        $this->Html->link('Edit/View', array('action' => 'edit', $contact['Contact']['id'])),
        $this->Form->postLink(
          'Delete',
          array('action' => 'delete', $contact['Contact']['id']),
          array('confirm' => 'Are you sure?')));
      echo $this->Html->tableCells($tableCells);
    }

  echo "</table>";

//pagination menu

  echo "<div class='paging'>";
  echo $paginator->first("First");

  if($paginator->hasPrev()){
    echo $paginator->prev("Prev");
  }

  echo $paginator->numbers(array(
    'modulus' => 2,
//    'first' => 2, 'last' => 2
  ));

  if($paginator->hasNext()){
    echo $paginator->next("Next");
  }

  echo $paginator->last("Last");

  echo $paginator->counter(
    ' Page {:page} of {:pages}, showing {:current} records out of
     {:count} total'
  );
  echo "</div>";