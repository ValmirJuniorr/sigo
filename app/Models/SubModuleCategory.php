<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubModuleCategory extends Model
{
    /**
     * Atributos da classes que podem ser preenchidos
     *
     * @var array
     */
    protected $fillable = array(
        'name'
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
        return $this->hasMany(SubModule::class);
    }

    public function sub_modules_by_module_and_user($module_id,$user_id){

    }

}
