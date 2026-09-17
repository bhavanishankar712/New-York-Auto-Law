<div class="page_bnr">
    <div class="container">
        <div class="page_title">
            <h1 class="banr-heading">
                <?php
                if (is_home()) {
                    // Blog Page
                    echo get_the_title(get_option('page_for_posts'));
                } elseif (is_search()) {
                    // Search Page
                    echo 'Search Results for: ' . get_search_query();
                } elseif (is_404()) {
                    // 404 Page
                    echo '404 - Page Not Found';
                } elseif (is_archive()) {
                    // Archive Pages
                    the_archive_title();
                } else {
                    // Default Pages & Posts
                    the_title();
                }
                ?>
            </h1>

            <div class="inrpg-breadcrumbs">
                <?php
                if (function_exists('yoast_breadcrumb')) {
                    yoast_breadcrumb();
                }
                ?>
            </div>
        </div>
    </div>
</div>