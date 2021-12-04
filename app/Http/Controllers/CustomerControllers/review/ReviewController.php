<?php

namespace App\Http\Controllers\CustomerControllers\review;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    protected $review;
    protected $requestData;

    function __construct(){
        $this->review = new Review();
        $this->requestData = Request()->all();;
    }

    public function create(){
         $data = $this->requestData;
         $this->review->addRate($data);

         return "order rated";
    }
}
