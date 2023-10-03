<?php

namespace Bigfork\SilverstripeImageRecipe;

use SilverStripe\Core\Extension;

class ImageAltTextExtension extends Extension
{
    public function updateAttributes(array &$attributes): void
    {
        $attributes['alt'] = $this->owner->AltText ?? '';
    }
}
