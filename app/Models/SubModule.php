<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubModule extends Model
{
    /**
     * Atributos da classes que podem ser preenchidos
     *
     * @var array
     */
    protected $fillable = array(
        'name','url','icon','module_id',
        'sub_module_category'
    );

    /**
     * Atributos invisíveis da classe.
     *
     * @var array
     */
    protected $hidden = [
        ''
    ];

    public function sub_module_category(){
        return $this->belongsTo(SubModuleCategory::class);
    }

    public function roles(){
        return $this->hasMany(Role::class);
    }

    public function module(){
        return $this->belongsTo(Module::class);
    }

    public function read_sub_modules_by_module_and_user($module_id,$user_id = null){

        $user = User::current_web_user($user_id);

        return $user->roles->transform(function ($item){
            return $item->sub_module;
        })->where('module_id',$module_id)->unique();
    }

    /**
     * Método retorna todos os submódulos com as respectivas regras do sistema
     *
     * @return \Illuminate\Database\Eloquent\Builder|static
     */
    public function read_sub_module_with_roles(){
        return SubModule::with('roles');
    }



}
