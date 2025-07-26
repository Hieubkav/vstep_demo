<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index()
    {
        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"' . "\n";
        $sitemap .= '        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">' . "\n";
        
        // Define routes with their priorities and change frequencies
        $routes = [
            [
                'url' => route('homepage'),
                'priority' => '1.0',
                'changefreq' => 'weekly',
                'title' => 'Step V Studio - Trang chủ'
            ],
            [
                'url' => route('projects'),
                'priority' => '0.9',
                'changefreq' => 'weekly',
                'title' => 'Step V Studio - Dự án'
            ],
            [
                'url' => route('about-us'),
                'priority' => '0.8',
                'changefreq' => 'monthly',
                'title' => 'Step V Studio - Về chúng tôi'
            ],
            [
                'url' => route('contact-us'),
                'priority' => '0.7',
                'changefreq' => 'monthly',
                'title' => 'Step V Studio - Liên hệ'
            ],
            [
                'url' => route('pricing'),
                'priority' => '0.6',
                'changefreq' => 'monthly',
                'title' => 'Step V Studio - Bảng giá'
            ],
            [
                'url' => route('services'),
                'priority' => '0.8',
                'changefreq' => 'monthly',
                'title' => 'Step V Studio - Dịch vụ'
            ]
        ];

        $lastmod = now()->format('Y-m-d');
        $logoUrl = asset('images/logo_dh.png');

        foreach ($routes as $route) {
            $sitemap .= "    <url>\n";
            $sitemap .= "        <loc>{$route['url']}</loc>\n";
            $sitemap .= "        <lastmod>{$lastmod}</lastmod>\n";
            $sitemap .= "        <changefreq>{$route['changefreq']}</changefreq>\n";
            $sitemap .= "        <priority>{$route['priority']}</priority>\n";
            $sitemap .= "        <image:image>\n";
            $sitemap .= "            <image:loc>{$logoUrl}</image:loc>\n";
            $sitemap .= "            <image:title>{$route['title']}</image:title>\n";
            $sitemap .= "        </image:image>\n";
            $sitemap .= "    </url>\n";
        }

        $sitemap .= '</urlset>';

        return response($sitemap, 200)
            ->header('Content-Type', 'application/xml');
    }
}
