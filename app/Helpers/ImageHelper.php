<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class ImageHelper
{
    /**
     * Convert storage path to full URL or handle image data with type
     *
     * @param string|array|null $imageData
     * @param string|null $fallback
     * @return string
     */
    public static function getImageUrl($imageData, ?string $fallback = null): string
    {
        // Nếu là array với image_type
        if (is_array($imageData)) {
            if (isset($imageData['image_type']) && $imageData['image_type'] === 'url' && !empty($imageData['image_url'])) {
                return $imageData['image_url'];
            }
            if (!empty($imageData['image'])) {
                return self::processImagePath($imageData['image']);
            }
            if (!empty($imageData['url'])) {
                return self::processImagePath($imageData['url']);
            }
        }

        // Nếu là string
        if (is_string($imageData)) {
            return self::processImagePath($imageData);
        }

        // Fallback
        return $fallback ?? 'https://via.placeholder.com/400x300?text=No+Image';
    }

    /**
     * Process image path to URL
     *
     * @param string $path
     * @return string
     */
    private static function processImagePath(string $path): string
    {
        // Nếu không có path
        if (empty($path)) {
            return 'https://via.placeholder.com/400x300?text=No+Image';
        }

        // Nếu đã là URL đầy đủ, return nguyên
        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        // Nếu là storage path, convert thành URL
        return Storage::url($path);
    }

    /**
     * Get multiple image URLs from array
     *
     * @param array $images
     * @param string $urlKey
     * @return array
     */
    public static function getImageUrls(array $images, string $urlKey = 'url'): array
    {
        return array_map(function ($image) use ($urlKey) {
            // Xử lý cấu trúc mới với image_type
            if (isset($image['image_type'])) {
                $image[$urlKey] = self::getImageUrl($image);
            } elseif (isset($image[$urlKey])) {
                $image[$urlKey] = self::getImageUrl($image[$urlKey]);
            }
            return $image;
        }, $images);
    }
}
