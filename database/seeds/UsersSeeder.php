<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate(
            [
                'id' => 1
            ],
            [
                'id' => 1,
                'name' => 'Caetano Vieira Neto Segundo',
                'username' => 'caetanovns',
                'password' => bcrypt('root@123'),
                'email' => 'caetanov120@gmail.com',
            ]
        );

        User::updateOrCreate(
            [
                'id' => 2
            ],
            [
                'id' => 2,
                'name' => 'Kennet Emerson Avelino Calixto',
                'username' => 'kennetemerson',
                'password' => bcrypt('root@123'),
                'email' => 'kennet.emerson@gmail.com',
            ]
        );

        User::updateOrCreate(
            [
                'id' => 3
            ],
            [
                'id' => 3,
                'name' => 'Joyce Maria Honório Rodrigues',
                'username' => 'joycemariarodrigues',
                'password' => bcrypt('root@123'),
                'email' => 'joyhonorio@gmail.com',
            ]
        );

        User::updateOrCreate(
            [
                'id' => 4
            ],
            [
                'id' => 4,
                'name' => 'Rubbens Anttonio Vieira da Costa',
                'username' => 'rubbens.costa',
                'password' => bcrypt('root@123'),
                'email' => 'rubbens.anttonio@hotmail.com',
            ]
        );

        User::updateOrCreate(
            [
                'id' => 5
            ],
            [
                'id' => 5,
                'name' => 'Ana Maria Gomes de Lima',
                'username' => 'ana.maria',
                'password' => bcrypt('root@123'),
                'email' => 'anamaria@gmail.com',
            ]
        );

        User::updateOrCreate(
            [
                'id' => 10
            ],
            [
                'id' => 10,
                'name' => 'Jhonatan Pietro de Oliveira',
                'username' => 'jhon.oliveira',
                'password' => bcrypt('root@123'),
                'email' => 'jhonoliveira@gmail.com',
            ]
        );

        User::updateOrCreate(
            [
                'id' => 11
            ],
            [
                'id' => 11,
                'name' => 'Alicia Sophia da Silva',
                'username' => 'alicia.sophia',
                'password' => bcrypt('root@123'),
                'email' => 'alicia@gmai.com',
            ]
        );

        User::updateOrCreate(
            [
                'id' => 12
            ],
            [
                'id' => 12,
                'name' => 'Jamille de Lima Vieira',
                'username' => 'jamillevlima',
                'password' => bcrypt('root@123'),
                'email' => 'jamillev@gmail.com',
            ]
        );
    }
}
