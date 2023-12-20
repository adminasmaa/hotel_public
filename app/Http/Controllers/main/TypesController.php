<?php

namespace App\Http\Controllers\main;
use App\Http\Controllers\Controller;

use App\Repository\main\TypesRepository;
use App\Interface\main\TypesRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\main\Types;
use App\Http\Requests\main\TypesRequest;
class TypesController extends Controller
{
    //
    private $typeRepository;
    public function __construct(TypesRepositoryInterface $typeRepository)
    {
        $this->typeRepository = $typeRepository;
    }
    public function index(){
        return $this->typeRepository->index();

    }
    public function store(TypesRequest $request){
        return $this->typeRepository->store($request);
    }

    public function update(TypesRequest $request,Types $type){

        return $this->typeRepository->update($request,$type);
    }
    public function destroy(Types $type){
        return $this->typeRepository->destroy($type);
    }

    public function get_type_class( $id){
        $data['data']=Types::where('class_id',$id)->get();
        return response()->json($data);
    }


}
