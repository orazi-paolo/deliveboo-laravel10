<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\ResetPassword;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Personalizza l'email di reset della password
        ResetPassword::toMailUsing(function ($notifiable, $token) {
            // Crea l'URL di reset della password
            $url = url(route('password.reset', [
                'token' => $token,
                'email' => $notifiable->getEmailForPasswordReset(),
            ], false));

            // Usa la vista personalizzata
            return (new \Illuminate\Notifications\Messages\MailMessage)
                ->subject('Reset your password')
                ->view('emails.reset-password', ['url' => $url]);
        });
    }
}