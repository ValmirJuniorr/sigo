<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * Atributos da classes que podem ser preenchidos
     *
     * @var array
     */
    protected $fillable = array(
        'name','display','sub_module_id'
    );

    /**
     * Atributos invisíveis da classe.
     *
     * @var array
     */
    protected $hidden = [
        ''
    ];

    public function sub_module(){
        return $this->belongsTo(SubModule::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
