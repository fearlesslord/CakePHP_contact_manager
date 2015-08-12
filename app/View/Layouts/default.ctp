<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * @var $this View
 */
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('cake.generic');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
    echo $this->Html->script('jquery');
	?>
</head>

<body>
	<div id="container">
		<div id="header">
		  <h1> Contact Manager </h1>

      <h2>
        <?php
          $loggedIn = AuthComponent::user('id');
          $userName = AuthComponent::user('username');
          $welcome = $loggedIn ? 'Welcome '. $this->Html->tag('b', $userName) . ' ' : '';
          $action = $loggedIn  ? 'logout' : 'login';
          echo $loggedIn ? $this->Html->div('contacts',
                $this->Html->link('Contacts', array('controller' => 'contacts', 'action' => 'index'))) : false;
          echo $loggedIn ? $this->Html->div('users',
                $this->Html->link('Users', array('controller' => 'users', 'action' => 'index'))) : false;
          echo $this->Html->div('log',
            $welcome . $this->Html->link(ucfirst($action), array('controller' => 'users', 'action' => $action)));
        ?>
      </h2>
		</div>
		<div id="content">
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">

		</div>
	</div>
</body>
</html>
