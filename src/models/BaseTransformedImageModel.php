<?php
/**
 * Imager X plugin for Craft CMS
 *
 * Ninja powered image transforms.
 *
 * @link      https://www.spacecat.ninja
 * @copyright Copyright (c) 2020 André Elvan
 */

namespace spacecatninja\imagerx\models;

use spacecatninja\imagerx\ImagerX;
use spacecatninja\imagerx\exceptions\ImagerException;


class BaseTransformedImageModel
{
    /**
     * @var string
     */
    public $path;
    
    /**
     * @var string
     */
    public $filename;
    
    /**
     * @var string
     */
    public $url;
    
    /**
     * @var string
     */
    public $extension;
    
    /**
     * @var string
     */
    public $mimeType;
    
    /**
     * @var int
     */
    public $width;
    
    /**
     * @var int
     */
    public $height;
    
    /**
     * @var int|float
     */
    public $size;
    
    /**
     * @var bool
     */
    public $isNew;

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @return string
     */
    public function getFilename(): string
    {
        return $this->filename;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getExtension(): string
    {
        return $this->extension;
    }

    /**
     * @return string
     */
    public function getMimeType(): string
    {
        return $this->mimeType;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return (int)$this->width;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return (int)$this->height;
    }
    
    /**
     * @return bool
     */
    public function getIsNew(): bool 
    {
        return $this->isNew;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->url;
    }
    
    /**
     * @param array $settings
     * @return string
     * @throws ImagerException
     */
    public function getPlaceholder($settings = []):string
    {
        if ($settings) {
            if (!isset($settings['width'])) {
                $settings['width'] = $this->width;
            }
            if (!isset($settings['height'])) {
                $settings['height'] = $this->height;
            }
        }
        
        return ImagerX::$plugin->placeholder->placeholder($settings);
    }
}
