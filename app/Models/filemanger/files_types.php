<?php

namespace App\Models\filemanger;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Scopes\BranchScope;

class files_types extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded=[];
    protected $appends = ['count'];

    public function getCountAttribute(){
        return filesmanger::where('file_type_id',$this->id)->count();
    }



}
