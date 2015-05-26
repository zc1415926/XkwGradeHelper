<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model {

	protected $connection = 'mysql';
    protected $table = 'students';
    protected $fillable = [
        'grade',
        'class',
        'name',
        'score',
        'attitude',
        'sum',
        'score_to_grade',
    ];
}
