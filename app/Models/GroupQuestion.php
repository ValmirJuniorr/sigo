<?php

namespace App\Models;

use App\Models\Procedure;
use App\Models\Util\ValidatorModel;
use App\Exceptions\Util\ValidationException;
use Illuminate\Database\Eloquent\Model;

class GroupQuestion extends Model
{


    public function procedure(){
        return $this->belongsTo(Procedure::class);
    }

    public function questions(){
        return $this->hasMany(Question::class);
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


    /**
     * @param $group_question
     * @param $increment -1 to increase the priority +1 to decrease the priority
     * @throws ValidationException
     */
    public static function change_priority($group_question, $increment)
    {
        $group_question = GroupQuestion::findorFail($group_question->id);
        if($increment == 1){
            $operator =  "<";
            $orderBy = "DESC";
        }else{
            $operator =  ">";
            $orderBy = "ASC";
        }
        $group_question_temp = GroupQuestion::where('procedure_id', $group_question->procedure_id)
                                    ->orderBy('priority',$orderBy)
                                    ->where('priority' ,$operator,$group_question->priority)->first();
        if($group_question_temp == null){
            $msg  = ( $operator == '<' ) ? "Não pode aumentar a prioridade do  primeiro" : "Não pode diminuir a prioridade do  ultimo";
            throw new ValidationException($msg);
        }
        $aux = $group_question->priority;
        $group_question->priority = $group_question_temp->priority;
        $group_question_temp->priority = $aux;
        $group_question->save();
        $group_question_temp->save();
    }

    public function remove($object, $arguments = [])
    {
        return GroupQuestion::findorFail($object->id)->delete();
    }

    public static function read_by_procedure($procedure_id)
    {
        return GroupQuestion::where('procedure_id', $procedure_id)->orderBy('priority','ASC')->get();
    }

    public static function read_by_procedure_with_questions($procedure_id)
    {
        return GroupQuestion::where('procedure_id', $procedure_id)
            ->with('questions')
            ->orderBy('priority','ASC')
            ->get();
    }

    public static function get_last_priority($procedure_id)
    {
        $groupQuestions = GroupQuestion::read_by_procedure($procedure_id);
        return $groupQuestions->count() > 0 ? $groupQuestions->last()->priority+1: 1;
    }


    public function filter($input = [])
    {
    }

    private $attribute = array(
        'title' => 'Titúlo',
        'priority' => 'Prioridade',
        'procedure_id' => 'Procedimento'
    );

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