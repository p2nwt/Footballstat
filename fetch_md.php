<?php

include 'model.php';

$model = new Model();

$rows = $model->fetch_md();

echo json_encode($rows);