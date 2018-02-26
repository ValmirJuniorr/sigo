@include('expense_category.form',['expense_category' => $expense_category ,
 'action' => 'ExpenseCategoryController@update' , 'actionName' => Lang::get('crud.Edit')])