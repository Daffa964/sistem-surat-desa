<?php

namespace App\Services;

use App\Models\PengajuanSurat;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class LetterService
{
    public function generateLetter(PengajuanSurat $pengajuan)
    {
        // Generate QR code
        $qrCode = $this->generateQrCode($pengajuan);
        
        // Generate PDF
        $pdf = $this->generatePdf($pengajuan, $qrCode);
        
        // Save the file path to the database
        $pengajuan->file_path_final = 'surat_' . $pengajuan->id . '.pdf';
        $pengajuan->save();
        
        return $pdf;
    }
    
    private function generateQrCode(PengajuanSurat $pengajuan)
    {
        // Generate QR code with verification URL
        $verificationUrl = route('verifikasi.show', $pengajuan->id);
        
        // Generate QR code as SVG
        $qrCode = QrCode::size(200)->generate($verificationUrl);
        
        return $qrCode;
    }
    
    private function generatePdf(PengajuanSurat $pengajuan, $qrCode)
    {
        // Load the appropriate template based on the letter type
        $template = $pengajuan->jenisSurat->template_path;
        
        // Prepare data for the template
        $data = [
            'pengajuan' => $pengajuan,
            'qrCode' => $qrCode,
            'nomor_surat' => $this->generateNomorSurat($pengajuan)
        ];
        
        // Check if the template view exists
        if (!view()->exists($template)) {
            throw new \Exception("Template view '{$template}' not found.");
        }
        
        // Generate PDF
        $pdf = Pdf::loadView($template, $data);
        
        // Save the PDF to storage
        $fileName = 'surat_' . $pengajuan->id . '.pdf';
        $pdf->save(storage_path('app/public/' . $fileName));
        
        return $pdf;
    }
    
    private function generateNomorSurat(PengajuanSurat $pengajuan)
    {
        // Generate a standardized letter number
        $year = date('Y');
        $month = date('m');
        $day = date('d');
        
        return $pengajuan->id . '/KD/' . $day . '/' . $month . '/' . $year;
    }
}