<?php

use App\Models\Common;

$common = new Common();
$courses = $common->getCourses();
$plans = $common->getPlans();
$videos = $common->getVideos();
// echo '<pre>';print_r($videos);die;


?>
<div class="form container-fluid">
    <div class="form-div">
    <div class="head">
        <h3><?= $heading ?></h3>
        <span class="close-form"><i class="fas fa-times" aria-hidden="true"></i></span>
    </div>
    <form class="<?=$type=='media'?$type.'-':''?>add-edit-form <?= $operation ?>" data-type="<?= $type ?>" id="<?=$type=='media'?$type.'-':''?>add-edit-form" enctype="multipart/form-data">

        <div class="row">


            <!--######################################################################################################################################################################################-->


            <?php
            if ($type=='users') {
                $selected_val = '';
                if (isset($username) && !empty($username)) {
                    $selected_val = $username;
                }
                ?>
                <div class="form-group col-md-6">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" id="username" placeholder="Username" value="<?=$selected_val?>"/>
                </div>


                <?php
                $selected_val = '';
                if (isset($user_type) && !empty($user_type)) {
                    $selected_val = $user_type;
                }
                ?>
                <div class="form-group col-md-6">
                    <label for="user_type">User Type</label>
                    <input type="text" name="user_type" class="form-control" id="user_type" placeholder="User Type" value="<?=$selected_val?>"/>
                </div>


                <?php
                $selected_val = '';
                if (isset($first_name) && !empty($first_name)) {
                    $selected_val = $first_name;
                }
                ?>
                <div class="form-group col-md-6">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name" value="<?=$selected_val?>"/>
                </div>


                <?php
                $selected_val = '';
                if (isset($last_name) && !empty($last_name)) {
                    $selected_val = $last_name;
                }
                ?>
                <div class="form-group col-md-6">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name" value="<?=$selected_val?>"/>
                </div>


                <?php
                $selected_val = '';
                if (isset($verified) && !empty($verified)) {
                    $selected_val = $verified;
                }elseif($operation=='edit' && $verified=='0'){
                    $selected_val='0';
                }
                ?>
                <div class="form-group col-md-6">
                    <label for="verified">Verified</label>
                    <select id="verified" class="form-control" name="verified">
                        <option value="0" >--Select Status--</option>
                        <option value="0" <?= ($selected_val == '0' ? 'selected' : '') ?>>InActive</option>
                        <option value="1" <?= ($selected_val == '1' ? 'selected' : '') ?>>Active</option>
                    </select>
                </div>

                <?php
                $selected_val = '';
                if (isset($status) && !empty($status)) {
                    $selected_val = $status;
                }elseif($operation=='edit' && $status=='0'){
                    $selected_val='0';
                }
                ?>
                <div class="form-group col-md-6">
                    <label for="status">Status</label>
                    <select id="status" class="form-control" name="status">
                        <option value="0" >--Select Status--</option>
                        <option value="0" <?= ($selected_val == '0' ? 'selected' : '') ?>>InActive</option>
                        <option value="1" <?= ($selected_val == '1' ? 'selected' : '') ?>>Active</option>
                    </select>
                </div>


                <?php
                if($operation=='add'){
                    ?>
                    <div class="form-group col-md-6">
                    <label for="password">Password</label>
                        <input type="text" name="password" class="form-control" id="password" placeholder="Password" value=""/>
                    </div>
                    <?php
                }
                ?>


                <?php
            }
            ?>


            <!--######################################################################################################################################################################################-->


            <?php
            if ($type=='courses') {
                $selected_val = '';
                if (isset($name) && !empty($name)) {
                    $selected_val = $name;
                }
                ?>
                <div class="form-group col-md-6">
                    <label for="name">Course Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Course Name" value="<?=$selected_val?>"/>
                </div>


                <?php
                $selected_val = '';
                if (isset($status) && !empty($status)) {
                    $selected_val = $status;
                }elseif($operation=='edit' && $status=='0'){
                    $selected_val='0';
                }
                ?>
                <div class="form-group col-md-6">
                    <label for="status">Status</label>
                    <select id="status" class="form-control" name="status">
                        <option value="0" >--Select Status--</option>
                        <option value="0" <?= ($selected_val == '0' ? 'selected' : '') ?>>InActive</option>
                        <option value="1" <?= ($selected_val == '1' ? 'selected' : '') ?>>Active</option>
                    </select>
                </div>

                <?php
                $selected_val = '';
                if (isset($url) && !empty($url)) {
                    $selected_val = $url;
                }
                ?>
                <div class="form-group col-md-12">
                    <label for="url">URL</label>
                    <input type="text" name="url" class="form-control" id="url" placeholder="Enter URL" value="<?=$selected_val?>"/>
                </div>


                <?php
                $selected_val = '';
                if (isset($description) && !empty($description)) {
                    $selected_val = $description;
                }
                ?>
                <div class="form-group col-md-12">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" id="description" placeholder="Description" rows="3"><?=$selected_val?></textarea>
                </div>


                <?php
            }
            ?>


            <!--######################################################################################################################################################################################-->


            <?php
            if ($type=='plans') {
                $selected_val = '';
                if (isset($name) && !empty($name)) {
                    $selected_val = $name;
                }
                ?>
                <div class="form-group col-md-6">
                    <label for="name">Plan Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Plan Name" value="<?=$selected_val?>"/>
                </div>


                <?php
                $selected_val = '';
                if (isset($status) && !empty($status)) {
                    $selected_val = $status;
                }elseif($operation=='edit' && $status=='0'){
                    $selected_val='0';
                }
                ?>
                <div class="form-group col-md-6">
                    <label for="status">Status</label>
                    <select id="status" class="form-control" name="status">
                        <option value="0" >--Select Status--</option>
                        <option value="0" <?= ($selected_val == '0' ? 'selected' : '') ?>>InActive</option>
                        <option value="1" <?= ($selected_val == '1' ? 'selected' : '') ?>>Active</option>
                    </select>
                </div>


                <?php
                $selected_val = '';
                if (isset($price) && !empty($price)) {
                    $selected_val = $price;
                }elseif($operation=='edit' && $price=='0'){
                    $selected_val='0';
                }
                ?>
                <div class="form-group col-md-6">
                    <label for="price">Price</label>
                    <input type="text" name="price" class="form-control" id="price" placeholder="Price" value="<?=$selected_val?>"/>
                </div>


                <?php
                $selected_val = '';
                if (isset($discount) && !empty($discount)) {
                    $selected_val = $discount;
                }elseif($operation=='edit' && $discount=='0'){
                    $selected_val='0';
                }
                ?>
                <div class="form-group col-md-6">
                    <label for="discount">Discount</label>
                    <input type="text" name="discount" class="form-control" id="discount" placeholder="Discount" value="<?=$selected_val?>"/>
                </div>


                <?php
                $selected_val = '';
                if (isset($description) && !empty($description)) {
                    $selected_val = $description;
                }
                ?>
                <div class="form-group col-md-12">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" id="description" placeholder="Description" rows="3"><?=$selected_val?></textarea>
                </div>


                <?php
            }
            ?>


            <!--######################################################################################################################################################################################-->
            

            <?php
            if ($type=='videos') {
                $selected_val = '';
                if (isset($url) && !empty($url)) {
                    $selected_val = $url;
                }
                ?>
                <div class="form-group col-md-6">
                    <label for="url">URL</label>
                    <input type="text" name="url" class="form-control" id="url" placeholder="Video URL" value="<?=$selected_val?>"/>
                </div>


                <?php
                $selected_val = '';
                if (isset($status) && !empty($status)) {
                    $selected_val = $status;
                }elseif($operation=='edit' && $status=='0'){
                    $selected_val='0';
                }
                ?>
                <div class="form-group col-md-6">
                    <label for="status">Status</label>
                    <select id="status" class="form-control" name="status">
                        <option value="0" >--Select Status--</option>
                        <option value="0" <?= ($selected_val == '0' ? 'selected' : '') ?>>InActive</option>
                        <option value="1" <?= ($selected_val == '1' ? 'selected' : '') ?>>Active</option>
                    </select>
                </div>


                <?php
                $selected_val = '';
                if (isset($title) && !empty($title)) {
                    $selected_val = $title;
                }
                ?>
                <div class="form-group col-md-12">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Video Title" value="<?=$selected_val?>"/>
                </div>


                <?php
                $selected_val = '';
                if (isset($description) && !empty($description)) {
                    $selected_val = $description;
                }
                ?>
                <div class="form-group col-md-12">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" id="description" placeholder="Description" rows="3"><?=$selected_val?></textarea>
                </div>


                <?php
            }
            ?>


            <!--######################################################################################################################################################################################-->


            <?php
            if (in_array($type,['ucpm'])) {
                $selected_val = '';
                if (isset($user_id) && !empty($user_id)) {
                    $user_detail = $common->get_single_row('users','id',$user_id);
                    $selected_val = $user_detail['username'];
                }
                ?>
                <div class="form-group col-md-12 filter-form">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" id="username" placeholder="Select Username" value="<?=$selected_val?>"/>
                    <!-- <input type="hidden" name="user_id" id="username_user_id" value=""/> -->
                    <div class="search-list">
                    </div>
                </div>



                <?php
                $selected_val = '';
                if (isset($course_id) && !empty($course_id)) {
                    $selected_val = $course_id;
                }
                ?>
                <div class="form-group col-md-6">
                    <label for="course_name">Course Name</label>
                    <select id="course_name" class="form-control" name="course_name">
                        <option value="">--Select Course--</option>
                        <?php
                        foreach ($courses as $key => $value) {
                        ?>
                            <option value="<?= $value['course_id'] ?>" <?= ($selected_val == $value['course_id'] ? 'selected' : '') ?>><?=$value['course_name']?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>



                <?php
                $selected_val = '';
                if (isset($plan_id) && !empty($plan_id)) {
                    $selected_val = $plan_id;
                }
                ?>
                <div class="form-group col-md-6">
                    <label for="plan_name">Plan Name</label>
                    <select id="plan_name" class="form-control" name="plan_name">
                        <option value="">--Select Plan--</option>
                        <?php
                        foreach ($plans as $key => $value) {
                        ?>
                            <option value="<?= $value['plan_id'] ?>" <?= ($selected_val == $value['plan_id'] ? 'selected' : '') ?>><?=$value['plan_name']?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>



                <?php
                $selected_val = '';
                if (isset($status) && !empty($status)) {
                    $selected_val = $status;
                }elseif($operation=='edit' && $status=='0'){
                    $selected_val='0';
                }
                ?>
                <div class="form-group col-md-6">
                    <label for="status">Status</label>
                    <select id="status" class="form-control" name="status">
                        <option value="0" <?= ($selected_val == '0' ? 'selected' : '') ?>>InActive</option>
                        <option value="1" <?= ($selected_val == '1' ? 'selected' : '') ?>>Active</option>
                    </select>
                </div>
                <?php
            }
            ?>


            <!--######################################################################################################################################################################################-->
            

            <?php
            if (in_array($type,['cpm'])) {
                $selected_val = '';
                if (isset($course_id) && !empty($course_id)) {
                    $selected_val = $course_id;
                }
                ?>
                <div class="form-group col-md-6">
                    <label for="course_name">Course Name</label>
                    <select id="course_name" class="form-control" name="course_name">
                        <option value="">--Select Course--</option>
                        <?php
                        foreach ($courses as $key => $value) {
                        ?>
                            <option value="<?= $value['course_id'] ?>" <?= ($selected_val == $value['course_id'] ? 'selected' : '') ?>><?=$value['course_name']?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <?php


                $selected_val = '';
                if (isset($plan_id) && !empty($plan_id)) {
                    $selected_val = $plan_id;
                }
                ?>
                <div class="form-group col-md-6">
                    <label for="plan_name">Plan Name</label>
                    <select id="plan_name" class="form-control" name="plan_name">
                        <option value="">--Select Plan--</option>
                        <?php
                        foreach ($plans as $key => $value) {
                        ?>
                            <option value="<?= $value['plan_id'] ?>" <?= ($selected_val == $value['plan_id'] ? 'selected' : '') ?>><?=$value['plan_name']?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <?php
            }
            ?>


            <!--######################################################################################################################################################################################-->


            <?php
            if (in_array($type,['cvm'])) {
                $selected_val = '';
                if (isset($course_id) && !empty($course_id)) {
                    $selected_val = $course_id;
                }
                ?>
                <div class="form-group col-md-6">
                    <label for="course_name">Course Name</label>
                    <select id="course_name" class="form-control" name="course_name">
                        <option value="">--Select Course--</option>
                        <?php
                        foreach ($courses as $key => $value) {
                        ?>
                            <option value="<?= $value['course_id'] ?>" <?= ($selected_val == $value['course_id'] ? 'selected' : '') ?>><?=$value['course_name']?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <?php


                $selected_val = '';
                if (isset($video_id) && !empty($video_id)) {
                    $selected_val = $video_id;
                }
                ?>
                <div class="form-group col-md-6">
                    <label for="video_title">Video Title</label>
                    <select id="video_title" class="form-control" name="video_title">
                        <option value="">--Select Video--</option>
                        <?php
                        foreach ($videos as $key => $value) {
                        ?>
                            <option value="<?= $value['id'] ?>" <?= ($selected_val == $value['id'] ? 'selected' : '') ?>><?=$value['title'].' ('.$value['url'].')'?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <?php
            }
            ?>


            <!--######################################################################################################################################################################################-->


            <?php
            if (in_array($type,['settings'])) {
                $selected_val = '';
                if (isset($s_id)) {
                    $selected_val = $s_setting_type;
                }
                ?>
                <div class="form-group col-md-6">
                    <label for="setting_type">Type</label>
                    <input type="text" name="setting_type" class="form-control" id="setting_type" placeholder="type" value="<?=$selected_val?>"/>
                </div>
                <?php

                

                $selected_val = '';
                if (isset($s_id)) {
                    $selected_val = $s_name;
                }
                ?>
                <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="<?=$selected_val?>"/>
                </div>
                <?php



                $selected_val = '';
                if (isset($s_id)) {
                    $selected_val = $s_display_name;
                }
                ?>
                <div class="form-group col-md-6">
                    <label for="display_name">Display Name</label>
                    <input type="text" name="display_name" class="form-control" id="display_name" placeholder="Display Name" value="<?=$selected_val?>"/>
                </div>
                <?php



                $selected_val = '';
                if (isset($s_id)) {
                    $selected_val = $s_priority;
                }
                ?>
                <div class="form-group col-md-6">
                    <label for="priority">Priority</label>
                    <input type="text" name="priority" class="form-control" id="priority" placeholder="Priority" value="<?=$selected_val?>"/>
                </div>
                <?php


                $selected_val = '';
                if (isset($s_id)) {
                    $selected_val = $s_value;
                }
                ?>
                <div class="form-group col-md-12">
                    <label for="value">Value</label><button type="button" class="btn btn-primary" id="enable_srte-editor">Enable Editor</button>
                    <textarea name="value" class="form-control srte-editor" id="value" placeholder="Value" rows="10"><?=$selected_val?></textarea>
                </div>
                <?php



            }
            ?>


            <!--######################################################################################################################################################################################-->


            <?php
            if (in_array($type,['media'])) {
                $selected_val = '';
                if (isset($m_id)) {
                    $selected_val = $m_media_type;
                }
                ?>
                <div class="form-group col-md-6">
                    <label for="media_type">File Type</label>
                    <select id="media_type" class="form-control" name="media_type">
                        <option value="" <?= ($selected_val == '' ? 'selected' : '') ?>>--Select Status--</option>
                        <option value="png" <?= ($selected_val == 'png' ? 'selected' : '') ?>>Image - Type : PNG</option>
                        <option value="jpg" <?= ($selected_val == 'jpg' ? 'selected' : '') ?>>Image - Type : JPG</option>
                        <option value="jpeg" <?= ($selected_val == 'jpeg' ? 'selected' : '') ?>>Image - Type : JPEG</option>
                    </select>
                </div>
                <?php



                $selected_val = '';
                if (isset($m_id)) {
                    $selected_val = $m_status;
                }
                ?>
                <div class="form-group col-md-6">
                    <label for="status">Status</label>
                    <select id="status" class="form-control" name="status">
                        <option value="0" >--Select Status--</option>
                        <option value="0" <?= ($selected_val == '0' ? 'selected' : '') ?>>InActive</option>
                        <option value="1" <?= ($selected_val == '1' ? 'selected' : '') ?>>Active</option>
                    </select>
                </div>
                <?php


                $selected_val = '';
                if (isset($m_id)) {
                    $selected_val = $m_name;
                }
                ?>
                <div class="form-group col-md-6 div-hidden">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="name" value="<?=$selected_val?>"/>
                </div>
                <?php


                $selected_val = '';
                if (isset($m_id)) {
                    $selected_val = $m_display_name;
                }
                ?>
                <div class="form-group col-md-6">
                    <label for="display_name">Display Name</label>
                    <input type="text" name="display_name" class="form-control" id="display_name" placeholder="display name" value="<?=$selected_val?>"/>
                </div>
                <?php


                $selected_val = '';
                if (isset($m_id)) {
                    $selected_val = '';
                }
                ?>
                <div class="form-group col-md-6">
                    <label for="media_file">Select File</label>
                    <div class="">
                        <input type="file" name="media_file" class="form-control" id="media_file" placeholder="file" value="<?=$selected_val?>"/>
                        <?php
                        if(isset($m_url)){
                        ?>
                            <div class="img mt-2">
                                <img height="40" height="40" src="<?=base_url($m_url)?>" />
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <?php



            }
            ?>


            <!--######################################################################################################################################################################################-->


        </div>



        <input type="hidden" name="type" value="<?=$type?>" />
        <input type="hidden" name="operation" value="<?=$operation?>" />
        <?php
        $hiddenInp = '';
        if (isset($user_id) && !empty($user_id) && is_numeric($user_id)) {
            $hiddenInp .= '<input type="hidden" name="user_id" value="' . $user_id . '" />';
        }elseif($type=='ucpm'){
            $hiddenInp .= '<input type="hidden" name="user_id" value="" />';
        }
        if (isset($course_id) && !empty($course_id) && is_numeric($course_id)) {
            $hiddenInp .= '<input type="hidden" name="course_id" value="' . $course_id . '" />';
        }
        if (isset($plan_id) && !empty($plan_id) && is_numeric($plan_id)) {
            $hiddenInp .= '<input type="hidden" name="plan_id" value="' . $plan_id . '" />';
        }
        if (isset($video_id) && !empty($video_id) && is_numeric($video_id)) {
            $hiddenInp .= '<input type="hidden" name="video_id" value="' . $video_id . '" />';
        }
        if (isset($ucpm_id) && !empty($ucpm_id) && is_numeric($ucpm_id)) {
            $hiddenInp .= '<input type="hidden" name="ucpm_id" value="' . $ucpm_id . '" />';
        }
        if (isset($s_id) && !empty($s_id) && is_numeric($s_id)) {
            $hiddenInp .= '<input type="hidden" name="s_id" value="' . $s_id . '" />';
        }
        if (isset($m_id) && !empty($m_id) && is_numeric($m_id)) {
            $hiddenInp .= '<input type="hidden" name="m_id" value="' . $m_id . '" />';
        }
        echo $hiddenInp;
        ?>


        <?php
        $btn_name = ucwords($operation=='add'?$operation:'save')
        ?>
        <button type="submit" class="<?= $operation ?>-ae-form btn btn-primary"><?= $btn_name ?></button>
    </form>
    </div>
</div>