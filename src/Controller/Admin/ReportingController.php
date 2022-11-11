<?php


namespace App\Controller\Admin;

use App\Common\DoctrineListRepresentationFactory;
use App\Entity\Reporting;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\View\View;
use FOS\RestBundle\View\ViewHandlerInterface;
use Sulu\Component\Rest\ListBuilder\Doctrine\DoctrineListBuilderFactoryInterface;
use Sulu\Component\Rest\ListBuilder\Metadata\FieldDescriptorFactoryInterface;
use Sulu\Component\Rest\ListBuilder\PaginatedRepresentation;
use Sulu\Component\Rest\RestHelperInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

/**
 * @RouteResource("reporting")
 */
class ReportingController extends AbstractController implements ClassResourceInterface {

    public function __construct(
        private ViewHandlerInterface $viewHandler,
        private FieldDescriptorFactoryInterface $fieldDescriptorFactory,
        private DoctrineListBuilderFactoryInterface $listBuilderFactory,
        private RestHelperInterface $restHelper,
        private DoctrineListRepresentationFactory $doctrineListRepresentationFactory
    ) {
        $this->fieldDescriptorFactory = $fieldDescriptorFactory;
        $this->listBuilderFactory = $listBuilderFactory;
        $this->doctrineListRepresentationFactory = $doctrineListRepresentationFactory;
    }

    /**
     * [Route(path: '/admin/api/reportings', methods: ['GET'], name: 'app.get_reporting_list_   ')]
     */
    public function cgetAction(): Response {
        $fieldDescriptors = $this->fieldDescriptorFactory->getFieldDescriptors(Reporting::RESOURCE_KEY);
        $listBuilder = $this->listBuilderFactory->create(Reporting::class);
        $this->restHelper->initializeListBuilder($listBuilder, $fieldDescriptors);

        $listRepresentation = new PaginatedRepresentation(
            $listBuilder->execute(),
            Reporting::RESOURCE_KEY,
            $listBuilder->getCurrentPage(),
            $listBuilder->getLimit(),
            $listBuilder->count()
        );

        return $this->viewHandler->handle(View::create($listRepresentation));
    }

    /**
     * [Route(path: '/admin/api/reportings', methods: ['GET'], name: 'app.get_reporting_list')]
     */
    public function getListAction(): Response
    {
        $listRepresentation = $this->doctrineListRepresentationFactory->createDoctrineListRepresentation(
            Reporting::RESOURCE_KEY,
        );

        return $this->json($listRepresentation->toArray());
    }

    public static function getSubscribedServices(): array {
        return array();
    }
}