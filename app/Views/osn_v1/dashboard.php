<?= view(OSN_VIEWPATH . '/components/head') ?>
<?= view(OSN_VIEWPATH . '/components/navbar') ?>

<div class="container-xxl admin-layout">
    <div class="row">
        <div class="col-md-8">
            <h4 class="head-pln-title">My Plans</h4>
            <div class="row-main-list">
                <?php
                if($userplans){
                    foreach ($userplans as $key => $value) {
                        echo view(OSN_VIEWPATH . '/components/product-card',$value);
                    }
                }else{
                    ?>
                    <p class="head-no-pln">You have not registered with any course!</p>
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row-list right-layout">
                <?php
                $ls = '';
                if (isset($user['username']) && !empty($user['username'])) {
                    $ls .= '<div class="user-row">Email: <span>' . $user['username'] . '</span></div>';
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
        </div>
    </div>
</div>


<?= view(OSN_VIEWPATH . '/components/footer') ?>