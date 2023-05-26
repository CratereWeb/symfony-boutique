# Marche à suivre pour l'application

1. Lier l'app à la base de données dans le fichier `.env`
2. Créer la classe User avec `make:user`
3. Créer le formulaire d'authentification avec `make:auth`
    1. Choisir l'option `[1] Login from authenticator`
    2. Nommer l'authenticator créé `LoginForm`
    3. Nommer le controller créé `SecurityController`
    4. **Les classes sont créées**
4. Créer le formulaire d'enregistrement d'un nouvel utilisateur avec `make:registration-form`
    1.  > Do you want to add a @UniqueEntity validation annotation on your User class to make sure duplicate accounts aren't created? (yes/no)     
        > **> yes**
    2.  > Do you want to send an email to verify the user's email address after registration? (yes/no) [yes]    
        > **> no**
    3.  > Do you want to automatically authenticate the user after registration? (yes/no) [yes]:    
        > **> yes**
    3. Modifier la classe nouvellement créée `RegistrationController`
        - ajouter le rôle `[ROLE_USER]` par défaut
            ```php
                public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, UserAuthenticatorInterface $userAuthenticator, UserAuthenticator $authenticator, EntityManagerInterface $entityManager): Response
            {
                $user = new User();
                $form = $this->createForm(RegistrationFormType::class, $user);
                $form->handleRequest($request);

                if ($form->isSubmitted() && $form->isValid()) {
                    // définir le rôle par défaut
                    $user->setRoles(["ROLE_USER"]);
                    // ...
                }
                // ...
            }
            ```
