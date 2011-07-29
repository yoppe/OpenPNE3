<?php

$_app = 'pc_frontend';
$_env = 'test';

if (!isset($fixture))
{
  $fixture = 'common';
}

$configuration = ProjectConfiguration::getApplicationConfiguration($_app, $_env, true);
new sfDatabaseManager($configuration);

$task = new sfDoctrineBuildTask($configuration->getEventDispatcher(), new sfFormatter());
$task->setConfiguration($configuration);
$task->run(array(), array(
  'no-confirmation' => true,
  'db'              => true,
  'and-load'        => dirname(__FILE__).'/../fixtures/'.$fixture,
  'application'     => $_app,
  'env'             => $_env,
));
