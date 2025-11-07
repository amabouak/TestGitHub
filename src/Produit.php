<?php

namespace App;
use Exception;

class Produit {
    private ?int $id;
    private string $nom;
    private float $prix;
    private int $quantite;

    public function __construct(string $nom, float $prix, int $quantite = 0, ?int $id = null)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prix = $prix;
        $this->quantite = $quantite;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getPrix(): float
    {
        return $this->prix;
    }

    public function getQuantite(): int
    {
        return $this->quantite;
    }

    public function ajouterStock(int $quantite): void
    {
        if ($quantite < 0) {
            throw new Exception("Quantité invalide");
        }
        $this->quantite += $quantite;
    }

    public function reduireStock(int $quantite): void
    {
        if ($quantite > $this->quantite) {
            throw new Exception("Stock insuffisant");
        }
        $this->quantite -= $quantite;
    }

    public function save(): void
    {
        $pdo = Database::getTestConnection();
        if ($this->id === null) {
            $stmt = $pdo->prepare("INSERT INTO produits (nom, prix, quantite) VALUES (:nom, :prix, :quantite)");
            $stmt->execute([
                ':nom' => $this->nom,
                ':prix' => $this->prix,
                ':quantite' => $this->quantite
            ]);
            $this->id = (int)$pdo->lastInsertId();
        } else {
            $stmt = $pdo->prepare("UPDATE produits SET nom = :nom, prix = :prix, quantite = :quantite WHERE id = :id");
            $stmt->execute([
                ':nom' => $this->nom,
                ':prix' => $this->prix,
                ':quantite' => $this->quantite,
                ':id' => $this->id
            ]);
        }
    }

    public static function all(): array
    {
        $pdo = Database::getTestConnection();
        $stmt = $pdo->query("SELECT * FROM produits");
        $produits = [];
        while ($row = $stmt->fetch()) {
            $produits[] = new Produit($row['nom'], (float)$row['prix'], (int)$row['quantite'], (int)$row['id']);
        }
        return $produits;
    }

    public static function find(int $id): ?Produit
    {
        $pdo = Database::getTestConnection();
        $stmt = $pdo->prepare("SELECT * FROM produits WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        if (!$row) return null;

        return new Produit($row['nom'], (float)$row['prix'], (int)$row['quantite'], (int)$row['id']);
    }

    public static function delete(int $id): void
    {
        $pdo = Database::getTestConnection();
        $stmt = $pdo->prepare("DELETE FROM produits WHERE id = ?");
        $stmt->execute([$id]);
    }
}
