<?php 

function parse__krymea_ru(string $url) {
    return parse($url, [
        function ($dom) {
            $origin = 'https://krymea.ru';

            $titles = $dom->find('.content_list.tiled .tile .ft_caption a')->toArray();
            $titles = array_map(function ($element) {
                return $element->innerHtml;
            }, $titles);

            $descriptions = $dom->find('.field.ft_html.f_content > .value')->toArray();
            $descriptions = array_map(function ($element) {
                return $element->innerHtml;
            }, $descriptions);

            $original_urls = $dom->find('.content_list.tiled .tile .ft_caption a')->toArray();
            $original_urls = array_map(function ($element) use ($origin) {
                return $origin . $element->href;
            }, $original_urls);

            $pictures = $dom->find('.content_list.tiled.kurorts_list .photo > a > img')->toArray();
            $pictures = array_map(function ($element) use ($origin) {
                return $origin . $element->src;
            }, $pictures);

            $result = [];

            for ($i = 0; $i < count($titles); $i++) {
                array_push($result, [
                    'title' => $titles[$i],
                    'description' => $descriptions[$i],
                    'original_url' => $original_urls[$i],
                    'picture' => $pictures[$i],
                ]);
            }

            return $result;
        }
    ]);
}