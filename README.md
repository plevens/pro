
# Mon Projet Laravel

# Ce projet est une application Laravel qui nécessite quelques étapes de configuration avant de pouvoir être exécutée.

# Prérequis
# Assurez-vous d'avoir les éléments suivants installés sur votre machine :
# - PHP >= 7.3
# - Composer
# - MySQL ou un autre système de gestion de base de données compatible

"Cloner le dépôt"

# 1. Cloner le dépôt
"Clonage du dépôt..."
git clone https://github.com/plevens/pro.git
cd pro || exit

"Installation des dépendances..."

# 2. Installer les dépendances
composer install

"Copie du fichier .env.example en .env..."

# 3. Copier le fichier `.env.example`
cp .env.example .env

"Génération de la clé de l'application..."

# 4. Générer la clé de l'application
php artisan key:generate

"Création d'un lien symbolique pour le stockage..."

# 5. Créer un lien symbolique pour le stockage
php artisan storage:link

"Configuration de la base de données :"
"Veuillez modifier le fichier .env avec vos paramètres de base de données."
"Exemple :"
"DB_CONNECTION=mysql"
"DB_HOST=127.0.0.1"
"DB_PORT=3306"
"DB_DATABASE=votre_base_de_donnees"
"DB_USERNAME=votre_utilisateur"
"DB_PASSWORD=votre_mot_de_passe"

# Attendre la confirmation de la configuration de la base de données
read -p "Appuyez sur Entrée une fois que vous avez configuré la base de données..."

"Migration de la base de données..."

# 7. Migrer la base de données
php artisan migrate

"Démarrage du serveur de développement..."

# 8. Démarrer le serveur de développement
php artisan serve

"Votre application devrait maintenant être accessible à l'adresse suivante : http://localhost:8000"

"Fonctionnalités :"
"- Authentification utilisateur"
"- Gestion des utilisateurs"
"- Envoi d'invitations par e-mail"

"Les contributions sont les bienvenues ! Veuillez soumettre une pull request pour toute amélioration ou correction de bug."