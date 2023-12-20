<?php

namespace App\Http\Controllers\apartment;
use App\Http\Controllers\Controller;

use App\Http\Requests\apartment\ContentRequest;
use App\Interface\apartment\ContentRepositoryInterface;
use App\Models\Apartment\Apartment;
use App\Models\Apartment\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    private $contentRepository;

    public function __construct(ContentRepositoryInterface $contentRepository)
    {
        $this->contentRepository = $contentRepository;
    }
    public function index(Request $request){
        return $this->contentRepository->index($request);    
      }
    public function create(Request $request){
        return $this->contentRepository->create($request);
    }

    public function store(ContentRequest $request){ 
        return $this->contentRepository->store($request);;
     }

     public function edit(Content $content){
        return $this->contentRepository->edit($content);
          
    }

    public function update(ContentRequest $request,Content $content){
        return $this->contentRepository->update($request,$content);
    }
    public function destroy(Content $content){
        return $this->contentRepository->destroy($content);
    }
    public function remove($apart,Content $content){
       // dd($content);
        return $this->contentRepository->remove($apart,$content);
    }
}
