<?php
/**
 * Imager X plugin for Craft CMS
 *
 * Ninja powered image transforms.
 *
 * @link      https://www.spacecat.ninja
 * @copyright Copyright (c) 2020 André Elvan
 */

namespace spacecatninja\imagerx\effects;

use Imagine\Gd\Image as GdImage;
use Imagine\Imagick\Image as ImagickImage;
use spacecatninja\imagerx\services\ImagerService;

class NormalizeEffect implements ImagerEffectsInterface
{
    /**
     * @param GdImage|ImagickImage        $imageInstance
     * @param array|string|int|float|bool|null $params
     */
    public static function apply($imageInstance, $params)
    {
        if (ImagerService::$imageDriver === 'imagick') {
            /** @var ImagickImage $imageInstance */
            $imagickInstance = $imageInstance->getImagick();
            if ($params) {
                $imagickInstance->normalizeImage();
            }
        }
    }
}
