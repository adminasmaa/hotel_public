@extends('layouts.admin')
@section('title', 'التفتيش')

@section('content')
    <div class="container-fluid" style="background: #f4f4f4;">
        <div class="row">
            <form class="mega-vertical" action="{{route('checkalls.store')}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="col-sm-12 p-20">
                    <div class="card height-equal">
                        <div class="card-header">
                            <h5> التفتيش</h5>
                        </div>
                        <div class="card-body">

                            <div class="row">

                            <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">النوع</label>
                                            <div class="col-sm-9">
                                            <select class="form-select digits" id="exampleFormControlSelect9" name="type_id" value="{{old('type_id')}}">
                                                        <option value=''>اختر النوع</option>
                                                        @foreach($types as $item)
                                                          <option value='{{$item->id}}' >{{$item->name}}</option>
                                                        @endforeach
                                                   
                                            </select>
                                                @error('type_id')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                                
                                <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> السؤال </label>
                                            <div class="col-sm-9">
                                                <textarea name='question' rows="5" class="form-control">{{old('question')}}</textarea>
                    
                                                @error('question')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> الترتيب </label>
                                            <div class="col-sm-9">
                                                <input type="number" name='order'
                                                       value="{{old('order')}}" class="form-control"
                                                       placeholder="">
                                                @error('order')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                

                                
                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-footer text-center">
                            <button class="btn btn-primary m-r-15" type="submit">حفظ</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection
@section('scripts')    
@endsection

