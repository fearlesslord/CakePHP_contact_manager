<?php
/**
 * @var $this View
 */

echo "The emails:";
echo $this->Html->tag('h4', $mails['TO']);
echo "The subject:";
echo $this->Html->tag('h4', $mails['Subject']);
echo "The text:";
echo $this->Html->tag('h4', $mails['Text']);
