<?php

// echo "<pre>";print_r($leads);die;

?>

<?= $this->extend(MYDASHBOARD_VIEW . '/layouts/mydashboard') ?>

<?= $this->section("content") ?>


<div class="container-fluid px-4">
    <h1 class="mt-3">ExcelPlay</h1>

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <span>
                <i class="fas fa-table me-1"></i>
                Leads
            </span>
        </div>
        <div class="excelplay-list">
            <div class="tab">
                <button class="tablinks active">London</button>
                <button class="tablinks">Paris</button>
                <button class="tablinks">Tokyo</button>
            </div>
            <div class="tabcontent">
                <div class="content active">
                    <h3>London</h3>
                    <p>London is the capital city of England.</p>
                </div>
                <div class="content">
                    <h3>Paris</h3>
                    <p>Paris is the capital of France.</p>
                </div>
                <div class="content">
                    <h3>Tokyo</h3>
                    <p>Tokyo is the capital of Japan.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>