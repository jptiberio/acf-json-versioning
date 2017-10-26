<?php

	/**
	 *
	 * Plugin Name: ACF Json Versioning
	 * Description: Plugin que habilita o versionamento de campos do ACF dentro do tema
	 * Author: JP Tibério
	 *
	 */

	if ( is_plugin_active('advanced-custom-fields-pro/acf.php') ) {

		$theme_root = get_template_directory();

		if(!is_dir($theme_root."/acf-json")){
			mkdir($theme_root."/acf-json", 0777);
		}


		function acfJsonLoad($paths)
		{
		    $paths[] = $theme_root . '/acf-json';
		    return $paths;
		}

		add_filter('acf/settings/load_json', 'acfJsonLoad');

	} else {

		function my_error_notice() {
		    ?>
		    <div class="error notice">
		        <p><?php _e( 'Por favor, instale ou ative o ACF Pro!', 'my_plugin_textdomain' ); ?></p>
		    </div>
		    <?php
		}
		
		add_action( 'admin_notices', 'my_error_notice' );
	}

?>