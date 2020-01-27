<?php
//var_dump($model);
echo "
<div class=\"card col-md-4\" style=\" padding: 5px ; \">
  <div class=\"card-block\" style=\" border: 1px solid black; padding: 10px 15px; \" >
    <h4 class=\"card-title\">$model->title</h4>
    <p class=\"card-text\">$model->description</p>
    <p class=\"card-text\">Последний срок: $model->deadline</p>
    <p class=\"card-text\">Статус $model->status_id</p>
    <a href=\"#\" class=\"btn btn-primary\">Подробней</a>
  </div>
</div>
";
