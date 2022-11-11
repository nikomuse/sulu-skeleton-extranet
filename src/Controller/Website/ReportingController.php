<?php

namespace App\Controller\Website;

use App\Entity\Reporting;
use App\Form\ReportingFormType;
use App\Repository\ReportingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/reporting')]
class ReportingController extends AbstractController {

    /**
     * Display & process form to create a new reporting
     */
    #[Route('', name: 'website_new_reporting')]
    public function new(Request $request): Response {
        $reporting = new Reporting();

        $form = $this->createForm(ReportingFormType::class, $reporting);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $reporting = $form->getData();

            // ... perform some action, such as saving the task to the database

            return $this->redirectToRoute('website_new_reporting');
        }

        return $this->renderForm('reporting/new.html.twig', [
            'form' => $form,
        ]);
    }

    /**
     * Display fraud reportings
     */
    #[Route('/fraud', name: 'website_fraud_reporting')]
    public function fraud(Request $request, ReportingRepository $reportingRepository): Response {
        $reportings = $reportingRepository->findBy(array('type' => 'INF'));
        return $this->render('reporting/index.html.twig', [
            'reportings' => $reportings
        ]);
    }

    /**
     * Display report reportings
     */
    #[Route('/report', name: 'website_report_reporting')]
    public function report(Request $request): Response {
        return $this->render('reporting/index.html.twig', [

        ]);
    }
}