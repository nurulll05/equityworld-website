<?php

namespace App\Services;

class RssReader
{
    public function fetch(string $url): array
    {
        $ch = curl_init($url);

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_TIMEOUT => 45,
            CURLOPT_CONNECTTIMEOUT => 10,
            CURLOPT_USERAGENT => 'EquityworldWebsite/1.0',
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_SSL_VERIFYHOST => 2,
        ]);

        $response = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);

        curl_close($ch);

        if ($response === false) {
            throw new \RuntimeException(
                'Gagal mengambil RSS: ' . $error
            );
        }

        if ($statusCode !== 200) {
            throw new \RuntimeException(
                'RSS mengembalikan HTTP: ' . $statusCode
            );
        }

        return $this->parse($response);
    }

    public function parse(string $response): array
    {
        libxml_use_internal_errors(true);

        $xml = simplexml_load_string($response);

        if ($xml === false || !isset($xml->channel)) {
            throw new \RuntimeException(
                'Format atau struktur RSS tidak valid.'
            );
        }

        $items = [];

        foreach ($xml->channel->item as $item) {
            $image = null;

            // Ambil gambar dari enclosure
            if (isset($item->enclosure)) {
                $image = (string) $item->enclosure['url'];
            }

            // Ambil gambar dari media:content atau media:thumbnail
            $namespaces = $item->getNamespaces(true);

            if (isset($namespaces['media'])) {
                $media = $item->children($namespaces['media']);

                if (!$image && isset($media->content)) {
                    $image = (string) $media->content->attributes()->url;
                }

                if (!$image && isset($media->thumbnail)) {
                    $image = (string) $media->thumbnail->attributes()->url;
                }
            }

            // Ambil gambar dari tag img di description jika tersedia
            if (!$image) {
                $descriptionHtml = (string) $item->description;

                if (preg_match(
                    "/<img[^>]+src=[\"']([^\"']+)[\"']/i",
                    $descriptionHtml,
                    $match
                )) {
                    $image = html_entity_decode(
                        $match[1],
                        ENT_QUOTES | ENT_HTML5,
                        'UTF-8'
                    );
                }
            }

            $items[] = [
                'title' => trim((string) $item->title),
                'link' => trim((string) $item->link),
                'description' => trim(
                    strip_tags((string) $item->description)
                ),
                'pubDate' => trim((string) $item->pubDate),
                'image' => $image,
            ];
        }

        return $items;
    }
}
