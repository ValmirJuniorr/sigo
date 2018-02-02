<?php

namespace App\Models;

use App\Models\Util\Crud;
use App\Models\Util\ValidatorModel;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model implements Crud
{

    const STORE_CUSTOMER = 'store_customer';

    const UPDATE_CUSTOMER = 'update_customer';

    const DELETE_CUSTOMER = 'delete_customer';

    const READ_CUSTOMER = 'read_customer';


    /**
     * Nome do modelo para serem gerados os logs.
     * @constant String
     */
    const LOG_NAME = "Cliente";

    /**
     * Atributos da classes que podem ser preenchidos
     *
     * @var array
     */
    protected $fillable = array(
        'name', 'addres', 'email','cpf','rg','phone','cell_phone','birth_date','city','neighborhood','cep','uf','gender'
    );

    /**
     * Atributos invisíveis da classe.
     *
     * @var array
     */
    protected $hidden = [
        'activated'
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
        'address' => 'Endereço',
        'email' => 'E-mai',
        'cpf' => 'CPF',
        'rg' => 'RG',
        'phone' => 'Telefone',
        'cell_phone' => 'Celular',
        'birth_date' => 'Data de Aniversario',
        'city' => 'Cidade',
        'neighborhood' => 'Bairro',
        'cep' => 'Cep',
        'uf' => 'UF',
        'gender' => 'Gênero',
    );

    public function read_all($arguments = [])
    {
        return Customer::where('activated',TRUE)->orderBy('name');
    }

    public function create($object, $arguments = [])
    {
       if(ValidatorModel::validation($this->inputs($object),$this->rules(),$this->attribute)){
            return $object->save();
        }
    }

    public function remove($object_id, $arguments = [])
    {
        $customer = Customer::findOrFail($object_id);
        $customer->activated = false;
        return $customer->save();
    }

    public function edit($object, $arguments = [])
    {
        $customer_edit = Customer::findorFail($object->id);
        $customer_edit->name = $object->name;
        $customer_edit->address = $object->address;
        $customer_edit->email = $object->email;
        $customer_edit->cpf = $object->cpf;
        $customer_edit->rg = $object->rg;
        $customer_edit->phone = $object->phone;
        $customer_edit->cell_phone = $object->cell_phone;
        $customer_edit->birth_date = $object->birth_date;
        $customer_edit->city = $object->city;
        $customer_edit->neighborhood = $object->neighborhood;
        $customer_edit->cep = $object->cep;
        $customer_edit->uf = $object->uf;
        $customer_edit->gender = $object->gender;
        if(ValidatorModel::validation($this->inputs($customer_edit),$this->rules($customer_edit->id),$this->attribute)){
            return $customer_edit->save();
        }
    }

    public function read($object_id, $arguments = [])
    {
        return Customer::where('activated',true)->where('id',$object_id)->first();
    }

    public function filter($input = [])
    {
        // TODO: Implement filter() method.
    }

    public function inputs($object)
    {
        return [
            'name' => $object->name,
            'address' => $object->address,
            'email' => $object->email,
            'cpf' => $object->cpf,
            'rg' => $object->rg,
            'phone' => $object->phone,
            'cell_phone' => $object->cell_phone,
            'birth_date' => $object->birth_date,
            'neighborhood' => $object->neighborhood,
            'city' => $object->city,
            'cep' => $object->cep,
            'uf' => $object->uf,
            'gender' => $object->gender,
        ];
    }

    public function rules($id = 0)
    {
        return [
            'name' => 'required',
            'address' => 'required|max:200|min:0',
            'email' => '',
            'cpf' => 'required|unique:customers,cpf,'.$id,
            'rg' => 'required|unique:customers,rg,'.$id,
            'phone' => '',
            'cell_phone' => '',
            'birth_date' => 'required',
            'city' => 'required',
            'neighborhood' => '',
            'cep' => 'required',
            'uf' => '',
            'gender' => 'required',
        ];
    }
}
