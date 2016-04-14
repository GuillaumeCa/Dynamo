<?php

require_once 'app/Vue.php';
require_once 'model/User.php';

/**
 *
 */
class ForumController
{
  private $user;

  function __construct()
  {
    $this->user = new User();
  }

  public function forum()
  {
    $vue = new Vue("Forum", "Forum");
    $vue->setTitle('Forum');
    $vue->render();
  }
  public function forumDiscussion()
  {
    $vue = new Vue("ForumDiscussion", "Forum");
    $vue->setTitle('ForumDiscussion');
    $vue->render();
  }
  public function forumNewDiscussion()
  {
    $vue = new Vue("ForumNewDiscussion", "Forum");
    $vue->setTitle('ForumNewDiscussion');
    $vue->render();
  }
  public function topic()
  {
    $vue = new Vue("Topic", "Forum");
    $vue->setTitle('Topic');
    $vue->render();
  }

}
