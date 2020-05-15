<?php

// cptName Post Type
add_action( 'init', 'register_cpt_convocatorias' );
function register_cpt_convocatorias() {
	$labels = array(
			'name' => ( 'convocatorias' ),
			'singular_name' => ( 'convocatoria' ),
			'add_new' => ( 'Agregar nueva' ),
			'add_new_item' => ( 'Agregar nueva convocatoria' ),
			'edit_item' => ( 'Editar convocatoria' ),
			'new_item' => ( 'Nueva convocatoria' ),
			'view_item' => ( 'Ver convocatorias' ),
			'search_items' => ( 'Buscar convocatorias' ),
			'not_found' => ( 'No se encontraron convocatorias' ),
			'not_found_in_trash' => ( 'No se encontraron convocatorias en la papelera' ),
			'menu_name' => ( 'Convocatorias' ),
	);
	$args = array(
			'labels' 				=> $labels,
			'hierarchical' 			=> false,
			'description' 			=> 'Convocatorias',
			'supports' 				=> array( 'title','thumbnail'),
			'public' 				=> true,
			'show_ui' 				=> true,
			'show_in_menu' 			=> true,
			'menu_icon' 			=> geekshat_plugin_url.'/includes/images/icon.png',
			'menu_position' 		=> 5,
			'show_in_nav_menus' 	=> false,
			'publicly_queryable' 	=> true,
			'exclude_from_search' 	=> false,
			'has_archive' 			=> false,
			'query_var' 			=> false,
			'can_export' 			=> false,
			'rewrite' 				=> true,
			'capability_type' 		=> 'post'
	);
	register_post_type( 'convocatorias', $args );
}

function taxonomias_personalizadas_de_convocatorias() {

	$labels_proveedor = array(
		'name'                  => _x( 'Tipos de proveedores', 'Taxonomy plural name', 'necminsa' ),
		'singular_name'         => _x( 'Tipo de proveedor', 'Taxonomy singular name', 'necminsa' ),
		'search_items'          => __( 'Buscar tipo', 'necminsa' ),
		'all_items'             => __( 'Todos los tipos', 'necminsa' ),
		'edit_item'             => __( 'Editar tipo', 'necminsa' ),
		'update_item'           => __( 'Actualizar', 'necminsa' ),
		'add_new_item'          => __( 'Agregar', 'necminsa' ),
		'new_item_name'         => __( 'Nuevo', 'necminsa' ),
		'add_or_remove_items'   => __( 'Agregar o eliminar', 'necminsa' ),
		'choose_from_most_used' => __( 'Seleccionar', 'necminsa' ),
		'menu_name'             => __( 'Tipos de proveedor', 'necminsa' ),
	);

	$args_proveedor = array(
		'labels'            => $labels_proveedor,
		'public'            => false,
		'show_in_nav_menus' => false,
		'show_admin_column' => false,
		'hierarchical'      => true,
		'show_ui'           => true,
		'query_var'         => true,
		'rewrite'           => false,
		'query_var'         => false,
	);

	register_taxonomy( 'tipo-de-proveedor', array( 'convocatorias' ), $args_proveedor );


		$labels_compra = array(
		'name'                  => _x( 'Tipos de compra', 'Taxonomy plural name', 'necminsa' ),
		'singular_name'         => _x( 'Tipo de compra', 'Taxonomy singular name', 'necminsa' ),
		'search_items'          => __( 'Buscar tipo', 'necminsa' ),
		'all_items'             => __( 'Todos los tipos', 'necminsa' ),
		'edit_item'             => __( 'Editar tipo', 'necminsa' ),
		'update_item'           => __( 'Actualizar', 'necminsa' ),
		'add_new_item'          => __( 'Agregar', 'necminsa' ),
		'new_item_name'         => __( 'Nuevo', 'necminsa' ),
		'add_or_remove_items'   => __( 'Agregar o eliminar', 'necminsa' ),
		'choose_from_most_used' => __( 'Seleccionar', 'necminsa' ),
		'menu_name'             => __( 'Tipos de compra', 'necminsa' ),
	);

	$args_compra = array(
		'labels'            => $labels_compra,
		'public'            => false,
		'show_in_nav_menus' => false,
		'show_admin_column' => false,
		'hierarchical'      => true,
		'show_ui'           => true,
		'query_var'         => true,
		'rewrite'           => false,
		'query_var'         => false,
	);

	register_taxonomy( 'tipo-de-compra', array( 'convocatorias' ), $args_compra );
}

