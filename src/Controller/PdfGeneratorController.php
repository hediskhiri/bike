<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Dompdf\Dompdf;

class PdfGeneratorController extends AbstractController
{
    private $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    #[Route('/pdf/generator', name: 'app_pdf_generator')]
    public function index(): Response
    {
        // Récupérer les données du panier depuis la session
        $panier = $this->session->get('cart', []);

        // Données à passer au template Twig
        $data = [
          /*  'name' => 'John Doe',
            'address' => 'USA',
            'mobileNumber' => '000000000',
            'email' => 'john.doe@email.com',*/
            'panier' => $panier,
        ];

        // Rendre la vue avec les données
        $html = $this->renderView('pdf_generator/index.html.twig',$data);

        // Générer le PDF
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->render();

        // Retourner la réponse avec le PDF généré
        return new Response(
            $dompdf->stream('facture.pdf', ["Attachment" => false]),
            Response::HTTP_OK,
            ['Content-Type' => 'application/pdf']
        );
    }
}