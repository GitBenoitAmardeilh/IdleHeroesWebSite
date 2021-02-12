<?php

namespace App\Controller;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// - AbstractController permet de ne pas utiliser de Response
// - Route() est utiliser à la place de Route.yaml

class PropertyController extends AbstractController {

    /**
     * @var PropertyRepository
     */
    private $repository;

    /**
     * @var ObjectManager
     */
    private $om;

    /* - Tous les controllers et repository sont accéssibles via autowiring. On peux donc initialiser au niveau du constructeur
       - Lien fait via la class "Property.php"
         Line 9 : @ORM\Entity(repositoryClass=PropertyRepository::class)*/
    public function __construct(PropertyRepository $repository, EntityManagerInterface $om)
    {
        $this->repository = $repository;
        $this->om = $om;
    }

    /**
     * @Route ("/biens", name="property.index")
     * @param PropertyRepository $repository
     * @return Response
     */
    public function index(PropertyRepository $repository): Response
    {
        $property = $repository->findLatest();

        return $this->render('property/index.html.twig', [
            'properties' => $property
        ]);
    }

}