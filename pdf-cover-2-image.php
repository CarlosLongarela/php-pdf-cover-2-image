<?php
/**
 * Function to convert pdf cover (first page) to image.
 * Author: Carlos Longarela
 * Author URI: https://tabernawp.com/
 * Date: 2023-04-10
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 * Version: 1.0
 */

/**
 *
 * @param string $input_pdf         Path to the pdf file.
 * @param string $output_image_name Path to the output image file.
 * @param string $output_type       Output type. Can be 'jpeg' or 'png16m'.
 * @param string $res               Resolution of the result image.
 * @param bool   $debug             If true, it will show the output of the command.
 *
 * @return bool
 */
function pdf_cover_2_image( $input_pdf, $output_image_name, $output_type = 'jpeg', $res = '150', $debug = false ) {
	if ( 'jpeg' === $output_type ) {
		$extension = 'jpg';
	} else {
		$extension = 'png';
	}

	if ( ! file_exists( $input_pdf ) ) {
		if ( $debug ) {
			echo '<h2>No existe el pdf solicitado</h2>';
		}

		return false;
	}

	$command = 'gs -sDEVICE=' . $output_type . ' -dTextAlphaBits=4 -dNOPAUSE -r'. $res . ' -dFirstPage=1 -dLastPage=1 -o ' . $output_image_name . '.' . $extension . ' ' . $input_pdf;
	exec( $command, $output, $return_var );

	if ( 0 !== $return_var ) {
		if ( $debug ) {
			echo 'SALIDA: <pre>';
			echo implode( '<br />', $output );
			echo '</pre>';
		}

		return false;
	}

	return true;
}
