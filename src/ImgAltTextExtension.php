<?php

namespace Bigfork\SilverstripeImageRecipe;

use SilverStripe\Core\Extension;

class ImgAltTextExtension extends Extension
{
    public function updateDefaultAttributes(array &$attributes): void
    {
        $image = $this->owner->getSourceImage();
        $attributes['alt'] = $image->AltText ?? '';
    }
}
