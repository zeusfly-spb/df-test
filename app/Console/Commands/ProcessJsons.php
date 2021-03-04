<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\CategoryService;
use App\Services\ProductService;

class ProcessJsons extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'process:json';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse json files & seed db';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(CategoryService $categoryService, ProductService $productService)
    {
        $start = microtime(true);
        $categories = json_decode(file_get_contents(base_path('categories.json')), true);
        $products = json_decode(file_get_contents(base_path('products.json')), true);
        $elapsed = microtime(true) - $start;
        foreach ($categories as $category) {
            $categoryService->create($category);
        }
        foreach ($products as $product) {
            $productService->create($product);
        }
        $totalRows = count($categories) + count($products);
        $this->info("Обработано {$totalRows} строк, за {$elapsed} сек.");
    }
}
