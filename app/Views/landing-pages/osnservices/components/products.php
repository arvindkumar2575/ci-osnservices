<div class="products">
    <div class="alternate-white">
        <div class="container product content">
            <h3 class="product-section-heading">Courses</h3>
            <?php
            if (FREE_EXCEL_PLAY) {
                echo view(OSNSERVICES_VIEWPATH . '/components/product-section-free');
            }
            if (PAID_EXCEL_PLAY) {
                echo view(OSNSERVICES_VIEWPATH . '/components/product-section');
            }
            ?>
        </div>
    </div>
</div>