<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\ServiceProvider;

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
        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage)
                ->subject('Xác minh địa chỉ email')
                ->line('Nhấn vào nút bên dưới để tiến hành xác minh')
                ->action('Xác minh ngay', $url)
                ->line('Bỏ qua thư nếu không phải là bạn đã đăng ký')
                ->line('VH Unicode xin cảm ơn');
        });
        ResetPassword::toMailUsing(function (object $notifiable, string $token) {
            $url = url(route('password.reset', [
                'token' => $token,
                'email' => $notifiable->getEmailForPasswordReset(),
            ], false));
            return (new MailMessage)
                ->subject('Thay đổi mật khẩu')
                ->line('Chúng tôi thấy yêu cầu gửi lại mật khẩu của bạn. Hãy nhấn vào nút bên dưới để thay đổi mật khẩu')
                ->action('Thay đổi', $url)
                ->line('VH Unicode xin cảm ơn');
        });
    }
}
