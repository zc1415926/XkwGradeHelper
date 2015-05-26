<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Standard extends Model {

    protected $connection = 'mysql';
    protected $table = 'standard';
    protected $fillable = [
        'grade',
        'class',
        'standard-A-up',
        'standard-B-up',
        'standard-B-down',
        'standard-C-up',
        'standard-C-down',
        'standard-D-down',
    ];

}
