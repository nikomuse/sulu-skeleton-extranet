<?php

namespace App\Admin;

use Sulu\Bundle\AdminBundle\Admin\Admin;
use Sulu\Bundle\AdminBundle\Admin\Navigation\NavigationItem;
use Sulu\Bundle\AdminBundle\Admin\Navigation\NavigationItemCollection;
use Sulu\Bundle\AdminBundle\Admin\View\ViewBuilderFactoryInterface;
use Sulu\Bundle\AdminBundle\Admin\View\ViewCollection;
use Sulu\Component\Security\Authorization\PermissionTypes;

class ReportingAdmin extends Admin
{
    final public const REPORTING_LIST_KEY = 'reportings';
    const REPORTING_LIST_VIEW = 'app.reportings_list';

    public function __construct(private ViewBuilderFactoryInterface $viewBuilderFactory)
    {

    }

    public function configureNavigationItems(NavigationItemCollection $navigationItemCollection): void
    {
        $reportingNavigationItem = new NavigationItem('app.reportings');
        $reportingNavigationItem->setView(static::REPORTING_LIST_VIEW);
        $reportingNavigationItem->setIcon('su-calendar');
        $reportingNavigationItem->setPosition(30);

        $navigationItemCollection->add($reportingNavigationItem);
    }

    public function configureViews(ViewCollection $viewCollection): void
    {
        $listView = $this->viewBuilderFactory->createListViewBuilder(static::REPORTING_LIST_VIEW, '/reportings')
            ->setResourceKey(\App\Entity\Reporting::RESOURCE_KEY)
            ->setListKey(self::REPORTING_LIST_KEY)
            ->setTitle('app.reportings')
            ->addListAdapters(['table'])
            ->addToolbarActions([])
        ;

        $viewCollection->add($listView);
    }

    public function getSecurityContexts(): array
        {
            return [
                self::SULU_ADMIN_SECURITY_SYSTEM => [
                    'Client' => [
                        'sulu.client.reporting' => [
                            PermissionTypes::VIEW,
                            PermissionTypes::ADD,
                            PermissionTypes::EDIT,
                            PermissionTypes::DELETE,
                        ],
                    ],
                ],
            ];
        }
}