add_action( 'init', 'taxonomias_personalizadas_de_convocatorias' );



add_filter( 'rwmb_meta_boxes', 'registrar_metaboxes_restaurantes' );

function registrar_metaboxes_restaurantes( $meta_boxes ) {


	    $meta_boxes[] = array(
        'title'     => 'Información de la convocatoria',
        'post_types' => 'convocatorias',
        'fields'    => array(
           
        			array(
							    'name'       => 'Descripción',
							    'id'         => 'descripcion',
							    'type'       => 'textarea',
							    'columns' 	 => 8,
							),
        			array(
							    'name'       => 'Convocatoria (Nº)',
							    'id'         => 'numero',
							    'type'       => 'text',
							    'columns' 	 => 4,
							),
        			array(
							    'name'       => 'Valor referencial',
							    'id'         => 'valor',
							    'type'       => 'text',
							    'columns' 	 => 4,

							),
        			array(
							    'name'       => 'Monto de Inscripción',
							    'id'         => 'inscripcion',
							    'type'       => 'text',
							    'columns' 	 => 4,
							),
        			array(
							    'name'       => 'Fecha de Publicación',
							    'id'         => 'fecha_publicacion',
							    'type'       => 'date',
							    'js_options' => array(
							        'dateFormat'      => 'dd/mm/yy',
							    ),
							    'columns' 	 => 4,
							),
        ),
    );



$meta_boxes[] = array(
        'title'     => 'Cronogama',
        'post_types' => 'convocatorias',
        'fields' => array(
        array(
            'id'     => 'cronograma',
            'type'   => 'group',
            'clone'  => true,
            'sort_clone' => true,
            'add_button' => 'agregar otra etapa',
            // List of sub-fields
            'fields' => array(
                array(
                    'name' => 'Nombre',
                    'id'   => 'nombre',
                    'type' => 'text',
					'columns' 	 => 3,
                ),
                array(
                    'name' => 'Inicio',
                    'id'   => 'inicio',
                    'type' => 'date',
                    'js_options' => array('dateFormat'      => 'dd/mm/yy'),
					'columns' 	 => 3,
                ),
                array(
                    'name' => 'Fin',
                    'id'   => 'fin',
                    'type' => 'date',
                    'js_options' => array('dateFormat'      => 'dd/mm/yy'),
					'columns' 	 => 3,
                ),
                array(
                    'name' => 'Archivos',
                    'id'   => 'archivo',
                    'type'             => 'file_advanced',
    				'force_delete'     => false,
					'columns' 	 => 3,
                ),

                // Other sub-fields here
            ),
        ),
    ),
);






    return $meta_boxes;
}



add_filter('single_template', 'convocatorias_template');

function convocatorias_template($single) {

    global $post;

    if ( $post->post_type == 'convocatorias' ) {
        if ( file_exists( geekshat_plugin_dir . '/convocatorias-template.php' ) ) {
            return geekshat_plugin_dir . '/convocatorias-template.php';
        }
    }

    return $single;

}














