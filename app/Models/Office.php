<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    const STORE_CLINICAL_OFFICE = 'store_office';

    const UPDATE_CLINICAL_OFFICE = 'update_office';

    const DELETE_CLINICAL_OFFICE = 'delete_office';

    const READ_CLINICAL_OFFICE = 'read_office';


    public function schedule(){
        return $this->belongsToMany(Schedule::class);
    }




    private $attribute = array(
        'name' => 'Nome',
    );
















    public function inputs($object)
    {
        return [
            'name' => $object->name,
        ];
    }

    public function rules($id = 0)
    {
        return [
            'name' => 'required',
        ];
    }

}
