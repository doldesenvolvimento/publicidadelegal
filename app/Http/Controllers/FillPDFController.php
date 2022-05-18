<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use setasign\Fpdi\Fpdi;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class FillPDFController extends Controller
{
    public function process(Request $request)
    {
        // download sample file.
        Storage::disk('local')->put('test.pdf', file_get_contents('https://ceapg.fgv.br/sites/ceapg.fgv.br/files/teste.pdf'));
 
        $outputFile = Storage::disk('local')->path('output.pdf');
        // fill data
        $this->fillPDF(Storage::disk('local')->path('test.pdf'), $outputFile);
        //output to browser
        return response()->file($outputFile);
    }
 
    public function fillPDF($file, $outputFile)
    {
        $fpdi = new FPDI;
        // merger operations
        $count = $fpdi->setSourceFile($file);
        for ($i=1; $i<=$count; $i++) {
            $template = $fpdi->importPage($i);
            $size = $fpdi->getTemplateSize($template);
            $fpdi->AddPage($size['orientation'], array($size['width'], $size['height']));
            $fpdi->useTemplate($template);
            $img = QrCode::size(100)->format('eps')->generate('https:://dol.com.br');
            $fpdi->SetFont("helvetica", "", 15);
            $fpdi->SetTextColor(153,0,153);
            $fpdi->Image($img,10,6,30);
        }
        return $fpdi->Output($outputFile, 'F');
    }
}
