<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\PengajuanSurat;
use App\Services\LetterService;

class TestLetterGeneration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:letter {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test letter generation';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $id = $this->argument('id');
        
        $pengajuan = PengajuanSurat::find($id);
        
        if (!$pengajuan) {
            $this->error("Pengajuan with ID {$id} not found.");
            return;
        }
        
        $this->info("Generating letter for pengajuan ID: {$id}");
        
        try {
            $letterService = new LetterService();
            $pdf = $letterService->generateLetter($pengajuan);
            
            $this->info("Letter generated successfully!");
            $this->info("File path: " . $pengajuan->file_path_final);
            
            // Check if file exists
            $filePath = storage_path('app/public/' . $pengajuan->file_path_final);
            $this->info("File exists: " . (file_exists($filePath) ? 'Yes' : 'No'));
            
            if (file_exists($filePath)) {
                $this->info("File size: " . filesize($filePath) . " bytes");
            }
        } catch (\Exception $e) {
            $this->error("Error generating letter: " . $e->getMessage());
            $this->error("Trace: " . $e->getTraceAsString());
        }
    }
}