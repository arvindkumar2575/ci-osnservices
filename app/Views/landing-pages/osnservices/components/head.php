<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?=isset($description)&&!empty($description)?$description:""?>">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title><?=(isset($title)&&!empty($title))?$title.' | OSN Services':'OSN Services'?></title>

    <link rel="canonical" href="<?=current_url()?>">

    <!-- bootstrap minified css  -->
    <link href="<?= base_url(COMMON_ASSETS.'/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url(COMMON_ASSETS.'/summernotejs/summernote.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url(COMMON_ASSETS.'/css/common.css?v=2') ?>" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?= base_url(OSNSERVICES_ASSETS.'/css/osnservices.css?v=2') ?>" rel="stylesheet">
</head>

<body>