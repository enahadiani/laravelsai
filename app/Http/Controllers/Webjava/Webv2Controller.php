<?php 
namespace App\Http\Controllers\Webjava;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class Webv2Controller extends Controller {

    public function home() {

        return view('webjavav2.home');  
    }

    public function homeProductDetail1() {

        return view('webjavav2.home-product-detail-1');  
    }

    public function homeProductDetail2() {

        return view('webjavav2.home-product-detail-2');  
    }

    public function homeProductDetail3() {

        return view('webjavav2.home-product-detail-3');  
    }

    public function homeProductDetail4() {

        return view('webjavav2.home-product-detail-4');  
    }

    public function homeProductDetail5() {

        return view('webjavav2.home-product-detail-5');  
    }

    public function homeProductDetail6() {

        return view('webjavav2.home-product-detail-6');  
    }

    public function homeProjectDetail1() {

        return view('webjavav2.home-project-detail-1');  
    }

    public function homeProjectDetail2() {

        return view('webjavav2.home-project-detail-2');  
    }

    public function homeProjectDetail3() {

        return view('webjavav2.home-project-detail-3');  
    }

    public function homeProjectDetail4() {

        return view('webjavav2.home-project-detail-4');  
    }

    public function homeProjectDetail5() {

        return view('webjavav2.home-project-detail-5');  
    }

    public function homeProjectDetail6() {

        return view('webjavav2.home-project-detail-6');  
    }

    public function product() {

        return view('webjavav2.product');  
    }
}

?>