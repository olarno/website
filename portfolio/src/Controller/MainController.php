<?php

namespace App\Controller;

use App\Entity\Technologies;
use App\Repository\ExperiencesRepository;
use App\Repository\ProjetsRepository;
use App\Repository\TechnologiesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
    
class MainController extends AbstractController
{
    /**
     * @Route("/", name="main_page")
     */
    public function index(TechnologiesRepository $technologiesRepository, ProjetsRepository $projetsRepository, ExperiencesRepository $experiencesRepository)
    {
        $technologies = $technologiesRepository->findAll();
        $projects = $projetsRepository->findAll();
        $experiences = $experiencesRepository->findAll();

        return $this->render('main/index.html.twig', [
            'technologies' => $technologies,
            'projects' => $projects,
            'experiences' => $experiences,
        ]);
    }
}
