<?php

namespace App\Http\Controllers\rating;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests\rating\RatingRequest;
use App\Models\rating\Rating;
use App\Models\rating\Rating_imgs;
use App\Interface\rating\RatingRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{
    private $ratingRepository;

    public function __construct(RatingRepositoryInterface $ratingRepository)
    {
        $this->ratingRepository = $ratingRepository;
    }

    public function index(){
      return $this->ratingRepository->index();
    }
    public function showRatings($id){
        return $this->ratingRepository->showRatings($id);
    }
    public function create(){
        return $this->ratingRepository->create();

    }
    public function store(Request $request){
       return $this->ratingRepository->store($request);;
    }
    public function show(Rating $rating,Rating_imgs $imgs){
        return $this->ratingRepository->show($rating,$imgs);
    }

    public function destroy(Rating $rating){
        return $this->ratingRepository->destroy($rating);
    }

    public function add_rate(RatingRequest $request){
        return $this->ratingRepository->add_rate($request);
    }

    public function answerForm($profession_id){
        return $this->ratingRepository->answerForm($profession_id);
    }

    // public function saveimage(Request $request){
    //     return $this->ratingRepository->saveimage($request);
    // }
    public function showStatistics()
    {
        return $this->ratingRepository->showStatistics();
    }

    public function get_employe_attendance(Request $request)

    {
        return $this->ratingRepository->get_employe_attendance($request);
    }

    public function getEmployees($id)
    {
        return $this->ratingRepository->getEmployees($id);
    }
    public function getTypes($id)
    {
        return $this->ratingRepository->getTypes($id);
    }

    public function remove_img($id)
    {
        return $this->ratingRepository->remove_img($id);
    }
 public function doupload(Request $request)
 {
    return $this->ratingRepository->doupload($request);
}
}
