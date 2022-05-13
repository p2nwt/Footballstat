<?php

include 'model.php';

$model = new Model();

$rows = $model->fetch_m();

echo json_encode($rows);