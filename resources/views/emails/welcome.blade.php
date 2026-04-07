# Bienvenue sur le CMS ARIC

Bonjour {{ $user->name }},

Votre compte administrateur a été créé avec succès. Voici vos identifiants pour accéder à l'interface de gestion du site :

**Email :** {{ $user->email }}
**Mot de passe :** `{{ $password }}`

<x-mail::button :url="$loginUrl">
Se connecter au CMS
</x-mail::button>

*Pour des raisons de sécurité, nous vous recommandons de changer votre mot de passe dès votre première connexion via l'onglet "Mon Profil" dans l'éditeur visuel.*

Merci,<br>
L'équipe ARIC Solutions
