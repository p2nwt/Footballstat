<?php

include 'model.php';

$model = new Model();

$rows = $model->fetch_cl();

echo json_encode($rows);