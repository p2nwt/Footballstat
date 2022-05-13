<?php

include 'model.php';

$model = new Model();

$rows = $model->fetch_com();

echo json_encode($rows);