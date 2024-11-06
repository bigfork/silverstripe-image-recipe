<?php

namespace Bigfork\SilverstripeImageRecipe;

use SilverStripe\Assets\Storage\AssetContainer;
use SilverStripe\Core\Extension;

class WebpEnablerExtension extends Extension
{
    public function onBeforeRender()
    {
        $candidates = $this->owner->getImageCandidates();
        foreach ($candidates as &$candidate) {
            $image = $candidate['image'] ?? null;
            if (!$image instanceof AssetContainer) {
                continue;
            }

            $candidate['image'] = $image->Convert('webp');
        }
        $this->owner->setImageCandidates($candidates);
    }
}
