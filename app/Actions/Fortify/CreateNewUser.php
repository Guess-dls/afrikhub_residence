<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    /**
     * Valide et crée un nouvel utilisateur.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        // 1. DÉFINITION DES RÈGLES DE VALIDATION (Combiné avec vos règles strictes et les champs du formulaire)
        Validator::make($input, [
            // Champs du formulaire utilisateur
            'nom' => ['required', 'string', 'max:255'],
            'contact' => ['required', 'string', 'max:255'],
            'type_compte' => ['required', 'string', 'in:client,professionnel'],

            // Champs d'adresse (validés mais non stockés dans la table 'users')
            'ville' => ['required', 'string', 'max:255'],
            'pays' => ['required', 'string', 'max:255'],
            'adresse' => ['required', 'string', 'max:255'],

            // CGU
            'cgu' => ['accepted'],

            // RÈGLES D'EMAIL
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],

            // RÈGLES DE MOT DE PASSE (Vos règles strictes)
            'password' => [
                'required',
                'string',
                'min:8',
                // Regex: Au moins 8 caractères, 1 minuscule, 1 majuscule, 1 chiffre, 1 caractère spécial
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/',
                'confirmed',
            ],
        ], [
            // Messages de validation personnalisés (avec indentation standard corrigée)
            'email.unique' => 'Cet email est déjà utilisé.',
            'password.regex' => 'Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial.',
            'cgu.accepted' => 'Vous devez accepter les conditions générales d\'utilisation.',
            // ... Ajoutez d'autres messages si nécessaire
        ])->validate();

        // 2. PRÉPARATION DES DONNÉES
        $email = $input['email'];
        $token = md5(uniqid() . $email);
        $dbTypeCompte = $input['type_compte']; // Utilise 'client' ou 'professionnel'

        // 3. CRÉATION DE L'UTILISATEUR
        $utilisateur = User::create([
            'name' => $input['nom'],
            'email' => $email,
            'contact' => $input['contact'],
            'token' => $token,
            'type_compte' => $dbTypeCompte,
            'statut' => 'inactif', // Pour la vérification par e-mail
            'password' => Hash::make($input['password']),
        ]);

        // 4. ENVOI DU MAIL (La classe Mail doit exister : \App\Mail\TokenMail)
        // Mail::to($utilisateur->email)->send(new \App\Mail\TokenMail($utilisateur));

        return $utilisateur;
    }
}
