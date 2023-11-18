<? php

class FormInscricao{
    //START TCPDF
    include_once( 'vendor/autoload.php' );

    $pdf = new TCPDF('P','mm','A4');
    $pdf->SetPrintHeader(false);
    $pdf->Open();
    
    $htmlTables = [" ", " ", ""];

    for($i=0; $i<3; i++){
        $pdf->AddPage();
        $pdf->SetFont('times','',12);
        //Gerar as tabelas da inscrição
        $pdf->writeHTML($htmlTables[$i], true, false, true, false, "");
    }

    $pdf->AddPage();
    $pdf->SetFont('times', '', 12);
    $htmlQuestionario = "
        <html>
            <h2>Questionário de Prontidão para Atividade Física (PAR-Q)</h2>
            <p></p>
            <p></p>
            <br>
            <dl>
                <dt></dt>
                    <dd></dd>
                <dt></dt>
                    <dd></dd>
                <dt></dt>
                    <dd></dd> 
                <dt></dt>
                    <dd></dd> 
                <dt></dt>
                    <dd></dd> 
                <dt></dt>
                    <dd></dd>
                <dt></dt>
                    <dd></dd> 
            </dl>
            <br>
            <h3>Observação</h3>
            <p></p>
            <br>
            <ol>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ol>
            <p></p>
        </html>
    ";
    $pdf->writeHTML($htmlQuestionario, true, false, true, false, "");
   
    $pdf->SetFont('times','',12);
    $pdf->SetXY(20, 230);
    $pdf->Cell(170,5,"Local e data: __________________ ____/____/________",0,0,'R');
    $pdf->Cell(170,5,"Assinatura do aluno:       _________________________________",0,0,'C');
    $pdf->Cell(170,5,"Assinatura do responsável: _________________________________",0,0,'C');
    
    // Gerar imagem de fundo
    // get the current page break margin
    $bMargin = $pdf->getBreakMargin();
    // get current auto-page-break mode
    $auto_page_break = $pdf->getAutoPageBreak();
    // disable auto-page-break
    $pdf->SetAutoPageBreak(false, 0);
    // set background image
    $img_file = "arquivo imagem";
    $pdf->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
    // restore auto-page-break status
    $pdf->SetAutoPageBreak($auto_page_break, $bMargin);
    // set the starting point for the page content
    $pdf->setPageMark();
}
