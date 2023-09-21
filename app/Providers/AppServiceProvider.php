<?php

namespace App\Providers;
use App\Models\Message;


use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


class AppServiceProvider extends ServiceProvider
{

    public function boot()
        {
            View::composer('layout', function ($view) {
                $unreadMessagesCount = Message::where('reciever_id', session('personneId'))
                ->where('statu' , 'unread' )
                ->count();


                $view->with('unreadMessagesCount', $unreadMessagesCount);
            });
        }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }


}
