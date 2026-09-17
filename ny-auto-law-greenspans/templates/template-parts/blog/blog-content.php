<?php // Blogroll Content 
$post_date = get_the_date('M j, Y');
global $i;
?>

<article>

    <div class="post-item">
        <div class="in-post-image">
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                <?php if (has_post_thumbnail()) { ?>
                    <img class="w-full" src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title_attribute(); ?>"
                        width="578" height="411" />
                <?php } else { ?>
                    <img class="w-full"
                        src="<?php echo get_template_directory_uri(); ?>/assets/images/blog-post-default-img2.webp"
                        alt="<?php the_title(); ?>" width="578" height="411" />
                <?php } ?>
            </a>
        </div>

        <div class="post-text">
            <div class="post-author">By: <?php the_author(); ?></div>
            <h2 class="post-title"> <a href="<?php the_permalink(); ?>"> <?php echo get_the_title(); ?> </a> </h2>
            <div class="blog-content">
                <div class="blog-excerpt">
                    <p><?php echo wp_trim_words(get_the_content(), 56); ?></p>
                </div>
            </div>

            <?php
            $content = get_post_field('post_content', get_the_ID());
            $word_count = str_word_count(wp_strip_all_tags($content));
            $reading_time = max(1, ceil($word_count / 200));
            ?>

            <div class="post-meta">
                <span class="post-date"><?php echo get_the_date('m.d.Y'); ?> </span>
                <span class="separator">//</span>
                <span class="reading-time"><?php echo $reading_time; ?> mins</span>
            </div>
        </div>
    </div>

</article>