<?php
/**
 * Insert Orbit Slideshow for Front Page
 * As of Foundation 3.0, Orbit has been deprecated, however it does remain intact and functional.
 */
$orbit_options = 'animation:fade;
        timer_speed:8000;
        resume_on_mouseout:true;
        animation_speed:500;
        navigation_arrows:true;
        slide_number:false;';
?>
<ul class="header-slides-orbit" data-orbit data-options="<?php echo $orbit_options; ?>">
    <li>
        <img src="./wp-content/themes/devtheme/img/sgd_grfx_slide_01.png" alt="slide 1" />
        <div class="orbit-caption"> Caption One. </div>
    </li>
    <li>
        <img src="./wp-content/themes/devtheme/img/sgd_grfx_slide_02.png" alt="slide 2" />
        <div class="orbit-caption"> Caption Two. </div>
    </li>
    <li>
        <img src="./wp-content/themes/devtheme/img/sgd_grfx_slide_03.png" alt="slide 3" />
        <div class="orbit-caption"> Caption Three. </div>
    </li>
    <li>
        <img src="./wp-content/themes/devtheme/img/sgd_grfx_slide_04.png" alt="slide 4" />
        <div class="orbit-caption"> Caption Four. </div>
    </li>
    <li>
        <img src="./wp-content/themes/devtheme/img/sgd_grfx_slide_03.png" alt="slide 5" />
        <div class="orbit-caption"> Caption Five. </div>
    </li>
    <li>
        <img src="./wp-content/themes/devtheme/img/sgd_grfx_slide_03.png" alt="slide 6" />
        <div class="orbit-caption"> Caption Six. </div>
    </li>
</ul>