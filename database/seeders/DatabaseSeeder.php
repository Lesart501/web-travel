<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Operator;
use App\Models\Order;
use App\Models\Tour;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $userNames = ['Артём', 'Олег', 'Сергей', 'Анна', 'Константин', 'Ангелина', 'Владимир'];
        $userEmails = ['lesart@mail.ru', 'oleg@mail.ru', 'sergay@mail.ru', 'ana@mail.ru', 'bone@mail.ru', 'angel@mail.ru', 'vldmr@mail.ru'];
        $statuses = ['Admin','User','User','User','User','User','User'];
        $password = Hash::make('users');
        for ($i = 0; $i < count($userNames); $i++){
            User::create([
                'name' => $userNames[$i],
                'email' => $userEmails[$i],
                'status' => $statuses[$i],
                'password' => $password
            ]);
        }
        
        $operatorNames = ['Great Tour', 'The Traveller', 'Global Travel'];
        $operatorEmails = ['gt1917@mail.ru', 'traveller@mail.ru', 'globaltrt@mail.ru'];
        for ($i = 0; $i < count($operatorNames); $i++){
            Operator::create([
                'name' => $operatorNames[$i],
                'email' => $operatorEmails[$i]
            ]);
        }

        $tourNames = ['Сиде', 'Севастополь', 'Шарм-Эль-Шейх', 'Адлер', 'Рим', 'Бангкок'];
        $countries = ['Турция','Россия','Египет','Россия','Италия','Тайланд'];
        $people = [2, 1, 1, 2, 2, 1];
        $nights = [6, 6, 4, 6, 14, 13];
        $images = ['img/tours_images/side2.jpeg', 'img/tours_images/crimea_is_our2.jpg', 'img/tours_images/shesh1.jpg', 'img/tours_images/adler1.jpg', 'img/tours_images/rome1.jpg', 'img/tours_images/bangkok.jpg'];
        $operators_id = [1, 2, 3, 3, 2, 1];
        $price = [21306, 17352, 42936, 19889, 67786, 49026];
        for ($i = 0; $i <  count($tourNames); $i++){
            Tour::create([
                'name' => $tourNames[$i],
                'country' => $countries[$i],
                'people' => $people[$i],
                'nights' => $nights[$i],
                'image' => $images[$i],
                'operators_id' => $operators_id[$i],
                'price' => $price[$i]            
            ]);
        }
        
        $users_id = [2, 3, 4, 5, 6, 7];
        $tours_id = [6, 3, 2, 1, 5, 4];
        $out_date = ['02.03.2023', '05.04.2023', '23.05.2023', '30.04.2023', '14.06.2023', '17.05.2023'];
        $return_date = ['14.03.2023', '11.04.2023', '30.05.2023', '05.05.2023', '22.06.2023', '29.05.2023'];
        for ($i = 0; $i < count($users_id); $i++){
            Order::create([
                'users_id' => $users_id[$i],
                'tours_id' => $tours_id[$i],
                'out_date' => $out_date[$i],
                'return_date'=> $return_date[$i]
            ]);
        }
    }
}
