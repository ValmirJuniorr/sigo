<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{

    /**
     * Atributos da classes que podem ser preenchidos
     *
     * @var array
     */
    protected $fillable = array(
        'name','color','icon','description'
    );

    /**
     * Atributos invisíveis da classe.
     *
     * @var array
     */
    protected $hidden = [
        ''
    ];

    private $user;

    /**
     * Module constructor.
     * @param $user
     */
    public function __construct()
    {
        $this->user = new User();
    }


    public function sub_modules(){
        return $this->hasMany(SubModule::class);
    }

    public function read_modules_by_user($user_id = null){

        $user = User::current_web_user($user_id);

        return $user->roles->transform(function ($item){
            return $item->sub_module->module;
        })->unique();
    }

}
