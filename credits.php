<?php
/**
 * @package Credits on Site
 * @version 0.5
 */
/*
Plugin Name: Credits on Site
Plugin URI: 
Description: Is just a plugin, when activated you will randomly see a <span>Credits of the site<span/> in the your footer.
Author: Diego Curumim
Version: 0.5
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}



/*
*  __construct
*
*  @since	versão 0.5
*  
*/
class Credits{		
	
	function __construct(){
		
		/*
		* Add nova ação com WordPress.
	    */
		add_action( 'wp_enqueue_scripts', array($this, 'theme_scripts') );
		
			// action para chamar no wp_footer
			#add_action( 'wp_footer',array($this, 'getCred') );	
		
			// cria um shortcode para chamar na page
			add_shortcode('getcreditos',array($this, 'getCred'));
}
	
	
/*
* Registra Scripts e Estilos
*
*/
function theme_scripts() {
	// Identificador para o script
	$handle = 'style-credits';	
	
	// Caminho para o arquivo
	$src = plugin_dir_url( __FILE__ ) . 'build/css/style.css';
	
	// Versão do arquivo
	$ver = '0.5';
	
	// imprime no footer
	$in_footer = true;	
	
	// Enfileira um estilo
	wp_enqueue_style( $handle, $src, $ver, $in_footer );
}

	
	
/*
* função para o html
*
*/
function getCred() {
	 //carrega a imagem da ag
	 $imagem = plugins_url( 'build/images/imagem.png', __FILE__ );
	 $siteUrl = "http://www.e-deas.com.br";	 
	?>

	<div class="creditos">
		<div class="container">			
			<small class="direitos">© <?php echo bloginfo('title'); ?> - Todos os direitos reservados</small>

			<div class="logocredito">
			  <a href="<?php echo $siteUrl; ?>" target="_blank" title="Desenvolvimento do website">				 
				<img src="<?php echo $imagem; ?>" alt="Desenvolvimento do website: <?php echo $siteUrl; ?>" width="57" height="11"/>
			  </a>
			</div>			
		</div>
	</div>

<?php }

// fecha class
}

// new class
new Credits;

?>