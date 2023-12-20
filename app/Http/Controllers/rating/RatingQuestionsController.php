<?php

namespace App\Http\Controllers\rating;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\rating\RatingQuestions;
use App\Http\Requests\rating\RatingQuestionsRequest;
use App\Interface\rating\RatingQuestionsRepositoryInterface;

class RatingQuestionsController extends Controller
{
    private $ratingQuestionsRepository;

    public function __construct(RatingQuestionsRepositoryInterface $ratingQuestionsRepository)
    {
        $this->ratingQuestionsRepository = $ratingQuestionsRepository;
    }

    public function index(){
      return $this->ratingQuestionsRepository->index();
    }
    public function create(){
        return $this->ratingQuestionsRepository->create();

    }
    public function store(RatingQuestionsRequest $request){
       return $this->ratingQuestionsRepository->store($request);
    }
    public function show(RatingQuestions $question){
        return $this->ratingQuestionsRepository->show($question);
    }
    public function edit( $question){
        return $this->ratingQuestionsRepository->edit($question);

    }
    public function update(RatingQuestionsRequest $request, $question){
        return $this->ratingQuestionsRepository->update($request,$question);
    }
    public function destroy( $question){

        return $this->ratingQuestionsRepository->destroy($question);
    }
    public function getTypes($id)
    {
        return $this->ratingQuestionsRepository->getTypes($id);
    }
}
