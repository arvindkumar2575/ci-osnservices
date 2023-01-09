<div class="add-video container-fluid">
    <h3>Add Video Detail</h3>
    <form class="add-video-form" id="add-video-form">
        <div class="row">
            <?php
            $selected = 'selected';
            $selected_val = 0;
            if (isset($video['course_id']) && !empty($video['course_id']) && is_numeric($video['course_id'])) {
                $selected_val = $video['course_id'];
            }
            ?>
            <div class="form-group col-md-6">
                <label for="course_id">Course Name</label>
                <select id="course_id" class="form-control" name="course_id">
                    <option value="" <?= ($selected_val == 0) ? $selected : '' ?>>Select Course...</option>
                    <option value="1" <?= ($selected_val == 1) ? $selected : '' ?>>Extra Video</option>
                    <option value="2" <?= ($selected_val == 2) ? $selected : '' ?>>Basic</option>
                    <option value="3" <?= ($selected_val == 3) ? $selected : '' ?>>Advanced</option>
                </select>
            </div>

            <?php
            $selected_val = '';
            if (isset($video['title']) && !empty($video['title']) && is_string($video['title'])) {
                $selected_val = $video['title'];
            }
            ?>
            <div class="form-group col-md-6">
                <label for="title">Video Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="<?= $selected_val == '' ? '' : $selected_val ?>">
            </div>
        </div>

        <?php
        $selected_val = '';
        if (isset($video['url']) && !empty($video['url']) && is_string($video['url'])) {
            $selected_val = $video['url'];
        }
        ?>
        <div class="form-group">
            <label for="url">Video Url</label>
            <input type="text" name="url" class="form-control" id="url" placeholder="Url" value="<?= $selected_val == '' ? '' : $selected_val ?>" <?= $selected_val == '' ? '' : 'disabled' ?>>
        </div>

        <?php
        $selected_val = '';
        if (isset($video['description']) && !empty($video['description']) && is_string($video['description'])) {
            $selected_val = $video['description'];
        }
        ?>
        <div class="form-group">
            <label for="description">Video Description</label>
            <textarea type="text" name="description" class="form-control" id="description" placeholder="Description" rows="8"><?= $selected_val == '' ? '' : $selected_val ?></textarea>
        </div>
        <input type="hidden" name="form_type" value="ADD_VIDEO" />
        <?php
        $selected_val = '';
        if (isset($video['id']) && !empty($video['id']) && is_string($video['id'])) {
            $selected_val = $video['id'];
        }
        ?>
        <input type="hidden" name="id" value="<?= $selected_val == '' ? '' : $selected_val ?>" />
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</div>