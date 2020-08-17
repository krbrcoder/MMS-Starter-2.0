<?php
        $primarycolor = get_option( 'theme_primary_color' );
        $primarybg = '.primary { background-color: ' . $primarycolor . '; }';
        $primarytx = '.primary-text { color: ' . $primarycolor . '; }';
        $primaryhover = '.primary-hover a:hover, .primary-hover a:active, .primary-hover a:focus { color: ' . $primarycolor . ' !important; }';
        $primarynavbar = '.dropdown-menu li a:hover, .dropdown-menu li a:focus, .dropdown-menu li a:active { background-color: ' . $primarycolor . '; }';
        
        $secondarycolor = get_option( 'theme_secondary_color' );
        $secondarybg = '.secondary { background-color: ' . $secondarycolor . '; }';
        $secondarytx = '.secondary-text { color: ' . $secondarycolor . '; }';
        $secondaryhover = '.secondary-hover:hover, .secondary-hover:active, .secondary-hover:focus { color: ' . $secondarycolor . ' !important; }';

        $accentcolor = get_option( 'theme_accent_color' );
        $accentbg = '.accent { background-color: ' . $accentcolor . '; }';
        $accenttx = '.accent-text { color: ' . $accentcolor . '; }';
        $accenthover = '.accent-hover:hover, .accent-hover:active, .accent-hover:focus { color: ' . $accentcolor . ' !important; }';
        
        $basecolor = get_option( 'theme_base_color' );
        $basebg = '.base { background-color: ' . $basecolor . '; }';
        $basetx = '.base-text { color: ' . $basecolor . '; }';
        $basehover = '.base-hover:hover, .base-hover:active, .base-hover:focus { color: ' . $basecolor . ' !important; }';
        ?>

    <style>
      <?php if (!empty( $primarycolor )) { echo $primarybg; echo $primarytx; echo $primaryhover; } ?>
      <?php if (!empty( $secondarycolor )) { echo $secondarybg; echo $secondarytx; echo $secondaryhover; } ?>
      <?php if (!empty( $accentcolor )) { echo $accentbg; echo $accenttx; echo $accenthover; } ?>
      <?php if (!empty( $basecolor )) { echo $basebg; echo $basetx; echo $basehover; } ?>
    </style>
