<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('if_admin',function (){
            $admin_usr = DB::select('select * from admin_users');  // получаем данные из таблицы (польз с доступом к админке)
            $my_usr=Auth::user();     // выводим под каким пользователем мы аутенциф
            foreach ($admin_usr as $admin){             // проходим циклом по польз из БД
                if($admin->login===$my_usr->login){     // сравниваем
                    return true;
                }
            }
        });
    }
}