/*********************************************************  S H O R T C O D E S ******************************************************************/



	
if ( ! class_exists( 'shortcodeConvocatorias' ) ) {

	class shortcodeConvocatorias {

		public function __construct() {
			
			add_shortcode( 'convocatorias', array( 'shortcodeConvocatorias', 'output' ) );

			if ( function_exists( 'vc_lean_map' ) ) {
				vc_lean_map( 'convocatorias', array( 'shortcodeConvocatorias', 'map' ) );
			}

		}


		public static function output( $atts, $content = null ) { extract( vc_map_get_attributes( 'convocatorias', $atts ) );

			$convocatorias = '';

			    $args = array(
			    'post_type' => 'convocatorias',
			    'orderby' => 'date',
    			'order' => 'DSC',
				    'tax_query' => array(
				    	'relation' => 'OR',
				        (!empty($atts['tipo_de_proveedor']) && $atts['tipo_de_proveedor'] != 'todos') ? array(
				            'taxonomy' => 'tipo-de-proveedor',
				            'field'    => 'id',
				            'terms'    => $atts['tipo_de_proveedor'],
				        ) : '',
				        (!empty($atts['tipo_de_compra']) && $atts['tipo_de_compra'] != 'todos') ? array(
				            'taxonomy' => 'tipo-de-compra',
				            'field'    => 'id',
				            'terms'    => $atts['tipo_de_compra'],
				        ) : '',
				    )
				);


				$the_query = new WP_Query( $args );
				 
				// The Loop
				$i = 1;
				if ( $the_query->have_posts() ) {
				   
				    while ( $the_query->have_posts() ) { $the_query->the_post();

        				$post_id = get_the_ID();


				    	 $proveedor = '';
							$term_list = wp_get_post_terms($post_id, 'tipo-de-proveedor', array("fields" => "all"));
							foreach($term_list as $term_single) { $proveedor = $term_single->name; }

						$tipoDeCompra = '';
							$tipoDeCompras = wp_get_post_terms($post_id, 'tipo-de-compra', array("fields" => "all"));
							foreach($tipoDeCompras as $term_single) { $tipoDeCompra .= $term_single->name; }

				    	$convocatorias .= '
				    	<tr>
				    	<td data-sheets-value="">'.rwmb_meta('numero').'</td>
						<td data-sheets-value="">'.$proveedor.'</td>
						<td data-sheets-value=""><a href="'.get_the_permalink().'">'.get_the_title().'</a></td>
						<td data-sheets-value="">'.get_the_date('d-m-y').'</td>
						<tr>';
				        
				    }
				} else {
				        $convocatorias = '';

				    // no posts found
				}
				wp_reset_postdata();


					$content = '
							<div class="g-cols wpb_row type_default valign_top vc_inner  vc_custom_1583267566109">
							    <div class="vc_col-sm-12 wpb_column vc_column_container">
							        <div class="vc_column-inner">
							            <div class="wpb_wrapper">
							                <div class="wpb_text_column ">
							                    <div class="wpb_wrapper">
													
													<h2 style="text-align: center;">'.$atts['titulo'].'</h2>

							                        <table class="tabla-de-convocatorias-home" dir="ltr" cellspacing="0" cellpadding="0" border="1">
							                            <colgroup>
							                                <col width="112">
							                                    <col width="118">
							                                        <col width="407">
							                            </colgroup>
							                            <tbody>
							                                <tr>
							                                    <td class="celda-background"><strong>CONVOCATORIA</strong></td>
							                                    <td class="celda-background"><strong>Tipo Proveedor</strong></td>
							                                    <td class="celda-background"><strong>Objeto de la Convocatoria</strong></td>
							                                    <td class="celda-background" width="10%"><strong>Fecha de publicación</strong></td>
							                                </tr>

							                                '.$convocatorias.'
							                            </tbody>
							                        </table>
							                    </div>
							                </div>
							            </div>
							        </div>
							    </div>
							</div>
						';

			return $content;

		}

	
		public static function map() {

			
		$terms_by_tipo_de_compra = get_terms(array('taxonomy' => 'tipo-de-compra', 'hide_empty' => false));
 
		$selectCompra = array('Todos' =>'todos');

	 	foreach ($terms_by_tipo_de_compra as $term => $value) {
	 		$name    = $value->name;
	 		$term_id = $value->term_id;
	 		$selectCompra[$name] = $term_id;
	 	}


	 	$terms_by_tipo_de_proveedor = get_terms(array('taxonomy' => 'tipo-de-proveedor', 'hide_empty' => false));
	 
		$selectProveedor = array('Todos' =>'todos');

	 	foreach ($terms_by_tipo_de_proveedor as $term => $value) {
	 		$name    				= $value->name;
	 		$term_id 				= $value->term_id;
	 		$selectProveedor[$name] = $term_id;
	 	}


			return array(
				'name'        => esc_html__( 'Convocatorias', 'locale' ),
				'description' => esc_html__( 'Listar las convocatorias', 'locale' ),
				'base'        => 'convocatorias',
				'category'       => 'Necminsa',
				'icon'	      => geekshat_plugin_url.'/includes/images/icon-100.png',
				'params'      => array(
					array(
						  "type" => "textfield",
						  "holder" => "div",
						  "heading" => __( "Título", "my-text-domain" ),
						  "param_name" => "titulo",
						  "value" => __( "Ingresa el título de la tabla", "my-text-domain" ),
						  "description" => __( "Ingresa el título de la tabla.", "my-text-domain" )
					),
					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__( 'Selecciona un tipo de proveedor', 'locale' ),
						'param_name' => 'tipo_de_proveedor',
						'value'      => $selectProveedor,
					),
					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__( 'Selecciona un tipo de compra', 'locale' ),
						'param_name' => 'tipo_de_compra',
						'value'      => $selectCompra,
					),
				),
			);
		}

	}

}
new shortcodeConvocatorias;



