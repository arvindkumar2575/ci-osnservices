<?php
use App\Libraries\Utilslib;

$utilslib = new Utilslib();
$cp = $utilslib->get_course_plan_details();
// echo '<pre>';print_r($cp);die;

$course_len = count($cp);
// echo $course_len%2;die;

//if($course_len>0){
?>
<div class="products">
    <div class="alternate-white">
        <div class="container product content">
            <h3 class="product-section-heading">Courses</h3>
            <?php
            if (FREE_EXCEL_PLAY) {
                echo view(OSNSERVICES_VIEWPATH . '/components/product-section-free');
            }
            if (PAID_EXCEL_PLAY) {
                echo view(OSNSERVICES_VIEWPATH . '/components/product-section',['cp'=>$cp,'course_len'=>$course_len]);
            }
            ?>
        </div>
    </div>
</div>
<?php
//}
?>