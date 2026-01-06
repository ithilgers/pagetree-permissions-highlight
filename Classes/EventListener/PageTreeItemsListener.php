<?php

declare(strict_types=1);

namespace Ithilgers\PagetreePermissionsHighlight\EventListener;

use TYPO3\CMS\Backend\Controller\Event\AfterPageTreeItemsPreparedEvent;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Type\Bitmask\Permission;

final class PageTreeItemsListener
{
    private string $highlightColor;

    public function __construct(ExtensionConfiguration $extensionConfiguration)
    {
        $this->highlightColor = (string)($extensionConfiguration->get('pagetree_permissions_highlight', 'highlightColor') ?? 'rgba(0, 255, 0, 0.1)');
    }

    public function __invoke(AfterPageTreeItemsPreparedEvent $event): void
    {
        $backendUser = $GLOBALS['BE_USER'];

        // Admins haben alle Rechte - Färbung für sie überspringen
        if ($backendUser->isAdmin()) {
            return;
        }

        $items = $event->getItems();

        foreach ($items as &$item) {
            if (isset($item['_page']) && $backendUser->doesUserHaveAccess($item['_page'], Permission::CONTENT_EDIT)) {
                $item['backgroundColor'] = $this->highlightColor;
            }
        }

        $event->setItems($items);
    }
}
