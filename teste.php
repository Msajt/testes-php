<? php

class FormInscricao{
    //START TCPDF
    include_once( 'vendor/autoload.php' );

    $pdf = new TCPDF('P','mm','A4');
    $pdf->SetPrintHeader(false);
    $pdf->Open();
    $pdf->AddPage();
    $pdf->SetFont('times','',12)

    //Gerar a primeira pagina do formulario

    

}
