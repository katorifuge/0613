<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $guarded = array('id');
    public static $rules = array(
        'content' => 'required', 'numeric|between:0,20'
    );
    public function getData()
    {
        return $this->id . ':' . $this->content ;
    }
}
