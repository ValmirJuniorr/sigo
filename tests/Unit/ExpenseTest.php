<?php

namespace Tests\Unit;

use App\Models\Expensive\Expense;
use App\Models\Expensive\ExpenseCategory;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ExpenseTest extends TestCase
{


    private $expense;

    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();

        $this->expense = new Expense();
        $this->expense->number_of_days = NULL;
        $this->expense->expire_expense_routine_date = NULL;
        $this->expense->expire_expense_date = Carbon::now()->addDays(15)->format('Y-m-d');
        $this->expense->price = 560.59;
        $this->expense->expense_category_id = ExpenseCategory::find(1)->id;
        $this->expense->description = 'asdsamd pasdaspodkaspod kasdpo pokdaspodkas paosdaspodaspod kaspo kopasdpsoakdas dopaskaspaso kdsapodasdp okadposap dokasdpoasd
         asd pasdkasdopsak kaspodkas dpoaskd poaskdsapodaspo dkas kpasodokasasp odkasdp asopdksapdoas kpodksadpas podsadpaso kdaspod pokaspo dkasdpoas aspoksa apsokdd
         aspodkasdpoaskd kpoa pkosakdaspkp asokdas poaskdasdp okasdpoasaspo dkasdpoas kdasp kaspoodaskposa kdaspokasp odk pasokdas kposadkas opaskdaspo kaspodpasosadd
         as dksaod poaskdaspodp oaskdpoas poaskdpoaskdp aoskdaspodkasp oaskdasp askop dkasdpoas kdasop asoidjasiodjsa jsadio asjdoiasjd asoid jasd jasoid oaisd oiasdj
         as opdksapoas kdaspoopas kdaspodkaspod kaspod kasopd kas podsakd pos akdpoas kdopas dkaspodk saop dkaspdo askdposa kdpasdokas pdakdpasdsadsadsadsadsadsadasdo      ';
    }

    public function tearDown()
    {
        parent::tearDown();
    }


    public function test_create_expense_flow_basic(){
        $this->assertEquals(true,$this->expense->create($this->expense));
    }


    public function test_create_expense_another_flow(){
        $this->expense->expire_expense_date = Carbon::now()->format('Y-m-d');
        $this->assertEquals(true,$this->expense->create($this->expense));
        $this->assertEquals(NULL,Expense::find($this->expense->id)->number_of_days);
        $this->assertEquals(NULL,Expense::find($this->expense->id)->expire_expense_routine_date);
    }

    public function test_create_expense_with_rotine(){
        $this->expense->number_of_days = 30;
        $this->expense->expire_expense_routine_date = Carbon::now()->format('Y-m-d');
        $this->assertEquals(true,$this->expense->create($this->expense));
        $this->assertEquals($this->expense->number_of_days,Expense::find($this->expense->id)->number_of_days);
    }

    public function test_create_expense_another_category(){
        $this->expense->number_of_days = 30;
        $this->expense->expire_expense_routine_date = Carbon::now()->format('Y-m-d');
        $this->expense->expense_category_id = ExpenseCategory::find(2)->id;
        $this->assertEquals(true,$this->expense->create($this->expense));
    }

    public function test_create_expense_many_days(){
        $this->expense->number_of_days = 120;
        $this->assertEquals(true,$this->expense->create($this->expense));
    }

    /**
     * @expectedException App\Exceptions\Util\ValidationException
    */
    public function test_create_expense_invalid_expire_date(){
        $this->expense->expire_expense_date = Carbon::now()->subDays(15)->format('Y-m-d');
        $this->expense->create($this->expense);
    }

    /**
     * @expectedException App\Exceptions\Util\ValidationException
     */
    public function test_create_expense_negative_days(){
        $this->expense->number_of_days = -1;
        $this->expense->create($this->expense);
    }

    /**
     * @expectedException App\Exceptions\Util\ValidationException
     */
    public function test_create_expense_negative_routine_date(){
        $this->expense->expire_expense_routine_date = Carbon::now()->subDays(15)->format('Y-m-d');
        $this->expense->create($this->expense);
    }

    /**
     * @expectedException App\Exceptions\Util\ValidationException
     */
    public function test_create_expense_negative_price(){
        $this->expense->price= -500;
        $this->expense->create($this->expense);
    }

    public function test_create_expense_price_minimal_value(){
        $this->expense->price = 0.01 ;
        $this->assertEquals(true,$this->expense->create($this->expense),true);
        $this->assertEquals($this->expense->price,Expense::find($this->expense->id)->price);
    }

    public function test_remove_expense_flow_basic(){
        $this->test_create_expense_another_flow();
        $this->assertEquals(1,Expense::where('id',$this->expense->id)->count());
        $this->assertEquals(true,$this->expense->remove($this->expense->id));
        $this->assertEquals(0,Expense::where('id',$this->expense->id)->count());
    }

    /**
     * @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
    */
    public function test_remove_expense_erro_invalid_id(){
        $this->expense->remove(15610651061);
    }

    /**
     * @expectedException App\Exceptions\Util\ValidationException
     */
    public function test_remove_expense_erro_invalid_expire(){
        $this->test_create_expense_another_flow();
        $this->expense->expire_expense_date = Carbon::now()->subDays(15)->format('Y-m-d');
        $this->expense->save();
        $this->expense->remove($this->expense->id);
    }


    public function test_edit_flow_basic(){
        $this->test_create_expense_another_flow();
        $this->assertEquals(true,$this->expense->edit($this->expense));
    }

    public function test_edit_flow_basic_another(){
        $this->test_create_expense_flow_basic();
        $this->assertEquals(true,$this->expense->edit($this->expense));
    }

    /**
     * @expectedException App\Exceptions\Util\ValidationException
     */
    public function test_edit_erro_date_yerterday(){
        $this->test_create_expense_flow_basic();
        $this->expense->expire_expense_date = Carbon::now()->subDays(50)->format('Y-m-d');
        $this->expense->edit($this->expense);
    }



}
