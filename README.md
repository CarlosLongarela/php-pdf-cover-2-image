# PHP pdf cover 2 image
PHP simple function to convert pdf file cover to image (jpeg or png)

```
// Example of use.
$path = dirname( __FILE__ );

$pdf_file    = $path . '/pdf-uploads/test-cover.pdf';
$image_path  = $path . '/image-covers/';
$image_cover = $image_path . 'cover-image96';

// Check if the directory for images exists or create it if it doesn't.
if ( ! file_exists( $image_path ) ) {
	mkdir( $image_path, 0777, true );
}

$res = pdf_cover_2_image( $pdf_file, $image_cover, 'png16m', '96', true );

if ( $res ) {
	echo '<h2>La portada se creó correctamente</h2>';
} else {
	echo '<h2>Hubo un error al crear la portada</h2>';
}
```
