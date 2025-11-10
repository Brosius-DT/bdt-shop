<?php
namespace App\Http\Controllers\Api;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class CartController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct()
    {
        //$this->middleware('auth');
        //$this->middleware('authorization');
        //$this->middleware('checkLicenses');
    }

}