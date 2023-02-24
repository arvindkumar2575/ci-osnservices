
<div class="row col-sm-12 product-cards">
    <?php
    if($cp){
        $counter=0;
        foreach ($cp as $key => $value) {
        ?>
                <div class="col-sm-<?=$course_len%2==0?'6':($course_len-1==$counter?'12':'6')?> product-card product-card-<?= $value['course_id'] ?>">
                    <div class="product-body">
                        <div class="first-sec">
                            <div class="product-details">
                                <div class="product-title"><?= $value['course_name'] ?></div>
                                <div class="product-desc-video-list">
                                    <div class="product-video-heading">Topics</div>
                                    <div class="product-video-dropdown">
                                        <div class="product-video-dropdown-menu"><?= $value['course_description'] ?></div>
                                        <ul class="product-video-dropdown-menu-ul">
                                            <li>video 1</li>
                                            <li>video 2</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="product-img">
                                <img src="<?= base_url('assets/images/excel-icon.png') ?>">
                            </div>
                        </div>
                        <div class="product-bottom-sec">
                            <div class="product-plan-selection">
                                <!-- <p>Select Plan</p> -->
                                <select name="plan_select">
                                    <option value="0">--Select Plan--</option>
                                    <?php
                                    foreach ($value['plans'] as $key1 => $value1) {
                                    ?>
                                            <option data-plan-price="<?= $value1['plan_price'] ?>" data-plan-discount="<?= $value1['plan_discount'] ?>" data-plan-duration="<?= $value1['plan_duration'] ?>" value="<?= $value1['plan_id'] ?>"><?= $value1['plan_name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="product-price">
                            </div>
                            <div class="product-btn">
                                <a href="javascript:void(0)"><button data-course-id="<?= $value['course_id'] ?>" class="btn btn-orange btn-buy-now btn-register">Register</button></a>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
        $counter++;
        }
    }else{
        ?>
        <p class="head-no-pln text-center">Excel Courses available soon!</p>
        <?php
    }
    ?>
</div>