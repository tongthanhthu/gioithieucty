<?php

namespace App\Http\Controllers;

use DOMDocument;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

class SitemapController extends Controller
{

    public function generate()
    {
        // Tạo sitemap và ghi vào tệp sitemap.xml
        SitemapGenerator::create('/')->writeToFile(public_path('sitemap.xml'));

        $sitemap = public_path('sitemap.xml');

        $xsltReference = '<?xml-stylesheet type="text/xsl" href="sitemap.xsl"?>'. PHP_EOL;

        // Đọc toàn bộ nội dung từ tệp vào một mảng
        $fileContent = file($sitemap);

        // Ghi dữ liệu mới vào dòng thứ hai
        $fileContent[0] .= $xsltReference;

        // Ghi nội dung đã sửa vào tệp sitemap.xml
        file_put_contents($sitemap, implode('', $fileContent));

        // Tạo một đối tượng DOM từ nội dung của tệp sitemap.xml
        $dom = new DOMDocument();
        $dom->load($sitemap);

        // Lấy tất cả các thẻ <url>
        $urls = $dom->getElementsByTagName('url');

        // Duyệt qua từng thẻ <url> và kiểm tra <loc> của mỗi URL
        foreach ($urls as $url) {
            $loc = $url->getElementsByTagName('loc')->item(0)->textContent;
            // Kiểm tra nếu URL chứa "storage"
            if (str_contains($loc, '/storage/') !== false) {
                $url->parentNode->removeChild($url);
            }
        }

        // Lưu lại tệp sau khi chỉnh sửa
        $dom->save($sitemap);
    }
}