/*************************************************************** RESULTADOS DE BUSCADOR ****************************************************************************/


	
if ( ! class_exists( 'listaConvocatorias' ) ) {

	class listaConvocatorias {

		public function __construct() {
			
			add_shortcode( 'lista-convocatorias', array( 'listaConvocatorias', 'output' ) );

			if ( function_exists( 'vc_lean_map' ) ) {
				vc_lean_map( 'lista-convocatorias', array( 'listaConvocatorias', 'map' ) );
			}

		}


		public static function output( $atts, $content = null ) { extract( vc_map_get_attributes( 'lista-convocatorias', $atts ) );

				$termino = $_GET['objeto'];

				$convocatorias='';

			    $args = array(
			    'post_type' => 'convocatorias',
			    'orderby' => 'date',
    			'order' => 'DSC',
				's'	    => $termino,
				);


				$the_query = new WP_Query( $args );
				 
				// The Loop
				$i = 1;
				if ( $the_query->have_posts() ) {
				   
				    while ( $the_query->have_posts() ) { $the_query->the_post();

        				$post_id = get_the_ID();


				    	 $proveedor = '';
							$term_list = wp_get_post_terms($post_id, 'tipo-de-proveedor', array("fields" => "all"));
							foreach($term_list as $term_single) { $proveedor = $term_single->name; }

						$tipoDeCompra = '';
							$tipoDeCompras = wp_get_post_terms($post_id, 'tipo-de-compra', array("fields" => "all"));
							foreach($tipoDeCompras as $term_single) { $tipoDeCompra .= $term_single->name; }

				    	$convocatorias .= '
				    	<tr>
				    	<td data-sheets-value="">'.rwmb_meta('numero').'</td>
						<td data-sheets-value="">'.$proveedor.'</td>
						<td data-sheets-value=""><a href="'.get_the_permalink().'">'.get_the_title().'</a></td>
						<td data-sheets-value="">'.get_the_date('d-m-y').'</td>
						<tr>';
				        
				    }
					$empty = false;

				} else {
					$empty = true;
				        $convocatorias = '<tr><td>no se encontraron convocatorias</td></tr>';

				    // no posts found
				}
				wp_reset_postdata();


					return ($empty == false) ? '
							<div class="g-cols wpb_row type_default valign_top vc_inner  vc_custom_1583267566109">
							    <div class="vc_col-sm-12 wpb_column vc_column_container">
							        <div class="vc_column-inner">
							            <div class="wpb_wrapper">
							                <div class="wpb_text_column ">
							                    <div class="wpb_wrapper">
													
													'.(!empty($termino) ? '<h2 style="text-align: center;">Resultados de la busqueda para "'.$termino.'"</h2>' : '').'

							                        <table class="tabla-de-convocatorias-home" dir="ltr" cellspacing="0" cellpadding="0" border="1">
							                            <colgroup>
							                                <col width="112">
							                                    <col width="118">
							                                        <col width="407">
							                            </colgroup>
							                            <tbody>
							                                <tr>
							                                    <td class="celda-background"><strong>CONVOCATORIA</strong></td>
							                                    <td class="celda-background"><strong>Tipo Proveedor</strong></td>
							                                    <td class="celda-background"><strong>Objeto de la Convocatoria</strong></td>
							                                    <td class="celda-background" width="10%"><strong>Fecha de publicación</strong></td>

							                                </tr>

							                                '.$convocatorias.'
							                            </tbody>
							                        </table>
							                    </div>
							                </div>
							            </div>
							        </div>
							    </div>
							</div>
						': '<h2 class="text-center">no se encontraron resultados</h2>';


		}

	
		public static function map() {

			
		$terms_by_tipo_de_compra = get_terms(array('taxonomy' => 'tipo-de-compra', 'hide_empty' => false));
 
		$selectCompra = array('Todos' =>'todos');

	 	foreach ($terms_by_tipo_de_compra as $term => $value) {
	 		$name    = $value->name;
	 		$term_id = $value->term_id;
	 		$selectCompra[$name] = $term_id;
	 	}


	 	$terms_by_tipo_de_proveedor = get_terms(array('taxonomy' => 'tipo-de-proveedor', 'hide_empty' => false));
	 
		$selectProveedor = array('Todos' =>'todos');

	 	foreach ($terms_by_tipo_de_proveedor as $term => $value) {
	 		$name    				= $value->name;
	 		$term_id 				= $value->term_id;
	 		$selectProveedor[$name] = $term_id;
	 	}


			return array(
				'name'        => esc_html__( 'Convocatorias (Resultados buscador)', 'locale' ),
				'description' => esc_html__( 'Listar las convocatorias', 'locale' ),
				'base'        => 'lista',
				'category'       => 'Necminsa',
				'icon'	      => geekshat_plugin_url.'/includes/images/icon-100.png',
				'params'      => array(
					array(
						  "type" => "textfield",
						  "holder" => "div",
						  "heading" => __( "Título", "my-text-domain" ),
						  "param_name" => "titulo",
						  "value" => __( "Ingresa el título de la tabla", "my-text-domain" ),
						  "description" => __( "Ingresa el título de la tabla.", "my-text-domain" )
					),
					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__( 'Selecciona un tipo de proveedor', 'locale' ),
						'param_name' => 'tipo_de_proveedor',
						'value'      => $selectProveedor,
					),
					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__( 'Selecciona un tipo de compra', 'locale' ),
						'param_name' => 'tipo_de_compra',
						'value'      => $selectCompra,
					),
				),
			);
		}

	}

}
new listaConvocatorias;



