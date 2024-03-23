<?php

// 
// Custom form template
// 

?>

<form name="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
    <input class="input" placeholder="<?php echo esc_attr_x('Search', 'placeholder', 'cook-adv'); ?>" 
    value="<?php the_search_query(); ?>" name="s">
</form>