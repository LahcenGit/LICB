<?php

namespace App\Http\Controllers;

use App\Models\Deliverycost;
use App\Models\Productline;
use Illuminate\Http\Request;

class CalculateTotalController extends Controller
{
    //
    public function calculerTotal( $products , $wilaya , $commune , $shipping , $qte )
    {
        // Effectuez le calcul du total des produits selon la logique souhaitée
        $total = 0;
        $total_f = 0;
        $delivery_cost = Deliverycost::where('wilaya',$wilaya)->where('commune',$commune)->first();
        for($i=0; $i<count($products) ; $i++){
            $productline = Productline::where('id',$products[$i])->first();// calculate total
            if($productline->promo_price != NULL){
                $total = $total + $productline->promo_price * $qte[$i];

            }
            else{
                $total = $total + $productline->price * $qte[$i];
            }
        }
        if($shipping == "bureau"){
            $total_f = $total + $delivery_cost->price_b;
            $delivery_cost = $delivery_cost->price_b;
            }
            if($shipping == "domicile"){
                $total_f =  $delivery_cost->price_a + $delivery_cost->supp;
                $delivery_cost = $delivery_cost->price_a + $delivery_cost->supp;
            }


        return [
            'total' => $total,
            'total_f' => $total_f,
            'delivery_cost' => $delivery_cost,

        ];
    }
}
