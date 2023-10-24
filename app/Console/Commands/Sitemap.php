<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DOMDocument;
use Spatie\Sitemap\SitemapGenerator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class Sitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        $filePath = public_path('sitemap.xml');
        if (File::exists($filePath)) {
            File::delete($filePath);
        }

        SitemapGenerator::create('https://binhminhtmc-plus.bota.vn/')->writeToFile(public_path('sitemap.xml'));

        $sitemap = public_path('sitemap.xml');

        $xsltReference = '<?xml-stylesheet type="text/xsl" href="sitemap.xsl"?>'. PHP_EOL;

        $fileContent = file($sitemap);

        $fileContent[0] .= $xsltReference;

        file_put_contents($sitemap, implode('', $fileContent));

        $dom = new DOMDocument();
        $dom->load($sitemap);

        $urls = $dom->getElementsByTagName('url');

        foreach ($urls as $url) {
            $loc = $url->getElementsByTagName('loc')->item(0)->textContent;
            if (str_contains($loc, '/storage/') !== false) {
                $url->parentNode->removeChild($url);
            }
        }

        $dom->save($sitemap);
    }

}
