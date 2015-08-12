<?php
/**
 *
 * PHP 5
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 */

/* display message saved in session if any */

echo $this->Session->flash();
?>
<div>
  <div class="images-form">
    <?php echo $this->Form->create('Image', array('type' => 'file')); ?>
    <fieldset>
      <legend><?php echo __('Add Image'); ?></legend>
      <?php

      echo $this->Form->input('image', array('type' => 'file'));
      ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>

  </div>
  <div class="image-display">
    <?php

    //if is set imageName show uploaded picture

    if(isset($imageName)) {
      echo $this->Html->image('/img/uploads/' . $imageName, array('alt' => 'uploaded image'));
    }
    ?>
  </div>
</div>
