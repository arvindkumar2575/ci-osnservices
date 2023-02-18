<div data-course-id="<?= $course_id ?>" data-plan-id="<?= $plan_id ?>" class="product-row">
    <?php
    $start_date = date('d-m-Y', strtotime($start));
    $end_date = date('d-m-Y', strtotime($end));
    ?>
    <div class="first-row">
        <a class="fw-bold text-decoration-none" href="<?= !$status ? '' : base_url("dashboard/" . $course_url . '?c=' . $course_id . '&p=' . $plan_id) ?>"><?= $course_name ?></a>
        <span class="plan-date-detail">
            <span class="fw-bold">Plan End:</span>
            <span><?= $end_date ?></span>
        </span>
    </div>
    <div class="middle-row">
        Plan Details
    </div>
    <div class="plan-price-detail">
        <span><?= $plan_name . ' Plan' ?></span>
    </div>
    <?php
    if (!($status && $lock_status)) { 
    ?>
        <div class="pd-locked">
            <div class="pd-locked-icon">
                <span><i class="fas fa-lock px-1"></i>Locked</span>
            </div>
        </div>
    <?php
    }
    ?>
</div>