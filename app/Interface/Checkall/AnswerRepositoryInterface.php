<?php

namespace App\Interface\Checkall;

use Illuminate\Http\Request;

interface AnswerRepositoryInterface
{
    public function index();
    public function addAnswer();
    public function selectType(Request $request);
    public function answerForm($id);
    public function saveimage(Request $request);
    public function store(Request $request);
    public function destroy($ids);
    public function show($ids);
    public function Get_Statistics_answer($request );
    public function Get_Statistics_answer_emp($request);

}
