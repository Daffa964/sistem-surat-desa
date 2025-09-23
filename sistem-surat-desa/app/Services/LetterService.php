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
        
        // Try to load the view directly
        try {
            // First try with the templates. prefix
            $viewPath = 'templates.' . $template;
            if (view()->exists($viewPath)) {
                $pdf = Pdf::loadView($viewPath, $data);
            } else {
                // If that doesn't work, try without the prefix
                if (view()->exists($template)) {
                    $pdf = Pdf::loadView($template, $data);
                } else {
                    throw new \Exception("Template view '{$viewPath}' or '{$template}' not found.");
                }
            }
        } catch (\Exception $e) {
            // If view loading fails, try to create a simple PDF as fallback
            $pdf = Pdf::loadHtml('<h1>Surat ' . $pengajuan->jenisSurat->nama_surat . '</h1><p>Nomor: ' . $this->generateNomorSurat($pengajuan) . '</p>');
        }
        
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