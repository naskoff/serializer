<?php

namespace App\Controller;

use App\Controller\Response\SkyNetResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\PropertyNormalizer;
use Symfony\Component\Serializer\Serializer;

class XmlParseController extends AbstractController
{
    #[Route('/xml-parse', name: 'app_xml_parse')]
    public function index(string $projectDirectory): JsonResponse
    {
        $encoders = [new XmlEncoder()];
        $normalizers = [new GetSetMethodNormalizer()];

        $serializer = new Serializer($normalizers, $encoders);

        $ds = DIRECTORY_SEPARATOR;
        $directory = implode($ds, [$projectDirectory, 'var', 'storage']).$ds;

        //$filename = 'create-waybill.xml';
        //$filename = 'create-waybill.xml';
        $filename = 'get-offices.xml';

        /** @var string $content */
        $content = file_get_contents($directory.$filename);

        $response = $serializer->deserialize($content, SkyNetResponse::class, XmlEncoder::FORMAT, [

        ]);

        dd($response);
    }
}
