<div class="col-lg-12">
    <div class="card mb-4">
        <div class="card-body text-center">

            <div class="row">
                <div class="col-sm-6">
                    <p class="mb-0">رقم الهاتف</p>
                </div>
                <div class="ml-3 col-sm-5">
                    <input type="text" class="form-control" name="phone" title="" value="{{$client->phone}}">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    <p class="mb-0">تحقيق الهويه الشخصيه</p>
                </div>
                <div class="col-sm-5">
                <select class="form-select digits chooseWay" name="approve_id"
                                                id="exampleFormControlSelect9">
                                                <option value=''>اختر</option>
                                                @foreach($approves as $approve)
                                                <option value="{{$approve->id}}"
                                                    {{old('approve_id')==$approve->id?'selected':''}}>{{$approve->name}}
                                                </option>
                                                @endforeach


                        </select>
                   
                
                       <div style='color:red'>{{$approve_id}}</div>
               
                    


                </div>
            </div>
            <hr>
            <div class="row way" style="display: none;">
                <div class="col-sm-6">
                <label class="col-sm-12 col-form-label num_val"></label>
                </div>
                <div class="col-sm-5 mb-3">
                <input class="form-control" type="number" name="num" title="">
                    <div style='color:red'>{{$num}}</div>
                </div>
                <hr>
            </div>

           






        </div>
    </div>
</div>