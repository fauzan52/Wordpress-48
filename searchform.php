<form action="<?php echo home_url ('/')?>" method="get">
    <label for="search">Search For Title</label>
    <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
    <input type="submit" id="search_submit" value="Search">
</form>