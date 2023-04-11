<?php

namespace Bigfork\SilverstripeImageRecipe;

use JonoM\FocusPoint\FieldType\DBFocusPoint;
use SilverStripe\Assets\Image;
use SilverStripe\Core\Extension;

class ObjectPositionExtension extends Extension
{
    public function updateAttributes(array &$attributes)
    {
        /** @var Image $image */
        $image = $this->owner->getDefaultImage();
        /** @var DBFocusPoint $focusPoint */
        $focusPoint = $image->FocusPoint;

        $style = !empty($attributes['style']) ? $attributes['style'] . ' ' : '';
        $style .= "object-position: {$focusPoint->PercentageX()}% {$focusPoint->PercentageY()}%;";
        $attributes['style'] = $style;
    }
}
