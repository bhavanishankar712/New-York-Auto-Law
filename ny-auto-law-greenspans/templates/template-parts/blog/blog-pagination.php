<?php
global $wp_query;

$current = max(1, get_query_var('paged'));
$total = $wp_query->max_num_pages;

if ($total > 1):
    ?>

    <nav class="custom-pagination">

        <!-- Previous -->
            <?php if ($current > 1): ?>
            <div class="page-button page-prev">
                <a href="<?php echo esc_url(get_pagenum_link($current - 1)); ?>">
                    &#8249;
                </a>
            </div>
            <?php endif; ?>

        <!-- Current / Total -->
        <div class="page-button page-count">
                <?php echo esc_html($current); ?> of <?php echo esc_html($total); ?>
        </div>

        <!-- Next -->
            <?php if ($current < $total): ?>
            <div class="page-button page-next">
                <a href="<?php echo esc_url(get_pagenum_link($current + 1)); ?>">
                    &#8250;
                </a>
            </div>
            <?php endif; ?>

    </nav>

<?php endif; ?>