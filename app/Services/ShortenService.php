<?php 

namespace App\Services;

use App\Repositories\ShortenedUrlRepository;
use Illuminate\Support\Str;

class ShortenService {
    private $shortenedRepository;

    public function __construct(ShortenedUrlRepository $shortenedRepository)
    {
        $this->shortenedRepository = $shortenedRepository;
    }

    public function shorten($originalUrl)
    {
        // Kiểm tra xem URL đã tồn tại hay chưa
        $existingUrl = $this->shortenedRepository->findByOriginalUrl($originalUrl);
        if ($existingUrl) {
            return url($existingUrl->short_code);
        }

        // Tạo mã rút gọn ngẫu nhiên (6 ký tự)
        $shortCode = Str::random(6);

        // Lưu vào database
        $shortenedUrl = $this->shortenedRepository->create([
            'original_url' => $originalUrl,
            'short_code' => $shortCode,
            'clicks' => 0,
        ]);

        return url($shortenedUrl->short_code);
    }

    public function getUrlByCode($code)
    {
        $shortenedUrl = $this->shortenedRepository->findByShortCode($code);

        if ($shortenedUrl) {
            // Cập nhật số lượt click
            $this->shortenedRepository->incrementClicks($shortenedUrl);
            return $shortenedUrl->original_url;
        }

        return null;
    }
}
