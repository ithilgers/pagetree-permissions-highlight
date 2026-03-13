<?php

declare(strict_types=1);

namespace Ithilgers\PagetreePermissionsHighlight\EventListener;

use TYPO3\CMS\Backend\Controller\Event\AfterBackendPageRenderEvent;
use TYPO3\CMS\Core\Page\PageRenderer;

final class BackendTemplateListener
{
    public function __construct(
        private readonly PageRenderer $pageRenderer,
    ) {}

    public function __invoke(AfterBackendPageRenderEvent $event): void
    {
        $backendUser = $GLOBALS['BE_USER'];

        if ($backendUser->isAdmin()) {
            return;
        }

        $this->pageRenderer->loadJavaScriptModule(
            '@ithilgers/pagetree-permissions-highlight/permissions-filter-toggle.js'
        );
    }
}
