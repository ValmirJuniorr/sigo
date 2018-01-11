<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;


class UserTest extends TestCase
{

    private $user;

    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();

        $this->user = User::find(1);
        $this->user->password = 'root@123';
    }

    public function tearDown()
    {
        parent::tearDown();
    }

    public function test_do_login_flow_basic(){
        $user_model = new User();
        $this->assertNotEmpty($user_model->do_login($this->user));
    }

    public function test_do_login_flow_basic_another_user(){
        $user = new User();
        $this->user = User::find(2);
        $this->user->password = 'root@123';
        $this->assertNotEmpty($user->do_login($this->user));
    }

    /**
     * @expectedException App\Exceptions\User\AuthenticationException
     */
    public function test_do_login_wrong_credential(){
        $user = new User();
        $this->user->username = "shuashuashuashua";
        $this->user->password = "shuashuashuashua";
        $user->do_login($this->user);
    }

    /**
     * @expectedException App\Exceptions\User\AuthenticationException
     */
    public function test_do_login_wrong_credential_invalid_password(){
        $user = new User();
        $this->user->password = "invalid_password";
        $user->do_login($this->user);
    }

    /**
     * @expectedException App\Exceptions\User\AuthenticationException
     */
    public function test_do_login_wrong_credential_invalid_username(){
        $user = new User();
        $this->user->username = "invalid_username";
        $user->do_login($this->user);
    }

    /**
     * @expectedException ErrorException
     */
    public function test_do_login_wrong_credential_null_object(){
        $user = new User();
        $this->user = null;
        $user->do_login($this->user);
    }

    /**
     * @expectedException App\Exceptions\User\AuthenticationException
     */
    public function test_do_login_not_activated_user(){
        $user = new User();
        $this->user = User::find(15);
        $user->do_login($this->user);
    }

    public function test_create_user_flow_basic(){
        $user = new User();
        $user->username = "user_test";
        $user->name = "Antonio Nunes";
        $user->email = "x12-310k@gmail.com";
        $user->password = bcrypt('teste');
        $this->assertEquals(TRUE,$user->create($user));
    }

    /**
     * @expectedException App\Exceptions\Util\ValidationException
    */
    public function test_create_user_invalid_login(){
        $user = new User();
        $user->username = User::first()->username;
        $user->name = "Antonio Nunes";
        $user->email = "x12-310k@gmail.com";
        $user->password = bcrypt('teste');
        $user->create($user);
    }

    /**
     * @expectedException App\Exceptions\Util\ValidationException
     */
    public function test_create_user_without_username(){
        $user = new User();
        $user->username = 'teste_unique_name_created';
        $user->email = "x12-310k@gmail.com";
        $user->password = bcrypt('teste');
        $user->create($user);
    }

    /**
     * @expectedException App\Exceptions\Util\ValidationException
     */
    public function test_create_user_without_password(){
        $user = new User();
        $user->username = 'teste_unique_name_created';
        $user->email = "x12-310k@gmail.com";
        $user->create($user);
    }

    public function test_create_edit_flow_basic(){
        $user = User::find(1);
        $user->name = "new name from user";
        $this->assertEquals(TRUE,$user->edit($user));
        $this->assertEquals($user->name,User::find(1)->name);
    }

    public function test_create_edit_flow_basic_all_fields(){
        $user = User::find(1);
        $user->name = "new name from user";
        $user->username = "new name from user";
        $user->email= "caetanov120@gmail.com";
        $this->assertEquals(TRUE,$user->edit($user));
        $this->assertEquals($user->username,User::find(1)->username);
        $this->assertEquals($user->email,User::find(1)->email);
    }

    /**
     * @expectedException App\Exceptions\Util\ValidationException
     */
    public function test_create_edit_force_unique_attributes(){
        $user = User::find(1);
        $user->name = "new name from user";
        $user->username = User::find(2)->username;
        $user->email= "caetanov120@gmail.com";
        $user->edit($user);
    }

    public function test_create_remove_flow_basic(){
        $user = User::find(1);
        $this->assertEquals(TRUE,$user->remove($user->id));
        $this->assertEquals(FALSE,User::find(1)->activated);
    }

    public function test_read_flow_basic(){
        $user = User::find(1);
        $this->assertEquals($user->name,$user->read($user->id)->name);
        $this->assertEquals($user->username,$user->read($user->id)->username);
        $this->assertEquals($user->email,$user->read($user->id)->email);
    }

    public function test_read_all_flow_basic(){
        $user = new User();
        $this->assertEquals(count($user->read_all()),count(User::where('activated',TRUE)->get()));
    }

}
