<?php
    $xmlString = '<?xml version="1.0" encoding="UTF-8"?>
    <urlset
    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
    xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd"
    xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';


    $urlSite = [
        '/',
        '/artigos',
        '/nossa-equipe',
        '/painel'
    ];

    foreach ($urlSite as $site) {
        $xmlString .=   '<url>';
        $xmlString .=  '<loc>'.base_url($site) .'</loc>';
        $xmlString .= ' <priority>0.5</priority><changefreq>daily</changefreq>';
        $xmlString .=  '</url>';
    }

    foreach ($artigos as $artigo) {
        $xmlString .=   '<url>';
        $xmlString .=  '<loc>'.base_url('/artigos/') . $artigo['slug'] .'</loc>';
        $xmlString .= ' <priority>0.5</priority><changefreq>daily</changefreq>';
        $xmlString .=  '</url>';
    }

    $xmlString .= '</urlset>';

    $dom = new DOMDocument;
    $dom->preserveWhiteSpace = FALSE;
    $dom->loadXML($xmlString);
    $dom->save($_SERVER["DOCUMENT_ROOT"].'/sitemap.xml');
?>