<?php
global $fauzanredux;
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="<?php echo $fauzanredux['favicon']['url']; ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="./assets//font-awesome/all.min.css">
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css"
          integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <meta charset="utf-8">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body>
<header>
    <div class="app-header">
        <div class="app-header__images">
            <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo $fauzanredux['logo']['url']; ?>"></a>
        </div>
        <div class="app-header__navigation">
            <ul>
                <?php
                $args = array('theme_location' => 'main_menu');
                wp_nav_menu($args);
                ?>
            </ul>
        </div>
        <form role="search" method="get" id="search-form" action="<?php echo esc_url(home_url('/')); ?>">
            <div class="search">
                <input type="text" placeholder="Search" name="s" id="search-input"
                       value="<?php echo esc_attr(get_search_query()); ?>">
                <i class="fa fa-search" aria-hidden="true"></i>
            </div>
        </form>
    </div>
</header>
</body>
</html>

