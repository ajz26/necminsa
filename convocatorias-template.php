 <?php 

    $convocante = get_option('convocante');
    $direccion  = get_option('direccion');
    $web        = get_option('web');
    $telefono   = get_option('telefono');
    $demandante = get_option('demandante');

        $post_id = get_the_ID();


        $bg_banner = (!empty(get_the_post_thumbnail_url(null,'large'))) ? get_the_post_thumbnail_url(null,'large') : geekshat_plugin_url.'/includes/images/bg-header.jpg';




        $proveedor = '';
		$term_list = wp_get_post_terms($post_id, 'tipo-de-proveedor', array("fields" => "all"));
		foreach($term_list as $term_single) { $proveedor = $term_single->name; }

		$tipoDeCompra = '';
		$tipoDeCompras = wp_get_post_terms($post_id, 'tipo-de-compra', array("fields" => "all"));
		foreach($tipoDeCompras as $term_single) { $tipoDeCompra .= $term_single->name; }


		$cronograma = rwmb_meta( 'cronograma' );

		$cronograma_archivos = $cronograma_tabla = '';

			if ( ! empty( $cronograma ) ) {
			    foreach ( $cronograma as $actividad ) {
			        $cronograma_tabla .= '<tr>
			        						<td>'. $actividad['nombre'].'</td>
			        						<td>'. $actividad['inicio'].'</td>
			        						<td>'. $actividad['fin'].'</td>
			        					 </tr>';
			    }
			}

			if ( ! empty( $cronograma ) ) {

					$i = 1;    
			    foreach ( $cronograma as $actividad ) {
			    	if (isset($actividad['archivo'])) {
			    		foreach ( $actividad['archivo'] as $documento ) {
					    $cronograma_archivos .= '<tr>
			        						<td>'. $i++ .'</td>

			        						<td>'. $actividad['nombre'].'</td>
			        						<td>'. get_the_title($documento) .'</td>
			        						<td>'. '<a href="'.wp_get_attachment_url($documento).'" target="_blank" rel="noopener noreferrer">Descargar <img class="alignnone size-medium wp-image-2778" style="width: 19px; position: relative; top: 4px; left: 5px;" src="http://www.necminsa.pe/wp-content/uploads/2020/02/pdf-300x300.png" alt="" srcset="http://www.necminsa.pe/wp-content/uploads/2020/02/pdf-300x300.png 300w, http://www.necminsa.pe/wp-content/uploads/2020/02/pdf-150x150.png 150w, http://www.necminsa.pe/wp-content/uploads/2020/02/pdf-350x350.png 350w, http://www.necminsa.pe/wp-content/uploads/2020/02/pdf.png 512w" sizes="(max-width: 300px) 100vw, 300px"></a></td>
			        					 </tr>';
						}
			    	}
			    }
			}





get_header(); ?>
 
			


