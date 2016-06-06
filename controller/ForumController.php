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

  public function forumDiscussion($disc)
  {
    $disc = $this->forum->getDisc($disc);
    $topic = $this->forum->getTopicName($disc->id_topic);
    $discussions = $this->forum->getMessages($disc->id)->fetchAll();
    $photo = $this->user->getProfilePhoto($_SESSION['auth']->id);
    $this->forum->creerCommentaire($disc->id);

    $vue = new Vue("ForumDiscussion", "Forum");
    $vue->setTitle('ForumDiscussion');
    $vue->render([
      "discName" => $disc->titre,
      "topicName" => $topic,
      "discussions" => $discussions,
      "photo" => $photo
    ]);
  }

  public function forumNewDiscussion($topic)
  {
    $topicName = $this->forum->getTopicName($topic);
    $this->forum->creerDiscussion($topic);
    $vue = new Vue("ForumNewDiscussion", "Forum");
    $vue->setTitle('ForumNewDiscussion');
    $vue->render([
      'topicName' => $topicName,
      'topic' => $topic
    ]);
  }

  public function topic($topic)
  {
    $discussions = $this->forum->getDiscussions($topic)->fetchAll();
    $topicName = $this->forum->getTopicName($topic);

    $vue = new Vue("Topic", "Forum");
    $vue->setTitle('Topic');
    $vue->render([
      'topicName' => $topicName,
      'discussions' => $discussions,
      'topic' => $topic
    ]);
  }

}
