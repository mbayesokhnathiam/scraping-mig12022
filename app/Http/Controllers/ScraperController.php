<?php

namespace App\Http\Controllers;

use Goutte\Client;
use App\Models\Company;
use Illuminate\Http\Request;

class ScraperController extends Controller
{
    public function index(){
        
        $client = new Client();

        $website = $client->request('GET','https://www.businesslist.com.ng/category/interior-design/city:lagos');

        $companies = $website->filter('.company')->each(function($node){

            $company = new Company();

            $company->title = $node->children()->eq(0)->text();
            $company->address = $node->children()->eq(1)->text();
            
            

            // $node->children()->each(function($child){
            //     if($child->matches('.details')){
            //         if(!empty($child->text())){
            //             $company->detail = $child->text();
            //             //dump($child->text());
            //         }

                    
            //     }
            // });

            $company->save();
               
        });

        return 'Toutes les companies ont été i,porté à partir du site';

        
    }
}
