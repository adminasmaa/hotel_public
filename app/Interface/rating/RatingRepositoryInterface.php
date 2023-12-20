<?php


namespace App\Interface\rating;
use App\Http\Requests\rating\RatingRequest;
use App\Models\rating\Rating;
use App\Models\rating\Rating_imgs;
use Illuminate\Http\Request;

interface RatingRepositoryInterface
{
   public function index();
   public function create();
   public function showRatings($id);
   public function showStatistics();
    public function store( $request);
    public function show(Rating $rating,Rating_imgs $imgs);

    public function destroy(Rating $RatingStatus);
    public function add_rate(RatingRequest $request);

    public function answerForm($profession_id);
    public function get_employe_attendance(Request $request);
    public function getEmployees($id);
    public function getTypes($id);
    public function remove_img($id);
    public function doupload(Request $request);
}