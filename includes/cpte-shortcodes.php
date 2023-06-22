<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

function cpte_frontend_div( $attr ){

    $shortId_url = $attr['shortid'] == '' ? 'https://app.cloudpano.com/tours/MMqLrAhy2oN' : $attr['shortid'];  
    $width       = $attr['width']   == '' ? '100%' : $attr['width'];  
    $height      = $attr['height']  == '' ? '500px' : $attr['height'];
    $alignItems  = $attr['alignitems'];

    $regex = '/\/tours\/([^?\/]+)/';

    preg_match($regex, $shortId_url, $matches);
    
    $shortId = isset($matches[1]) ? $matches[1] : null;

    if( $alignItems == 'center' )
    {
        $margin = 'margin:0 auto';
    }
    else if( $alignItems == 'left' )
    {
        $margin = 'margin-right:auto';
    }
    else if( $alignItems == 'right' )
    {
        $margin = 'margin-left:auto';
    }

    $position = strpos($shortId_url, '?'); 

    if ($position !== false) 
    {
        $substring = substr($shortId_url, 0, $position);
    }
    else
    {
        $substring = substr($shortId_url, 0);
    }


	ob_start();

	    ?>
            <style>
                #cp-splash-screen-<?= $shortId ?>{
                    <?= $margin ?>
                }
                iframe[src="<?= $substring ?>"]{
                    display:block;
                    <?= $margin ?>
                }
            </style>
            <div id="<?= $shortId ?>"> 
                <script type="text/javascript" async data-short="<?php echo $shortId; ?>" data-path="tours" width="<?php echo $width; ?>" height="<?php echo $height; ?>" src="https://app.cloudpano.com/public/shareScript.js"></script>
            </div>

        <?php

	$html = ob_get_clean();
	
	return $html;
}

add_shortcode( 'cloudpano_360_tours_embedder', 'cpte_frontend_div' );
