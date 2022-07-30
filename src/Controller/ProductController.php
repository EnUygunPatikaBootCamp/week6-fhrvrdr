<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{

    private $productRepository;
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    #[Route('/product', name: 'list_product', methods: 'GET')]
    public function index(): JsonResponse
    {

        $products = $this->productRepository->findAll();
        return $this->json([
            'message' => 'Ürünler başariyla listelendi.',
            $products

        ]);
    }

    #[Route('/product', name: 'create_product', methods: 'POST')]
    public function create(Request $request): JsonResponse
    {
        $jsonData = json_decode($request->getContent());

        $this->productRepository->add($jsonData);
        return $this->json([
            'message' => 'Ürün başariyla oluşturuldu.',

        ]);
    }

    #[Route('/product/{id}', name: 'show_product', methods: 'GET')]
    public function show($id): JsonResponse
    {
        $product = $this->productRepository->find($id);
        return $this->json([
            'message' => 'Ürün başarıyla listelendi.',
            $product
        ]);
    }

    #[Route('/product/{id}', name: 'update_product', methods: 'PUT')]
    public function update(Request $request, $id): JsonResponse
    {
        $prodcut = $this->productRepository->find($id);
        $jsonData = json_decode($request->getContent());

        $this->productRepository->update($prodcut, $jsonData);
        return $this->json([
            'message' => 'Ürün başarılı bir şekilde güncellendi.',
        ]);
    }

    #[Route('/product/{id}', name: 'delete_product', methods: 'DELETE')]
    public function delete($id): JsonResponse
    {
        $prodcut = $this->productRepository->find($id);
        $this->productRepository->remove($prodcut);
        return $this->json([
            'message' => 'Ürün başarılı bir şekilde silindi.',
        ]);
    }
}
