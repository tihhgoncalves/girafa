<? 
  //Parâmetros..
  $titulo = 'Usuários do Sistema - Simples';
  
  //Abre Documento..
  $pdf = new FPDF("P","mm","A4");
  $pdf->SetTitle(utf8_decode($titulo)); 
  $pdf->Open(); 
  $pdf->AddPage(); 
  
  //Cabeçalho...
  $pdf->SetFont("Arial", "B", 18); 
  $pdf->Image($cms->GetAdminImagePath() . 'logoPDF.jpg', 8, 20, 40);
  $pdf->Cell(100, 0, utf8_decode($titulo)); 
  $pdf->Output(); 
?>