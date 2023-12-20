<?php


namespace App\Interface\rating;
use App\Http\Requests\rating\RatingQuestionsRequest;
use App\Models\rating\RatingQuestions;
use Illuminate\Http\Request;

interface RatingQuestionsRepositoryInterface
{
   public function index();
   public function create();

    public function store(RatingQuestionsRequest $request);
    public function edit( $question); 
    public function show(RatingQuestions $question);
    public function update( $request, $question);

    public function destroy( $ClientsStatus);
    public function getTypes($id);
   
  
}