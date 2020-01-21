<?php
//var_dump($data);
foreach ($data as $val) { ?>
    <div><?= $val->id ?></div>
    <div><?= $val->title ?></div>
    <div><?= $val->description ?></div>
    <div><?= $val->deadline ?></div>


<? }