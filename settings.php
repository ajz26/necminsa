<?php

function customize_menu(){

add_submenu_page('edit.php?post_type=convocatorias',
					 'Configuraciones',
					 'Configuración',
					 'manage_options',
					 'necminsa',
					 'settingsNecminsa');

}

add_action( 'admin_menu', 'customize_menu' );




add_action( 'admin_init', 'register_necminsa_settings' );

function register_necminsa_settings() {
	register_setting( 'necminsa-settings-group', 'convocante' );
	register_setting( 'necminsa-settings-group', 'direccion' );
	register_setting( 'necminsa-settings-group', 'web' );
	register_setting( 'necminsa-settings-group', 'telefono' );
	register_setting( 'necminsa-settings-group', 'demandante' );
}


function settingsNecminsa(){

 	$convocante = get_option('convocante');
	$direccion 	= get_option('direccion');
	$web 		= get_option('web');
	$telefono 	= get_option('telefono');
	$demandante = get_option('demandante');

?>

	<div class="wrap">
	<h1>Información del convocante</h1>


	<form method="post" action="options.php"> 
	
	<?php 
		settings_fields( 'necminsa-settings-group' );
   		do_settings_sections( 'necminsa-settings-group' );
   	?>
	<table class="form-table">
	<tbody>
	<tr>
		<th scope="row">
			<label for="convocante">Entidad Convocante</label>
		</th>
		<td>
			<input value="<?php echo $convocante ?>" class="regular-text" name="convocante" id="convocante" placeholder="Entidad convocante">
		</td>
	</tr>

	<tr>
		<th scope="row">
			<label for="direccion">Dirección legal</label>
		</th>
		<td>
			<input value="<?php echo $direccion ?>" class="regular-text" name="direccion" id="direccion" placeholder="Dirección Legal">
		</td>
	</tr>

	<tr>
		<th scope="row">
			<label for="web">Página web</label>
		</th>
		<td>
			<input value="<?php echo $web ?>" class="regular-text" name="web" id="web" placeholder="Página web">
		</td>
	</tr>


	<tr>
		<th scope="row">
			<label for="telefono">Teléfono</label>
		</th>
		<td>
			<input value="<?php echo $telefono ?>" class="regular-text" name="telefono" id="telefono" placeholder="Teléfono">
		</td>
	</tr>

	<tr>
		<th scope="row">
			<label for="demandante">Entidad Demandante</label>
		</th>
		<td>
			<input value="<?php echo $demandante ?>" class="regular-text" name="demandante" id="demandante" placeholder="Teléfono">
		</td>
	</tr>
	
	
	</tbody>
	</table>
	<?php submit_button(); ?>
	</form>
	</div>

<?php }

