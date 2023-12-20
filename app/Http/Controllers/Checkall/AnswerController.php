<?php

namespace App\Http\Controllers\Checkall;

use App\Http\Controllers\Controller;
use App\Interface\Checkall\AnswerRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Checkall\CheckallAnswer;

class AnswerController extends Controller
{
    private $answerRepository;

    public function __construct(AnswerRepositoryInterface $answerRepository)
    {
        $this->answerRepository = $answerRepository;
    }
    public function index()
    {
        return $this->answerRepository->index();
    }
    public function addAnswer()
    {
        return $this->answerRepository->addAnswer();
    }
    public function doupload(Request $request)
    {
        //  print_r($request->all());exit;
        return $this->answerRepository->doupload($request);
    }

    public function selectType(Request $request)
    {
        return $this->answerRepository->selectType($request);
    }

    public function answerForm($id)
    {
        return $this->answerRepository->answerForm($id);
    }

    public function saveimage(Request $request)
    {
        return $this->answerRepository->saveimage($request);
    }

    public function store(Request $request)
    {
        return $this->answerRepository->store($request);
    }

    public function destroy($ids)
    {
        return $this->answerRepository->destroy($ids);
    }

    public function show($ids)
    {
        return $this->answerRepository->show($ids);
    }


    public function Get_Statistics_answer(Request $request )
    {
        return $this->answerRepository->Get_Statistics_answer($request);
    }
    public function Get_Statistics_answer_emp(Request $request )
    {
        return $this->answerRepository->Get_Statistics_answer_emp($request);
    }
}
