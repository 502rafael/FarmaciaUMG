<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'cod_pro';

    protected $fillable = ['cod_pro',
                                      'nom_pro',
                                      'imagen',
                                      'descripcion',
                                      'precio_pro',
                                      'stock',
                                      'cod_cate',
                                      'cod_pro'];
}
