<?php

/**
 * Content template
 */

$container_classes = !empty($args['container_classes']) ? $args['container_classes'] : 'mb-5';

?>

<article id="<?php the_ID(); ?>" <?php post_class($container_classes); ?>>
    <?php get_template_part('template-parts/components/entry-components/entry-header'); ?>
    <?php get_template_part('template-parts/components/entry-components/entry-meta'); ?>
    <?php get_template_part('template-parts/components/entry-components/entry-content'); ?>
    <?php get_template_part('template-parts/components/entry-components/entry-footer'); ?>
</article>