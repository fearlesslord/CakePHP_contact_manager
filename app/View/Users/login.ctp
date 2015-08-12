<?php
/**
 * @var $this View
 */
?>

<div class="users form">
  <?php echo $this->Session->flash('auth'); ?>
  <?php echo $this->Form->create('User'); ?>
  <fieldset>
  <?php echo $this->Html->tag('legend', 'Please enter your username and password');
    echo $this->Form->input('username');
    echo $this->Form->input('password');
    ?>
  </fieldset>
  <?php echo $this->Form->end('Login'); ?>
</div>