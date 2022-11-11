<?php

namespace App\Security;

use App\Admin\ExtranetAdmin;
use Sulu\Bundle\SecurityBundle\System\SystemStoreInterface;
use Symfony\Bundle\SecurityBundle\Security\FirewallMap;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Http\FirewallMapInterface;

class SecuritySystemSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private SystemStoreInterface $systemStore,
        private FirewallMapInterface $map,
    ) {
        if (!$map instanceof FirewallMap) {
            throw new \LogicException(\sprintf('Expected "%s" but got "%s".', FirewallMap::class, \get_class($map)));
        }
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::REQUEST => [
                // need to be after @see \Sulu\Bundle\SecurityBundle\EventListener\SystemListener::getSubscribedEvents
                // need to be before @see \Symfony\Bundle\SecurityBundle\EventListener\FirewallListener::getSubscribedEvents
                ['processSecuritySystem', 9],
            ],
        ];
    }

    public function processSecuritySystem(RequestEvent $event): void
    {
        if (!$event->isMainRequest()) {
            return;
        }

        $config = $this->map->getFirewallConfig($event->getRequest());
        if (!$config) {
            return;
        }

        if ('extranet' === $config->getName()) {
            $this->systemStore->setSystem(ExtranetAdmin::SYSTEM);
        }
    }
}