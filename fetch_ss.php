<?php

include 'model.php';

$model = new Model();

$rows = $model->fetch_ss();

echo json_encode($rows);