<?php

use App\Produit;
use Illuminate\Database\Seeder;

class ProduitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Produit = new Produit();
        $Produit->name = "walid";
        $Produit->description = "the new one ";
        $Produit->prix_ht = 45.54;
        $Produit->photo_principale = "goonies.png";
        $Produit->save();

        $Produit = new Produit();
        $Produit->name = "simo";
        $Produit->description = "the new two ";
        $Produit->prix_ht = 42.54;
        $Produit->photo_principale = "happy.png";
        $Produit->save();
        $Produit = new Produit();
        $Produit->name = "walid";
        $Produit->description = "the new therre ";
        $Produit->prix_ht = 5.54;
        $Produit->photo_principale = "hulk.png";
        $Produit->save();
        $Produit = new Produit();
        $Produit->name = "walid";
        $Produit->description = "the new one ";
        $Produit->prix_ht = 485.4;
        $Produit->photo_principale = "krusty_simpsons.png";
        $Produit->save();
        $Produit = new Produit();
        $Produit->name = "walid";
        $Produit->description = "the new one ";
        $Produit->prix_ht = 45.54;
        $Produit->photo_principale = "star_trek_kirk.png";
        $Produit->save();
        $Produit = new Produit();
        $Produit->name = "walid";
        $Produit->description = "the new one ";
        $Produit->prix_ht = 455.54;
        $Produit->photo_principale = "super_man.png";
        $Produit->save();
        $Produit = new Produit();
        $Produit->name = "walid";
        $Produit->description = "the new one ";
        $Produit->prix_ht = 95.54;
        $Produit->photo_principale = "wonder_woman.png";
        $Produit->save();
    }
}
