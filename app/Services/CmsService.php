<?php

namespace App\Services;

use Illuminate\Support\Facades\File;

class CmsService
{
    private function path(): string
    {
        return storage_path('app/cms/website.json');
    }

    public function all(): array
    {
        $path = $this->path();

        if (!File::exists($path)) {
            return [];
        }

        return json_decode(File::get($path), true) ?? [];
    }

    public function get(string $key, $default = null)
    {
        return data_get($this->all(), $key, $default);
    }

    public function save(array $data): void
    {
        $path = $this->path();

        File::ensureDirectoryExists(dirname($path));

        File::put(
            $path,
            json_encode(
                $data,
                JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
            )
        );
    }

    public function update(string $key, $value): void
    {
        $data = $this->all();

        data_set($data, $key, $value);

        $this->save($data);
    }
}
