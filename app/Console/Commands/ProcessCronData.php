<?php

namespace App\Console\Commands;

use App\Repositories\Counts\CountsRepository;
use App\Services\CurriculumVitaeService;
use App\Services\PostsService;
use App\Services\ProductService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ProcessCronData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:processCronData';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    protected $postsService;
    protected $productService;
    protected $curriculumVit;
    protected $countsRepository;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(
        PostsService $postsService, 
        ProductService $productService, 
        CurriculumVitaeService $curriculumVit,
        CountsRepository $countsRepository
    ){
        parent::__construct();
        $this->postsService = $postsService;
        $this->productService = $productService;
        $this->curriculumVit = $curriculumVit;
        $this->countsRepository = $countsRepository;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $cnt_news = $this->postsService->getAllCount();
            $cnt_products = $this->productService->getAllCount();
            $cnt_cvs = $this->curriculumVit->getAllCount();
            
            $params = [
                'cnt_news' => $cnt_news,
                'cnt_products' => $cnt_products,
                'cnt_cvs' => $cnt_cvs
            ];

            $count = $this->countsRepository->first();
            if($count){
                $this->countsRepository->update($params, $count->id);
            }else{
                $this->countsRepository->create($params);
            }

            Log::info('done');
        }catch(\Exception $e){
            Log::info($e->getMessage());
            return 'error';
        }
    }
}
