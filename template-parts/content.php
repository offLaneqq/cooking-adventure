<?php

/**
 * Content template
 */

?>

<article id="<?php the_ID(); ?>" <?php post_class('mb-5'); ?>>
    <?php get_template_part('template-parts/components/entry-components/entry-header'); ?>
    <?php get_template_part('template-parts/components/entry-components/entry-meta'); ?>
    <?php get_template_part('template-parts/components/entry-components/entry-content'); ?>
    <?php get_template_part('template-parts/components/entry-components/entry-footer'); ?>
</article>