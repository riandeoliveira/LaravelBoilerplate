#!/bin/bash

# RUN THIS FILE WITH bash runme.sh TO START YOUR PROJECT

# date and time
CURRENT_DATE=$(date +'%Y-%m-%d')
CURRENT_TIME=$(date +%H-%M-%S)
DATE="$CURRENT_DATE $CURRENT_TIME"

# utils
function break_line() {
  echo ""
}

break_line

# ask for information

echo "Before we get started, let's answer a few questions."
echo "You can change the answers whenever you want later :)"

break_line

read -p "Your name (John Doe): " AUTHOR
read -p "Your GitHub username (jonhdoe): " GITHUB_USERNAME
read -p "Your email (johndoe2000@mail.com): " EMAIL
read -p "Your project name (My Project): " PROJECT_NAME
read -p "Your project description (Lorem Ipsum...): " DESCRIPTION

KEBAB_CASE_PROJECT_NAME=$(echo "$PROJECT_NAME" | tr '[:upper:]' '[:lower:]' | tr ' ' '-')
LOWERCASE_PROJECT_NAME="$(echo "${PROJECT_NAME// /}" | tr '[:upper:]' '[:lower:]')"
GITHUB_REPO_NAME=$(echo "$PROJECT_NAME" | tr -d ' ')

DB_CONNECTION="sqlite"
DB_DATABASE="$(pwd -W)/database/db.sqlite"

break_line

echo "Generating .env file..."

cp .env.example .env

echo "Deleting boilerplate .git..."

rm -rf .git

# replaces placeholders with input data

echo "Adding information to the project..."

# config/app.php
sed -i "s/<PROJECT_NAME>/$PROJECT_NAME/g" config/app.php

# app/Http/Controllers/Controller.php
sed -i "s/<PROJECT_NAME>/$PROJECT_NAME/g" app/Http/Controllers/Controller.php
sed -i "s/<DESCRIPTION>/$DESCRIPTION/g" app/Http/Controllers/Controller.php
sed -i "s/<AUTHOR>/$AUTHOR/g" app/Http/Controllers/Controller.php
sed -i "s/<EMAIL>/$EMAIL/g" app/Http/Controllers/Controller.php
sed -i "s/<GITHUB_USERNAME>/$GITHUB_USERNAME/g" app/Http/Controllers/Controller.php

# app/Mail/ForgotPasswordMail.php
sed -i "s/<LOWERCASE_PROJECT_NAME>/$LOWERCASE_PROJECT_NAME/g" app/Mail/ForgotPasswordMail.php

# resources/views/layout.blade.php
sed -i "s/<PROJECT_NAME>/$PROJECT_NAME/g" resources/views/layout.blade.php

# .env
sed -i "s/<PROJECT_NAME>/$PROJECT_NAME/g" .env
sed -i "s/<DB_CONNECTION>/$DB_CONNECTION/g" .env
sed -i "s|<DB_DATABASE>|$DB_DATABASE|g" .env

# composer.json
sed -i "s/<GITHUB_USERNAME>/$GITHUB_USERNAME/g" composer.json
sed -i "s/<KEBAB_CASE_PROJECT_NAME>/$KEBAB_CASE_PROJECT_NAME/g" composer.json
sed -i "s/<DESCRIPTION>/$DESCRIPTION/g" composer.json
sed -i "s/<DATE>/$DATE/g" composer.json
sed -i "s/<AUTHOR>/$AUTHOR/g" composer.json
sed -i "s/<EMAIL>/$EMAIL/g" composer.json

# README.md
sed -i "s/<AUTHOR>/$AUTHOR/g" README.md
sed -i "s/<GITHUB_USERNAME>/$GITHUB_USERNAME/g" README.md
sed -i "s/<PROJECT_NAME>/$PROJECT_NAME/g" README.md

echo "Installing dependencies..."

break_line

composer install

break_line

echo "Generating API docs with l5-swagger..."

break_line

php artisan l5-swagger:generate

break_line

echo "Generating APP_KEY..."

php artisan key:generate

echo "Creating local database with SQLite..."

touch database/db.sqlite

echo "Running migrations..."

php artisan migrate

echo "Populating database with fake data..."

php artisan db:seed

echo "Initializing git..."

break_line

git init

break_line

echo "Adding remote origin..."

git branch -m main

git remote add origin "https://github.com/$GITHUB_USERNAME/$GITHUB_REPO_NAME"

echo "Initializing git flow..."

break_line

git flow init -d

break_line

echo "Renaming 'master' to 'main'..."

break_line

git checkout master
git branch -m main
git checkout develop

break_line

echo "Adding 'runme.sh' file to '.gitignore'..."

echo "runme.sh" >> ".gitignore"

echo "Adding files to the staging area..."

break_line

git add .

break_line

echo "Making the first commit..."

break_line

git commit -m "feat: initial commit"

break_line

echo "Pushing the changes..."

break_line

git push origin main
git push origin develop

break_line

echo "Deleting 'runme.sh' file..."
echo "Have a nice coding, $AUTHOR!"

sleep 3

rm -rf runme.sh
