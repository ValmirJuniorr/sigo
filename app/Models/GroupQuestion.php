<?php

namespace App\Models;

use App\Model\Procedure;
use App\Models\Util\ValidatorModel;
use Illuminate\Database\Eloquent\Model;

class GroupQuestion extends Model
{
    const STORE_GROUP_QUESTION = 'store_group_question';

    const UPDATE_GROUP_QUESTION = 'update_group_question';

    const DELETE_GROUP_QUESTION = 'delete_group_question';

    const READ_GROUP_QUESTION = 'read_group_question';


    private $attribute = array(
        'title' => 'Titúlo',
        'priority' => 'Prioridade',
        'procedure_id' => 'Procedimento'
    );

    public static function change_priority($group_question_one, $group_question_two)
    {
        $group_question_one = GroupQuestion::findorFail($group_question_one->id);
        $group_question_two = GroupQuestion::findorFail($group_question_two->id);
        $aux =$group_question_one->priority;
        $group_question_one->priority = $group_question_two->priority;
        $group_question_two->priority = $aux;
        $group_question_one->save();
        $group_question_two->save();
    }

    public function procedure(){
        return $this->belongsTo(Procedure::class);
    }

    public function questions(){
        return $this->hasMany(Question::class);
    }

    public function get_last_priority($procedure_id)
    {
        $groupQuestions = $this->read_by_procedure($procedure_id);
        return $groupQuestions->count() > 0 ? $groupQuestions->last()->priority+1: 1;
    }

    public function create($object, $arguments = [])
    {
        if(ValidatorModel::validation($this->inputs($object),$this->rules(),$this->attribute)){
            return $object->save();
        }
    }

    public function edit($object, $arguments = [])
    {
        $groupQuestion_edit = GroupQuestion::findorFail($object->id);
        $groupQuestion_edit->title = $object->title;
        if(ValidatorModel::validation($this->inputs($groupQuestion_edit),$this->rules(),$this->attribute)){
            return $groupQuestion_edit->save();
        }
    }


    public function remove($object, $arguments = [])
    {
        return GroupQuestion::findorFail($object->id)->delete();
    }

    public function read_by_procedure($procedure_id)
    {
        return GroupQuestion::where('procedure_id', $procedure_id)->orderBy('priority','ASC')->get();
    }

    public function filter($input = [])
    {
    }

    public function inputs($object)
    {
        return [
            'title' => $object->title,
            'priority' => $object->priority,
            'procedure_id' => $object->procedure_id
        ];
    }

    public function rules($id = 0)
    {
        return [
            'title' => 'required',
            'priority' => 'required',
            'procedure_id' => 'required|numeric|min:0'
        ];
    }
}