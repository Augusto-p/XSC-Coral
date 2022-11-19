<?php 
require_once 'utilidades/Formatos.php';
require_once 'vendor/autoload.php';
use Dompdf\Dompdf;


class PDFs{
    private $path;
    public function __construct(){
        
    }
    public function Facturar($venta, $user){
        $venta->FechaHora = Formatos::DateFacturaFormat($venta->FechaHora);
        
        ob_start();
        include 'templates/PDFs/Factura.php';
        $html =  ob_get_clean();
        $PDFPath = "public/PDfs/Facturas/Etiket-" . $venta->id .".pdf";
        $DOMPDF    = new DOMPDF(array('enable_remote' => true));
        $DOMPDF->load_html($html);
        $DOMPDF->set_option( 'dpi' , '300' );
        $DOMPDF->setPaper('A4', 'portrait');
        $DOMPDF->render();
        $output = $DOMPDF->output();
        file_put_contents($PDFPath, $output);
        return $PDFPath;
    }




}; ?>