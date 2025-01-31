<?php

namespace Bigfork\SilverstripeImageRecipe;

use SilverStripe\Assets\Storage\AssetContainer;
use SilverStripe\Core\Config\Configurable;
use SilverStripe\Core\Extension;

class WebpEnablerExtension extends Extension
{
    use Configurable;

    private static bool $enabled = true;

    public function onBeforeRender()
    {
        if (!$this->config()->get('enabled')) {
            return;
        }

        $candidates = $this->owner->getImageCandidates();
        foreach ($candidates as &$candidate) {
            $image = $candidate['image'] ?? null;
            if (!$image instanceof AssetContainer) {
                continue;
            }

            $candidate['image'] = $image->Webp();
        }
        $this->owner->setImageCandidates($candidates);
    }
}
