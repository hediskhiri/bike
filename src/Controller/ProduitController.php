<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Form\ProduitType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Doctrine\ORM\Tools\Pagination\Paginator;
#[Route('/produit')]
class ProduitController extends AbstractController
{
    #[Route('/', name: 'app_produit_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $produits = $entityManager
            ->getRepository(Produit::class)
            ->findAll();

        return $this->render('produit/index.html.twig', [
            'produits' => $produits,
        ]);
    }

    #[Route('/front', name: 'app_produit_front', methods: ['GET'])]
    public function produitfront(EntityManagerInterface $entityManager, Request $request): Response
    {


        $query = $entityManager->getRepository(Produit::class)
        ->createQueryBuilder('p')
        ->orderBy('p.idprod', 'DESC')
        ->getQuery();


        $produits = new Paginator($query);

        $currentPage = $request->query->getInt('page', 1);
        $itemsPerPage = 6;

        $produits
        ->getQuery()
        ->setFirstResult($itemsPerPage * ($currentPage - 1))
        ->setMaxResults($itemsPerPage);

        $totalItems = count($produits);
        $pagesCount = ceil($totalItems / $itemsPerPage);

        return $this->render('produit/show.html.twig', [
            'produits' => $produits,
            'CurrentPage' => $currentPage,
            'pagesCount' => $pagesCount,
        ]);
    }

    #[Route('/new', name: 'app_produit_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, ValidatorInterface $validator): Response
    {
        $produit = new Produit();
        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Validation des champs prixprod, nomprod et remise
            $prixProd = $form->get('prixprod')->getData();
            $nomProd = $form->get('nomprod')->getData();
            $remise = $form->get('remise')->getData();

            // Vérification si le champ prixprod est vide ou nul
            if (empty($prixProd) || $prixProd <= 0) {
                $this->addFlash('error', 'Le prix du produit doit être supérieur à zéro.');
                return $this->redirectToRoute('app_produit_new');
            }

            // Validation via le ValidatorInterface (d'autres validations peuvent être ajoutées ici)
            $errors = $validator->validate($produit);
            if (count($errors) > 0) {
                $this->addFlash('error', 'Veuillez corriger les erreurs dans le formulaire.');
                // Afficher les erreurs si nécessaire
                // foreach ($errors as $error) {
                //     $this->addFlash('error', $error->getMessage());
                // }
                return $this->redirectToRoute('app_produit_new');
            }

            try {
                $entityManager->persist($produit);
                $entityManager->flush();

                $this->addFlash('success', 'Le produit a été créé avec succès.');
                return $this->redirectToRoute('app_produit_index');
            } catch (\Exception $e) {
                $this->addFlash('error', 'Une erreur est survenue lors de la création du produit.');
                var_dump($e->getMessage()); // Output the error message for debugging
            }
        }

        return $this->renderForm('produit/new.html.twig', [
            'produit' => $produit,
            'form' => $form,
        ]);
    }

    #[Route('/{idprod}', name: 'app_produit_single', methods: ['GET'])]
    public function show(Produit $produit): Response
    {
        return $this->render('produit/single.html.twig', [
            'produit' => $produit,
        ]);
    }

    #[Route('/{idprod}/edit', name: 'app_produit_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Produit $produit, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // ... Code de traitement des données du formulaire pour l'édition
        }

        return $this->renderForm('produit/edit.html.twig', [
            'produit' => $produit,
            'form' => $form,
        ]);
    }

    #[Route('/{idprod}', name: 'app_produit_delete', methods: ['POST'])]
    public function delete(Request $request, Produit $produit, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($produit);
        $entityManager->flush();
        return $this->redirectToRoute('app_produit_index', [], Response::HTTP_SEE_OTHER);
    }
}
