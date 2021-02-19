<?php
require_once(__DIR__.'/vendor/autoload.php');

use setasign\Fpdi\Fpdi;

$pdf = new Fpdi();
$pageCount = $pdf->setSourceFile(__DIR__.'/pdf/g_digital.pdf');//Pega o PDF da G_Digital e conta as paginas do PDF

for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {

    $pdf->AddPage(); 
    $tplIdx = $pdf->importPage($pageNo);
    $pdf->useTemplate($tplIdx);

    $pdf->SetTextColor(125,211,251);//Cor da fonte
    $pdf->SetFont('Helvetica', 'B', '14'); //Fonte, Bold, Tamanho

    $pdf->SetY(260);//Posição eixo Y
    $pdf->Cell(0,5,'Nome: Nome Sobrenome',0,0,'R');//0,5-> Margin superior, Strng->Cpf, Borda->0,0 / ("R"->deixa a direita "C"->Centro "L"->Esquerda)
    $pdf->Ln();//Quebra uma linha
    $pdf->Cell(0,5,'Cpf: 999.999.999.99',0,0,'R');
    
}
$pdf->Output("leisLGPD.pdf","I");//Nome do arquivo e "D" Força download "I"Manda para o browser
