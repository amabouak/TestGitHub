<?php

use PHPUnit\Framework\TestCase;
use App\Produit;
use App\StockManager;
use App\Database;

class IntegrationTest extends TestCase
{
    protected function setUp(): void
    {
        Database::getTestConnection()->exec("DELETE FROM produits");
    }

    public function test_ajouter_produit()
    {
        $sm = new StockManager();
        $p = new Produit("Stylo", 1000, 5);
        $sm->ajouterProduit($p);

        $this->assertEquals(1000*5, $sm->totalStock());
    }

    public function test_supprimer_produit()
    {
        $sm = new StockManager();
        $p = new Produit("Crayon", 500, 10);
        $sm->ajouterProduit($p);
        $sm->supprimerProduit($p->getId());

        $this->assertEquals(0, $sm->totalStock());
    }

    public function test_modifier_produit()
    {
        $sm = new StockManager();
        $p = new Produit("Cahier", 1500, 5);
        $sm->ajouterProduit($p);
        $p->ajouterStock(5);
        $p->save();

        $this->assertEquals(1500*10, $sm->totalStock());
    }
}
