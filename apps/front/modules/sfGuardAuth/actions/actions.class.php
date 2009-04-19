<?php

require_once(sfConfig::get('sf_plugins_dir').'/sfDoctrineGuardPlugin/modules/sfGuardAuth/lib/BasesfGuardAuthActions.class.php');

class sfGuardAuthActions extends BasesfGuardAuthActions
{
  public function executeSignin($request)
  {
    $signinUrl = sfConfig::get('app_sf_guard_plugin_success_signin_url', '@homepage');
    $user = $this->getUser();
    if ($user->isAuthenticated())
    {
      return $this->redirect($signinUrl);
    }

    parent::executeSignin($request);
  }
}