/****************************************************************/



	
if ( ! class_exists( 'buscadorDeConvocatorias' ) ) {

	class buscadorDeConvocatorias {

		/**
		 * Main constructor
		 *
		 * @since 1.0.0
		 */
		public function __construct() {
			
			// Registers the shortcode in WordPress
			add_shortcode( 'buscador-de-convocatorias', array( 'buscadorDeConvocatorias', 'output' ) );

			// Map shortcode to Visual Composer
			if ( function_exists( 'vc_lean_map' ) ) {
				vc_lean_map( 'buscador-de-convocatorias', array( 'buscadorDeConvocatorias', 'map' ) );
			}

		}


		public static function output( $atts, $content = null ) { extract( vc_map_get_attributes( 'buscador-de-convocatorias', $atts ) );

					$buscador = '
							<form action="/convocatorias" class="buscador-de-convocatorias">
														<input type="text" name="objeto" placeholder="Buscar convocatoria">
														<button type="submit"><i class="fas fa-search"></i> Buscar</button>
													</form>
						';

			return $buscador;

		}

	
		public static function map() {

			return array(
				'name'        => esc_html__( 'Buscador', 'locale' ),
				'description' => esc_html__( 'Buscador de convocatorias', 'locale' ),
				'base'        => 'Buscador',
				'category'       => 'Necminsa',
				'icon'	      => geekshat_plugin_url.'/includes/images/icon-100.png',
			);
		}

	}

}
new buscadorDeConvocatorias;











