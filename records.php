<?php

include 'model.php';

$model = new Model();

if (isset($_POST['md']) && isset($_POST['cl']) && !empty($_POST['md']) && !empty($_POST['cl'])) {
    $md = $_POST['md'];
    $cl = $_POST['cl'];

    $rows = $model->fetch_filter($md, $cl);
} else if (isset($_POST['md']) && empty($_POST['cl'])) {
    $md = $_POST['md'];

    $rows = $model->fetch_md_filter($md);
} else if (empty($_POST['md']) && isset($_POST['cl'])) {
    $cl = $_POST['cl'];

    $rows = $model->fetch_cl_filter($cl);
} else {
    $rows = $model->fetch();
}

echo json_encode($rows);