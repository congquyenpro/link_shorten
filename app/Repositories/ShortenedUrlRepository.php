<?php 

namespace App\Repositories;

use App\Models\ShortenedUrl;

class ShortenedUrlRepository extends BaseRepository
{
    public function __construct(ShortenedUrl $model)
    {
        parent::__construct($model);
    }

    public function findByOriginalUrl($url)
    {
        return $this->model->where('original_url', $url)->first();
    }

    public function findByShortCode($shortCode)
    {
        return $this->model->where('short_code', $shortCode)->first();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function incrementClicks($shortenedUrl)
    {
        $shortenedUrl->increment('clicks');
    }
}
