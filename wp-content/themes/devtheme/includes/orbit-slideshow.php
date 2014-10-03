<?php
/**
 * Insert Orbit Slideshow for Front Page
 * As of Foundation 3.0, Orbit has been deprecated, however it does remain intact and functional.
 */
$orbit_options = 'animation:fade;
        timer_speed:8000;
        resume_on_mouseout:true;
        animation_speed:500;
        navigation_arrows:false;
        slide_number:false;';
?>
<ul class="header-slides-orbit" data-orbit data-options="<?php echo $orbit_options; ?>">
    <li>
        <img src="./wp-content/themes/devtheme/img/sgd_grfx_slide_01.jpg" alt="slide 1" />
        <div class="orbit-caption">
            <div class="orbit-caption-text">
                Do you know if your home or property<br />
                has storm damage?
            </div>
        </div>
    </li>
    <li>
        <img src="./wp-content/themes/devtheme/img/sgd_grfx_slide_02.jpg" alt="slide 2" />
        <div class="orbit-caption">
            <div class="orbit-caption-text">
                Storm Guard inspects your property for<br />
                storm damage and works with<br />
                your insurance company.
            </div>
        </div>
    </li>
    <li>
        <img src="./wp-content/themes/devtheme/img/sgd_grfx_slide_03.jpg" alt="slide 3" />
        <div class="orbit-caption">
            <div class="orbit-caption-text">
                With our no-hassle approach, we<br />
                restore your property's exterior<br />
                to like-new condition.
            </div>
        </div>
    </li>
    <li>
        <img src="./wp-content/themes/devtheme/img/sgd_grfx_slide_04.jpg" alt="slide 4" />
        <div class="orbit-caption">
            <div class="orbit-caption-text">
                We specialize in roofing, siding,<br />
                windows, gutters, painting, and<br />
                emergency tarping.
            </div>
        </div>
    </li>
    <li>
        <img src="./wp-content/themes/devtheme/img/sgd_grfx_slide_05.jpg" alt="slide 5" />
        <div class="orbit-caption">
            <div class="orbit-caption-text">
                Damage may reveal itself months, or<br />
                <i>even years</i>, after a storm.<br />
                <br />
                <a href="<?php echo home_url() .'/inspection-request';?>" class="orbit-caption-button radius">Request a FREE Property<br />Damage Inspection Today!</a>
            </div>
        </div>
    </li>
    <li>
        <img src="./wp-content/themes/devtheme/img/sgd_grfx_slide_06.jpg" alt="slide 6" />
        <div class="orbit-caption">
            <div class="orbit-caption-text">
                Looking for a great business opportunity?<br />
                Contact us about franchising in your area.<br />
                Territories are going fast!<br />
                <br />
                <a href="<?php echo home_url() .'/franchising';?>" class="orbit-caption-button radius">Find Out More</a>
            </div>
        </div>
    </li>
</ul>