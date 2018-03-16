<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;
    
class ResetPasswordNotification extends ResetPassword{
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Solicitud de reestablecimiento de contraseña')
            ->greeting('Hola ' . $notifiable->name)
            ->line('Usted está recibiendo este correo electrónico porque recibimos una solicitud de restablecimiento de contraseña para su cuenta.')
            ->action('Restablecer la contraseña', url(config('app.url').route('password.reset', $this->token, false)))
            ->line('Si Usted no solicitó restablecer la contraseña, no se requiere ninguna acción adicional.')
            ->salutation('Saludos');
    }
}