<div class="l-main">
	<div class="l-main-h i-cf">
		<main class="l-content" itemprop="mainContentOfPage">
			
        <?php
        while ( have_posts() ) : the_post();


        	$content = '
        	<section class="l-section wpb_row height_medium width_full filaconfondo-titulos"  style="background-size: cover;background-position: center; background-color: #006d9f; background-image: url('.$bg_banner.')">
			    <div class="l-section-h i-cf">
			        <div class="g-cols vc_row type_default valign_middle">
			            <div class="vc_col-sm-12 wpb_column vc_column_container">
			                <div class="vc_column-inner  vc_custom_1579722261195">
			                    <div class="wpb_wrapper">
			                        <h1 class="w-page-title align_center titulos-paginas" itemprop="headline" style="font-weight:bold;color:#ffffff;">'.$proveedor.'</h1></div>
			                </div>
			            </div>
			        </div>
			    </div>
			</section>
			';

			$content .='
			<section class="l-section wpb_row height_medium">
    <div class="l-section-h i-cf">
        <div class="g-cols vc_row type_default valign_top">
            <div class="vc_col-sm-12 wpb_column vc_column_container bloque-plenaria">
                <div class="vc_column-inner">
                    <div class="wpb_wrapper">
                        <div class="g-cols wpb_row type_default valign_top vc_inner ">
                            <div class="vc_col-sm-12 wpb_column vc_column_container">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper">
                                        <div id="ultimate-heading-10305e7524631a575" class="uvc-heading ult-adjust-bottom-margin ultimate-heading-10305e7524631a575 uvc-7891 " data-hspacer="no_spacer" data-halign="center" style="text-align:center">
                                            <div class="uvc-heading-spacer no_spacer" style="top"></div>
                                            <div class="uvc-main-heading ult-responsive" data-ultimate-target=".uvc-heading.ultimate-heading-10305e7524631a575 h2" data-responsive-json-new="{&quot;font-size&quot;:&quot;desktop:34px;&quot;,&quot;line-height&quot;:&quot;&quot;}">
                                                <h2 style="font-weight:bold;color:#02688d;">'.get_the_title().'</h2></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>';





			$content .= '
			<section class="l-section wpb_row height_medium">
    <div class="l-section-h i-cf">
        <div class="g-cols vc_row type_default valign_top">
            <div class="vc_col-sm-12 wpb_column vc_column_container">
                <div class="vc_column-inner">
                    <div class="wpb_wrapper">
                        <div class="w-tabs layout_default icon_chevron iconpos_right initialized autoresize">
                            <div class="w-tabs-list items_2">
                                <div class="w-tabs-list-h">
                                    <div class="w-tabs-item active"><a href="#1582129398272-25f88fd3-c71d" class="w-tabs-item-h"><span class="w-tabs-item-title">Información del Convocante</span></a></div>
                                    <div class="w-tabs-item"><a href="#1582129398438-29551eff-e17b" class="w-tabs-item-h"><span class="w-tabs-item-title">Información General del Procedimiento</span></a></div>
                                </div>
                            </div>
                            <div class="w-tabs-sections" style="width: 1140px; height: 264px;">
                                <div class="w-tabs-sections-h" style="position: absolute; width: 2280px; left: 0px;">
                                    <div class="w-tabs-section active" id="1582129398272-25f88fd3-c71d" style="width: 1140px;">
                                        <a href="#1582129398272-25f88fd3-c71d" class="w-tabs-section-header">
                                            <div class="w-tabs-section-header-h">
                                                <div class="w-tabs-section-title">Información del Convocante</div>
                                                <div class="w-tabs-section-control"></div>
                                            </div>
                                        </a>
                                        <div class="w-tabs-section-content">
                                            <div class="w-tabs-section-content-h i-cf">
                                                <div class="g-cols wpb_row type_default valign_top vc_inner ">
                                                    <div class="vc_col-sm-12 wpb_column vc_column_container">
                                                        <div class="vc_column-inner">
                                                            <div class="wpb_wrapper">
                                                                <div class="wpb_text_column ">
                                                                    <div class="wpb_wrapper">
                                                                        <table width="100%">
                                                                            <tbody>
                                                                                <tr class="fila-titulo">
                                                                                    <td style="text-align: center;" colspan="2" width="530">
                                                                                        <p class="titulito" style="margin-bottom: 0px !important;"><strong>Información del Convocante</strong></p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="20%">Nombre de la Entidad:</td>
                                                                                    <td>'.$convocante.'</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="20%">Dirección Legal:</td>
                                                                                    <td>'.$direccion.'</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="20%">Página Web:</td>
                                                                                    <td><a href="http://'.$web.'/">'.$web.'</a></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="20%">Teléfono:</td>
                                                                                    <td>'.$telefono.'</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="20%">Entidad Demandante:</td>
                                                                                    <td>'.$demandante.'</td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-tabs-section" id="1582129398438-29551eff-e17b" style="width: 1140px;">
                                        <a href="#1582129398438-29551eff-e17b" class="w-tabs-section-header">
                                            <div class="w-tabs-section-header-h">
                                                <div class="w-tabs-section-title">Información General del Procedimiento</div>
                                                <div class="w-tabs-section-control"></div>
                                            </div>
                                        </a>
                                        <div class="w-tabs-section-content">
                                            <div class="w-tabs-section-content-h i-cf">
                                                <div class="g-cols wpb_row type_default valign_top vc_inner ">
                                                    <div class="vc_col-sm-12 wpb_column vc_column_container">
                                                        <div class="vc_column-inner">
                                                            <div class="wpb_wrapper">
                                                                <div class="wpb_text_column ">
                                                                    <div class="wpb_wrapper">
                                                                        <table width="100%">
                                                                            <tbody>
                                                                                <tr class="fila-titulo">
                                                                                    <td style="text-align: center;" colspan="2" width="530">
                                                                                        <p class="titulito" style="margin-bottom: 0px !important;"><strong>Información General del Procedimiento</strong></p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="20%">Tipo de proveedor:</td>
                                                                                    <td>'.$proveedor.'</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="20%">Tipo de Compra:</td>
                                                                                    <td>'.$tipoDeCompra.'</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="20%">Descripción del Objeto:</td>
                                                                                    <td>'.rwmb_meta('descripcion').'</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="20%">Valor Referencial:</td>
                                                                                    <td>'.rwmb_meta('valor').'</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="20%">Monto de Inscripción:</td>
                                                                                    <td>'.rwmb_meta('inscripcion').'</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="20%">Fecha de Publicación:</td>
                                                                                    <td>'.rwmb_meta('fecha_publicacion').'</td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <div class="wpb_text_column ">
                                                                    <div class="wpb_wrapper"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
			';


			if ( ! empty( $cronograma ) ) {

			$content .= '<section class="l-section wpb_row height_medium">
				<div class="l-section-h i-cf">
					<div class="g-cols vc_row type_default valign_top">
						<div class="vc_col-sm-12 wpb_column vc_column_container">
							<div class="vc_column-inner">
							<div class="fila-titulo">
									<p class="titulito" style="margin-bottom: 0px !important;text-align: center;padding: 10px;background: #e3e6e9;"><strong>Cronograma</strong></p>
							</div>
							<table width="60%">
							<thead>
								<th><strong>Nombre</strong></th>
								<th width="20%"><strong>Fecha Inicio</strong></th>
								<th width="20%"><strong>Fecha Fin</strong></th>
							</thead>
							<tbody>
							'.$cronograma_tabla.'
							</tbody>
							</table>
							</div>
						</div>
					</div>
				</div>
			</section>';
			};


			if ( ! empty( $cronograma ) ) {

			$content .= '<section class="l-section wpb_row height_medium">
				<div class="l-section-h i-cf">
					<div class="g-cols vc_row type_default valign_top">
						<div class="vc_col-sm-12 wpb_column vc_column_container">
							<div class="vc_column-inner">
							<div class="fila-titulo">
									<p class="titulito" style="margin-bottom: 0px !important;text-align: center;padding: 10px;background: #e3e6e9;"><strong>Listado de Documentos</strong></p>
							</div>
							<table width="670">
							<thead>
								<th width="20%"><strong>N°</strong></th>
								<th width="20%"><strong>Etapa</strong></th>
								<th width="40%"><strong>Nombre de documento</strong></th>
								<th width="20%"><strong>Archivo</strong></th>
							</thead>
							<tbody>
							'.$cronograma_archivos.'
							</tbody>
							</table>
							</div>
						</div>
					</div>
				</div>
			</section>';

		};

 


			echo $content;

        endwhile;
        ?>
  
      		</main>
	</div>
</div>
  
<?php get_footer(); ?>