<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table ="_z_address";
    public $timestamps = false;

    protected $fillable = [
    	'line_1',
    	'line_2',
    	'line_3',
    	'apartment_no',
    	'building_name',
    	'plot_no',
    	'street_name',
    	'province_id',
    	'city_id',
    	'region_id',
    	'subregion_id',
    	'zip_or_postal',
    	'phone',
    	'note',
    	'created',
    	'register_by',
    	'modified',
    	'modified_by',
    ];
}
