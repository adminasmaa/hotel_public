@if($subTypes->count()>0)
<div class="media-body">
    <div class="mb-3 row">
        <label class="col-sm-12 col-form-label">انواع {{$name}}</label>
        @foreach($subTypes as $value)
            <div class="col-sm-3">             
                <input type="radio" name='subType_id' value="{{$value->id}}" class="" placeholder="" {{$value->id==$sub?'checked':''}}>{{$value->name}}
            </div>
        @endforeach
    </div>
</div>
@else
<div>
    <input type="hidden" name="subType_id" value=''>
</div>
@endif