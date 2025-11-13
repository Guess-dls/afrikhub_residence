<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Valide et crée un nouvel utilisateur.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        // 1. DÉFINITION DES RÈGLES DE VALIDATION
        Validator::make($input, [
            // Correspond au champ 'Nom complet' du formulaire
            'nom' => ['required', 'string', 'max:255'],

            // Email et Mot de passe
            'email' => ['required', 'string', 'email', 'max:191', 'unique:users'],
            'password' => $this->passwordRules(), // Règle de mot de passe Fortify

            // Champs supplémentaires du formulaire
            'contact' => ['required', 'string', 'max:255'],
            // Mise à jour de la règle pour accepter 'client' ou 'professionnel'
            'type_compte' => ['required', 'string', 'in:client,professionnel'],

            // Champs d'adresse (validés mais non stockés dans la table 'users')
            'ville' => ['required', 'string', 'max:255'],
            'pays' => ['required', 'string', 'max:255'],
            'adresse' => ['required', 'string', 'max:255'],

            // CGU
            'cgu' => ['accepted'],

        ])->validate();

        // 2. LOGIQUE DE CRÉATION DE L'UTILISATEUR
        // La valeur du formulaire est utilisée directement

        return User::create([
            // Champs de la table 'users'
            'name' => $input['nom'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'contact' => $input['contact'],
            'type_compte' => $input['type_compte'], // Utilise 'client' ou 'professionnel'
        ]);
    }
}
