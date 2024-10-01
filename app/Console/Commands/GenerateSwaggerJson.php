<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use OpenApi\Generator;

class GenerateSwaggerJson extends Command
{
    protected $signature = 'swagger:generate';
    protected $description = 'Generate Swagger JSON documentation';

    public function handle()
    {
        $openapi = Generator::scan(['app/Http/Controllers/']); // Ajusta el directorio según tus necesidades
       // $jsonFile = storage_path('swagger.json'); // Ruta donde se guardará el JSON
       $jsonFile = storage_path('swagger.json'); // Ruta donde se guardará el JSON

        file_put_contents($jsonFile, $openapi->toJson());
        $this->info('Swagger JSON generated successfully at ' . $jsonFile);
    }
}
