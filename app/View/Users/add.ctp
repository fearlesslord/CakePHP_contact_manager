<?php
/**
 * @var $this View
 */

?>
<div class="users form">
  <?php echo $this->Form->create('User', array('type' => 'file')); ?>
  <fieldset>
    <?php echo $this->Html->tag('legend', 'Add User');
    echo $this->Form->input('username');
    echo $this->Form->input('password');
    echo $this->Form->input('password2', array('type' => 'password', 'label' => 'Repeat password'));
    echo $this->Form->input('role', array(
      'options' => array('admin' => 'Admin', 'author' => 'Author')
    ));
    ?>
  </fieldset>
  <?php echo $this->Form->end('Submit'); ?>
</div>