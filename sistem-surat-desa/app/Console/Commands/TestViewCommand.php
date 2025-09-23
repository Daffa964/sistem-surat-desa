<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\View;

class TestViewCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:view';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test view loading';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Testing view loading...');
        
        // Test if the welcome view exists
        $this->info('Welcome view exists: ' . (View::exists('welcome') ? 'Yes' : 'No'));
        
        // Test if our template views exist
        $templates = [
            'templates.surat.sku',
            'templates.surat.sktm',
            'templates.surat.skd',
            'templates.surat.skck',
            'templates.surat.skl',
            'templates.layout'
        ];
        
        foreach ($templates as $template) {
            $this->info("{$template} exists: " . (View::exists($template) ? 'Yes' : 'No'));
        }
        
        // Try to find the view file directly
        $finder = app('view.finder');
        try {
            $path = $finder->find('templates.surat.sku');
            $this->info("Found templates.surat.sku at: {$path}");
        } catch (\Exception $e) {
            $this->error("Error finding templates.surat.sku: " . $e->getMessage());
        }
        
        // Check file system directly
        $viewPath = resource_path('views/templates/surat.sku.blade.php');
        $this->info("File exists at {$viewPath}: " . (file_exists($viewPath) ? 'Yes' : 'No'));
        
        // Check all template files
        $templateFiles = glob(resource_path('views/templates/surat.*.blade.php'));
        $this->info('Template files found:');
        foreach ($templateFiles as $file) {
            $this->info("  " . basename($file));
        }
        
        // Check view namespaces
        $this->info('View namespaces:');
        $hints = app('view.finder')->getHints();
        foreach ($hints as $namespace => $paths) {
            $this->info("  {$namespace}: " . implode(', ', $paths));
        }
        
        // Try to load the view directly
        try {
            $view = View::make('templates.surat.sku', []);
            $this->info('Successfully created view instance');
        } catch (\Exception $e) {
            $this->error("Error creating view: " . $e->getMessage());
        }
    }
}