// function buscador_de_convocatorias(){


// 		$objeto = $_GET['objeto'];

// 		print_r($objeto);

// 			$args = array(
// 			    'post_type' => 'convocatorias',
// 			    'orderby' => 'date',
//     			'order' => 'DSC',
// 				    'tax_query' => array(
// 				    	'relation' => 'OR',
// 				        (!empty($atts['tipo_de_proveedor']) && $atts['tipo_de_proveedor'] != 'todos') ? array(
// 				            'taxonomy' => 'tipo-de-proveedor',
// 				            'field'    => 'id',
// 				            'terms'    => $atts['tipo_de_proveedor'],
// 				        ) : '',
// 				        (!empty($atts['tipo_de_compra']) && $atts['tipo_de_compra'] != 'todos') ? array(
// 				            'taxonomy' => 'tipo-de-compra',
// 				            'field'    => 'id',
// 				            'terms'    => $atts['tipo_de_compra'],
// 				        ) : '',
// 				    )
// 				);


// 				$the_query = new WP_Query( $args );
				 
// 				// The Loop
// 				$i = 1;
// 				if ( $the_query->have_posts() ) {
				   
// 				    while ( $the_query->have_posts() ) { $the_query->the_post();

//         				$post_id = get_the_ID();


// 				    	 $proveedor = '';
// 							$term_list = wp_get_post_terms($post_id, 'tipo-de-proveedor', array("fields" => "all"));
// 							foreach($term_list as $term_single) { $proveedor = $term_single->name; }

// 						$tipoDeCompra = '';
// 							$tipoDeCompras = wp_get_post_terms($post_id, 'tipo-de-compra', array("fields" => "all"));
// 							foreach($tipoDeCompras as $term_single) { $tipoDeCompra .= $term_single->name; }

// 				    	$convocatorias .= '
// 				    	<tr>
// 				    	<td data-sheets-value="">'.$i++.'</td>
// 						<td data-sheets-value="">'.$proveedor.'</td>
// 						<td data-sheets-value=""><a href="'.get_the_permalink().'">'.get_the_title().'</a></td>
// 						<tr>';
				        
// 				    }
// 				} else {
// 				        $convocatorias = 'no se encontró nada';

// 				    // no posts found
// 				}
// 				wp_reset_postdata();


// 					$content = '
// 							<div class="g-cols wpb_row type_default valign_top vc_inner  vc_custom_1583267566109">
// 							    <div class="vc_col-sm-12 wpb_column vc_column_container">
// 							        <div class="vc_column-inner">
// 							            <div class="wpb_wrapper">
// 							                <div class="wpb_text_column ">
// 							                    <div class="wpb_wrapper">
													
// 													<h2 style="text-align: center;">'.$atts['titulo'].'</h2>

// 							                        <table class="tabla-de-convocatorias-home" dir="ltr" cellspacing="0" cellpadding="0" border="1">
// 							                            <colgroup>
// 							                                <col width="112">
// 							                                    <col width="118">
// 							                                        <col width="407">
// 							                            </colgroup>
// 							                            <tbody>
// 							                                <tr>
// 							                                    <td class="celda-background"><strong>CONVOCATORIA</strong></td>
// 							                                    <td class="celda-background"><strong>Tipo Proveedor</strong></td>
// 							                                    <td class="celda-background"><strong>Objeto de la Convocatoria</strong></td>
// 							                                </tr>

// 							                                '.$convocatorias.'
// 							                            </tbody>
// 							                        </table>
// 							                    </div>
// 							                </div>
// 							            </div>
// 							        </div>
// 							    </div>
// 							</div>
// 						';

// 			return $content;

// }


// add_shortcode('buscador-de-convocatorias','buscador_de_convocatorias');