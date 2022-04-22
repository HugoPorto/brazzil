<?php

namespace App\Mailer;

use Cake\Mailer\Mailer;

class UserMailer extends Mailer
{
    public static $name = 'User';

    public function welcome($user)
    {
        $this->to($user->email)
        ->profile('contact')
        ->emailFormat('html')
        ->template('welcome_email_template')
        ->layout('default')
        ->viewVars(['nome' => $user->name])
        ->subject(sprintf('Bem-vindo, %s', $user->name));
    }

    public function demand($userEmail, $demandId)
    {
        $this->to($userEmail)
        ->profile('contact')
        ->emailFormat('html')
        ->template('demand_email_template')
        ->layout('default')
        ->viewVars(['demandId' => $demandId])
        ->subject(sprintf('Pedido enviado!'));
    }
}
