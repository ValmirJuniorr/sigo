<?php

namespace App\Models;

use App\Exceptions\User\AuthenticationException;
use App\Exceptions\Util\NotAccessPermissionException;
use App\Models\Util\Crud;
use App\Models\Util\ValidatorModel;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;


class User extends Authenticatable implements Crud
{
    use Notifiable;

    const STORE_USER = 'store_user';

    const UPDATE_USER = 'update_user';

    const DELETE_USER = 'delete_user';

    const READ_USER = 'read_user';

    /**
     * Nome do modelo para serem gerados os logs.
     * @constant String
     */
    const LOG_NAME = "usuário";

    /**
     * Atributos da classes que podem ser preenchidos
     *
     * @var array
     */
    protected $fillable = array(
        'name', 'email', 'password','username'
    );

    /**
     * Atributos invisíveis da classe.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','activated'
    ];


    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    /**
     * Tradução dos atributos da classe
     * @var array
     */
    private $attribute = array(
        'name' => 'Nome',
        'username' => 'Nome do Usuario',
        'password' => 'Senha',
        'email' => 'E-Mail',
    );

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function do_login($user)
    {
        if(Auth::attempt(['username' => $user->username,'password' => $user->password,'activated' => true])){
            $user = User::where('username',$user->username)->where('activated',true)->limit(1)->first();
            return $user;
        }else{
            throw new AuthenticationException("Usuário e/ou Senha Inválidos");
        }
    }

    public function create($object,$arguments = [])
    {
        if(ValidatorModel::validation($this->inputs($object),$this->rules(),$this->attribute)){
            if ($object->save()){
                $object->roles()->attach($arguments['roles']);
                return true;
            }
            return false;
        }
    }

    public function edit($object,$arguments = [])
    {
        $user = User::findorFail($object->id);
        $user->name = $object->name;
        $user->username = $object->username;
        $user->email = $object->email;
        if(ValidatorModel::validation($this->inputs($user),$this->rules($user->id),$this->attribute)){
            if($user->save()){
                $user->roles()->sync($arguments['roles'],true);
                return true;
            }
            return false;
        }
    }

    public function read($object_id,$arguments = [])
    {
        return User::findOrFail($object_id);
    }

    public function read_all($arguments = [])
    {
        return User::where('activated',TRUE)->orderBy('name');
    }

    public function filter($input)
    {
        // TODO: Implement filter() method.
    }

    public function remove($object_id,$arguments = [])
    {
        $user = User::findOrFail($object_id);
        $user->activated = false;
        return $user->save();
    }

    public static function current_web_user($user_id = null){

        $user = new User();

        return $user_id == null ? User::findOrFail(session('user_id')) : $user->read($user_id);

    }

    public static function has_role($user = null,$role){
        if($user == null)
           $user = Auth::user();

        if($user->roles->where('name',$role)->first()){
            return true;
        }else{
            return false;
        }
    }

    public function role_checked($role_id){
        return count($this->roles()->where('role_id',$role_id)->get()) == 1 ? TRUE : FALSE;
    }


    public function inputs($object)
    {
        return [
            'name' => $object->name,
            'username' => $object->username,
            'password' => $object->password,
            'email' => $object->email,
        ];
    }

    public function rules($id = 0)
    {
        return [
            'name' => 'required',
            'username' => 'required|unique:users,username,'.$id,
            'password' => 'required',
            'email' => 'required|email|unique:users,email,'.$id
        ];
    }

}
