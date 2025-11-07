<?php

use PHPUnit\Framework\TestCase;
use App\Database;
use App\Produit;

class ProduitTest extends TestCase
{
    protected function setUp(): void
    {
        Database::getTestConnection()->exec("DELETE FROM produits");
    }

    public function test_creation_produit()
    {
        $p = new Produit("Stylo", 1000, 5);
        $p->save();

        $this->assertNotNull($p->getId());
        $this->assertEquals("Stylo", $p->getNom());
        $this->assertEquals(5, $p->getQuantite());
    }

    public function test_ajout_stock()
    {
        $p = new Produit("Crayon", 500, 10);
        $p->ajouterStock(5);
        $this->assertEquals(15, $p->getQuantite());
    }

    public function test_reduction_stock()
    {
        $p = new Produit("Crayon", 500, 10);
        $p->reduireStock(3);
        $this->assertEquals(7, $p->getQuantite());
    }

    public function test_reduction_stock_insuffisant()
    {
        $p = new Produit("Crayon", 500, 10);
        $this->expectException(Exception::class);
        $p->reduireStock(15);
    }

    public function test_find_produit()
    {
        $p = new Produit("Stylo", 1000, 5);
        $p->save();
        $found = Produit::find($p->getId());
        $this->assertEquals($p->getNom(), $found->getNom());
    }

    public function test_delete_produit()
    {
        $p = new Produit("Stylo", 1000, 5);
        $p->save();
        $id = $p->getId();
        Produit::delete($id);
        $this->assertNull(Produit::find($id));
    }
}
