<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <?php $this->loadCss($this->css) ?>
    <title><?php echo $this->page ?> - Dynamo</title>
  </head>
  <body>
    <?php require_once 'assets/images/icons.svg' ?>
    <?php require $this->fichier ?>
    <script src="/assets/js/admin.js" charset="utf-8"></script>
    <?php $this->loadScript($this->script) ?>
  </body>
</html>
