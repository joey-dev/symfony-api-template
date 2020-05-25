<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * @Route("/api/assets", name="assets_")
 */
class AssetsController extends AbstractController
{
    /**
     * @Route("/{folder}/{subfolder}/{file}", name="files")
     */
    public function index(string $folder, string $subfolder, string $file)
    {
        $response = new BinaryFileResponse("assets/$folder/$subfolder/$file");
        return $response;
    }
}
