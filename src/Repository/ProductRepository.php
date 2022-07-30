<?php

namespace App\Repository;

use App\Entity\Product;
use DateTimeImmutable;
use DateTimeZone;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Product>
 *
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    public function add($request): void
    {
        $product = new Product();
        $product->setName($request->name);
        $product->setDescription($request->description);
        $product->setNumberOfProduct($request->number_of_product);
        $product->setPrice($request->price);
        $product->setCreatedAt(new DateTimeImmutable('', new DateTimeZone('Asia/Istanbul')));

        $this->getEntityManager()->persist($product);
        $this->getEntityManager()->flush();
    }

    public function update(Product $product, $request)
    {
        $product->setName($request->name);
        $product->setDescription($request->description);
        $product->setNumberOfProduct($request->number_of_product);
        $product->setPrice($request->price);

        $this->getEntityManager()->persist($product);
        $this->getEntityManager()->flush();
    }

    public function remove(Product $product): void
    {

        $this->getEntityManager()->remove($product);
        $this->getEntityManager()->flush();
    }
}
