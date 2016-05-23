<?php

require_once 'app/Vue.php';
require_once 'model/User.php';
require_once 'model/Forum.php';

/**
 *
 */
class ForumController
{
  private $user;
  private $forum;

  function __construct()
  {
    $this->user = new User();
    $this->forum = new Forum();
  }

  public function forum()
  {
    $topics = $this->forum->getTopics()->fetchAll();
    $vue = new Vue("Forum", "Forum");
    $vue->setTitle('Forum');
    $vue->render([
      'topics' => $topics
    ]);
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
    $discussions = $this->forum->getDiscussions()->fetchAll();
    $vue = new Vue("Topic", "Forum");
    $vue->setTitle('Topic');
    $vue->render([
      'discussions' => $discussions
    ]);
  }

}
