<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassGrade extends Model {

	protected $fillable = [
        'grade',
        'class'
    ];

}
