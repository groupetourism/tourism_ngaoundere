@component("mail::message")

# Réinitialisation de votre mot de passe!!

@component("mail::panel")
<p>Votre mot de passe GENESIS à été réinitialisé par {{$user->firstname}} . Voici vos nouveau détails de login:</p>
<p>Email: {{ $user->email }}</p>
<p>Login: {{ $user->phone }}</p>
<p>Mot de passe: {{ $password }}</p>
<p>Veuillez vous connecter à notre application en utilisant les informations d'identification fournies.<br>Nous vous recommandons de changer votre mot de passe après la première connexion.</p>
@endcomponent

{{--@component("mail::button", ['url' => 'https://genesis-backend-dev.sygalin.com/api/v1/login'])--}}
{{--    Se Connecter--}}
{{--@endcomponent--}}
Merci, <br>
L'équipe Genesis
@endcomponent
