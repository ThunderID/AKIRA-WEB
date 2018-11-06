<?php
/**
 * Template for displaying search forms in Twenty Eleven
 *
 */
?>
<form role="search" method="get" class="search-form" action="<?php esc_url(home_url('/')) ?>">
    <label>
        <input class="search-field" placeholder="<?php echo esc_attr__('Search For...','bellavita'); ?>" value="" name="s" type="search">
    </label>
    <input class="search-submit" value="<?php echo esc_attr__('Go','bellavita'); ?>" type="submit">
</form>