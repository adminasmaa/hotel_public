<?php

namespace App\Http\Controllers\Commitment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Commitment\CommitmentSectionRequest;
use App\Interface\Commitment\CommitmentSectionRepositoryInterface;
use App\Models\Commitment\CommitmentSection;
use Illuminate\Http\Request;

class CommitmentSectionController extends Controller
{
    private $commitmentSection;

    public function __construct(CommitmentSectionRepositoryInterface $commitmentSection)
    {
        $this->commitmentSection = $commitmentSection;
    }

    public function index(){
        return $this->commitmentSection->index();
    }
    public function store(CommitmentSectionRequest $request){
        return $this->commitmentSection->store($request);
    }
    public function update(CommitmentSectionRequest $request,CommitmentSection $commitmentSection){

        return $this->commitmentSection->update($request,$commitmentSection);
    }
    public function destroy(CommitmentSection $commitmentSection){
        return $this->commitmentSection->destroy( $commitmentSection);
    }
}
