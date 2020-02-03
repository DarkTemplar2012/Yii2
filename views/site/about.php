<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;

$key = 'about';
if ($this->beginCache($key, [
  'duration' => 20,
  'variations' => [Yii::$app->language]
])
) {
  ?>
    <div class="site-about">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            This is the About page. You may modify the following file to customize its content:
        </p>

        <code><?= __FILE__ ?></code>
    </div>

  <?php

  $this->endCache();
}

?>

