<?= view(OSN_VIEWPATH . '/components/head') ?>
<?= view(OSN_VIEWPATH . '/components/navbar') ?>


<div class="container-xxl admin-layout">
    <?php /*
    // checking two col in dashboard & admin page
    ?>
    <div class="row">
        <div class="w-250px">
            <li>List 1</li>
            <li>List 1</li>
            <li>List 1</li>
            <li>List 1</li>
        </div>
        <div class="admin-content col-sm-12">
            <div>content</div>
        </div>
    </div>
    <?php
    */ ?>
    <div class="row">
        <div class="col-md-8">


            <div class="row-main-list">
                <div class="head">
                    <h5>Courses</h5>
                    <button class="add btn btn-primary admin-btn-add" type="button" data-dl="courses"><i class="fas fa-plus"></i></button>
                </div>
                <div>
                    <?php
                    foreach ($courses as $key => $value) {
                    ?>
                        <li class="ls">
                            <button class="edit btn btn-success admin-btn-edit" type="button" data-dl="courses" data-id="<?= $value['course_id'] ?>"><i class="fas fa-edit"></i></button>
                            <button class="delete btn btn-danger admin-btn-delete" type="button" data-dl="courses" data-id="<?= $value['course_id'] ?>"><i class="fas fa-solid fa-trash"></i></button>
                            <span><?= $value['course_id'] . ' <i class="fas fa-solid fa-arrow-right"></i> ' . $value['course_name']. ' <i class="fas fa-solid fa-arrow-right"></i> ' . $value['course_url']. ' <i class="fas fa-solid fa-arrow-right"></i> ' . $value['course_status'] ?></span>
                        </li>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="row-main-list">
                <div class="head">
                    <h5>Plans</h5>
                    <button class="add btn btn-primary admin-btn-add" type="button" data-dl="plans"><i class="fas fa-plus"></i></button>
                </div>
                <div>
                    <?php
                    foreach ($plans as $key => $value) {
                    ?>
                        <li class="ls">
                            <button class="edit btn btn-success admin-btn-edit" type="button" data-dl="plans" data-id="<?= $value['plan_id'] ?>"><i class="fas fa-edit"></i></button>
                            <button class="delete btn btn-danger admin-btn-delete" type="button" data-dl="plans" data-id="<?= $value['plan_id'] ?>"><i class="fas fa-solid fa-trash"></i></button>
                            <span><?= $value['plan_id'] . ' <i class="fas fa-solid fa-arrow-right"></i> ' . $value['plan_name'].' (Rs.'.$value['plan_price'].'-'.$value['plan_discount'].'%)'. ' <i class="fas fa-solid fa-arrow-right"></i> ' . $value['plan_status'] ?>
                        </li>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="row-main-list">
                <div class="head">
                    <h5>Videos</h5>
                    <button class="add btn btn-primary admin-btn-add" type="button" data-dl="videos"><i class="fas fa-plus"></i></button>
                </div>
                <div>
                    <?php
                    foreach ($videos as $key => $value) {
                    ?>
                        <li class="ls">
                            <button class="edit btn btn-success admin-btn-edit" type="button" data-dl="videos" data-id="<?= $value['id'] ?>"><i class="fas fa-edit"></i></button>
                            <button class="delete btn btn-danger admin-btn-delete" type="button" data-dl="videos" data-id="<?= $value['id'] ?>"><i class="fas fa-solid fa-trash"></i></button>
                            <span><?= $value['id'] . ' <i class="fas fa-solid fa-arrow-right"></i> ' . $value['title'] . ' (' . $value['url'] . ') <i class="fas fa-solid fa-arrow-right"></i> ' . ($value['status']=='1'?'1':'0') ?></span>
                        </li>
                    <?php
                    }
                    ?>
                </div>
            </div>




            <div class="row-main-list">
                <div class="head">
                    <h5>Course Plan Mapping</h5>
                    <button class="add btn btn-primary admin-btn-add" type="button" data-dl="cpm"><i class="fas fa-plus"></i></button>
                </div>
                <div>
                    <?php
                    foreach ($cpdetails as $key => $value) {
                    ?>
                        <li class="ls">
                            <button class="delete btn btn-danger admin-btn-delete" type="button" data-dl="cpm" data-id="<?= $value['course_id'] . ':' . $value['plan_id'] ?>"><i class="fas fa-solid fa-trash"></i></button>
                            <span><?= $value['course_name'] . '  <i class="fas fa-solid fa-arrow-right"></i>  ' . $value['plan_name'] ?></span>
                        </li>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="row-main-list">
                <div class="head">
                    <h5>Course Videos Mapping</h5>
                    <button class="add btn btn-primary admin-btn-add" type="button" data-dl="cvm"><i class="fas fa-plus"></i></button>
                </div>
                <div>
                    <?php
                    foreach ($cvdetails as $key => $value) {
                    ?>
                        <li class="ls">
                            <button class="delete btn btn-danger admin-btn-delete" type="button" data-dl="cvm" data-id="<?= $value['course_id'] . ':' . $value['video_id'] ?>"><i class="fas fa-solid fa-trash"></i></button>
                            <span><?= '(' . $value['course_id'] . ')' . $value['course_name'] . ' <i class="fas fa-solid fa-arrow-right"></i> ' . '(' . $value['video_id'] . ')' . $value['video_title'] ?></span>
                        </li>
                    <?php
                    }
                    ?>
                </div>
            </div>
           
            <div class="row-main-list">
                <div class="head">
                    <h5>Users</h5>
                    <button class="add btn btn-primary admin-btn-add" type="button" data-dl="users"><i class="fas fa-plus"></i></button>
                </div>
                <div>
                    <?php
                    foreach ($users as $key => $value) {
                    ?>
                        <li class="ls">
                            <button class="edit btn btn-success admin-btn-edit" type="button" data-dl="users" data-id="<?= $value['id'] ?>"><i class="fas fa-edit"></i></button>
                            <span><?= $value['id'] . ' <i class="fas fa-solid fa-arrow-right"></i> ' . $value['first_name'] . ' ' . $value['last_name'] . ' (' . $value['username'] . ') <i class="fas fa-solid fa-arrow-right"></i> ' . ($value['verified'] == '1' ? '1' : '0') . '-' . $value['verification_code'] . ' <i class="fas fa-solid fa-arrow-right"></i> ' . ($value['status'] == '1' ? 'Active' : 'InActive') . '-' . $value['modified_at'] ?></span>
                        </li>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="row-main-list">
                <div class="head">
                    <h5>User Course Plan Mapping</h5>
                    <button class="add btn btn-primary admin-btn-add" type="button" data-dl="ucpm"><i class="fas fa-plus"></i></button>
                </div>
                <div>
                    <?php
                    foreach ($ucpdetails as $key => $value) {
                        $start_date = date('d-m-Y', strtotime($value['start_date']));
                        $end_date = date('d-m-Y', strtotime($value['end_date']));
                    ?>
                        <li class="ls">
                            <button class="edit btn btn-success admin-btn-edit" type="button" data-dl="ucpm" data-id="<?= $value['ucpm_id'].':'.$value['user_id'].':'.$value['plan_id'].':'.$value['course_id'] ?>"><i class="fas fa-edit"></i></button>
                            <span><?= $value['ucpm_id'].' <i class="fas fa-solid fa-arrow-right"></i> '.'('.$value['user_id'].') ' .  $value['name'] . ' <i class="fas fa-solid fa-arrow-right"></i> ' . $value['username'] . ' <i class="fas fa-solid fa-arrow-right"></i> ' . $value['course_name'] . ' <i class="fas fa-solid fa-arrow-right"></i> ' . $value['plan_name']. ' <i class="fas fa-solid fa-arrow-right"></i> (' . $start_date . ' - ' . $end_date . ') <i class="fas fa-solid fa-arrow-right"></i> ' . $value['ucpm_status'] ?></span>
                        </li>
                    <?php
                    }
                    ?>
                </div>
            </div>

            <div class="row-main-list">
                <div class="head">
                    <h5>Settings</h5>
                    <button class="add btn btn-primary admin-btn-add" type="button" data-dl="settings"><i class="fas fa-plus"></i></button>
                </div>
                <div>
                    <?php
                    foreach ($settings as $key => $value) {
                    ?>
                        <li class="ls">
                            <button class="edit btn btn-success admin-btn-edit" type="button" data-dl="settings" data-id="<?= $value['id'] ?>"><i class="fas fa-edit"></i></button>
                            <button class="delete btn btn-danger admin-btn-delete" type="button" data-dl="settings" data-id="<?= $value['id'] ?>"><i class="fas fa-solid fa-trash"></i></button>
                            <span><?= $value['id'].' <i class="fas fa-solid fa-arrow-right"></i> '.$value['setting_type'].'<i class="fas fa-solid fa-arrow-right"></i> '.$value['display_name'].'('.$value['name'].')' ?></span>
                        </li>
                    <?php
                    }
                    ?>
                </div>
            </div>
            

            <div class="row-main-list">
                <div class="head">
                    <h5>Media</h5>
                    <button class="add btn btn-primary admin-btn-add" type="button" data-dl="media"><i class="fas fa-plus"></i></button>
                </div>
                <div>
                    <?php
                    foreach ($media as $key => $value) {
                    ?>
                        <li class="ls">
                            <button class="edit btn btn-success admin-btn-edit" type="button" data-dl="media" data-id="<?= $value['id'] ?>"><i class="fas fa-edit"></i></button>
                            <button class="delete btn btn-danger admin-btn-delete" type="button" data-dl="media" data-id="<?= $value['id'] ?>"><i class="fas fa-solid fa-trash"></i></button>
                            <span><?= $value['id'].' <i class="fas fa-solid fa-arrow-right"></i> '.$value['media_type'].'<i class="fas fa-solid fa-arrow-right"></i> '.$value['display_name'].'('.$value['name'].') <i class="fas fa-solid fa-arrow-right"></i> '.$value['status'] ?></span>
                        </li>
                    <?php
                    }
                    ?>
                </div>
            </div>



            <div class="row-main-list">
                <div class="head">
                    <h5>Contact Form Data</h5>
                </div>
                <div>
                    <?php
                    foreach ($contactdetails as $key => $value) {
                    ?>
                        <li class="ls">
                            <span><?= $value['id'] . ' <i class="fas fa-solid fa-arrow-right"></i> ' . $value['first_name'] . ' ' . $value['last_name'] . '-(' . $value['email_id'] . ' | ' . $value['mobile_no'] . ') <i class="fas fa-solid fa-arrow-right"></i> Contact Reason : ' . $value['reason_options'] . ', ' . $value['default_message'] . ', ' . $value['itr_options'] . ' <i class="fas fa-solid fa-arrow-right"></i> ' . $value['created_at'] ?></span>
                        </li>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row-list right-layout">
                <?php
                $ls = '';
                if (isset($user['username']) && !empty($user['username'])) {
                    $ls .= '<div class="user-row">Email: <span>' . $user['username'] . '</span></div>';
                }
                if (isset($user['user_type']) && !empty($user['user_type'])) {
                    $ls .= '<div class="user-row">User Type: <span>' . ucwords($user['user_type']) . '</span></div>';
                } else {
                    $ls .= '<div class="user-row">User Type: <span>Learner</span></div>';
                }
                if (isset($user['first_name']) && !empty($user['first_name'])) {
                    $ls .= '<div class="user-row">First Name: <span>' . ucwords($user['first_name']) . '</span></div>';
                }
                if (isset($user['last_name']) && !empty($user['last_name'])) {
                    $ls .= '<div class="user-row">Last Name: <span>' . ucwords($user['last_name']) . '</span></div>';
                }
                echo $ls;
                ?>
            </div>
            <?php /* <div class="row-list right-layout mt-2">
                <h5 class="user-row head">Courses Portal</h5>
                <div class="user-row">
                    <a href="<?= base_url("dashboard/excel-play") ?>">Excel Play</a>
                </div>
            </div> */ ?>
        </div>
    </div>
</div>


<div id="ae-form" class="add-form-popup-modal" style="display: none;">
</div>


<?= view(OSN_VIEWPATH . '/components/footer') ?>