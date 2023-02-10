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

LOWERCASE_PROJECT_NAME=$(echo "$PROJECT_NAME" | tr '[:upper:]' '[:lower:]' | tr ' ' '-')
GITHUB_REPO_NAME=$(echo "$PROJECT_NAME" | tr -d ' ')

break_line

# echo "Deleting boilerplate .git..."

# rm -rf .git

# replaces placeholders with input data

echo "Adding information to the project..."

# config/app.php
sed -id "s/<PROJECT_NAME>/$PROJECT_NAME/g" config/app.php

# app/Http/Controllers/Controller.php
sed -id "s/<PROJECT_NAME>/$PROJECT_NAME/g" app/Http/Controllers/Controller.php
sed -id "s/<DESCRIPTION>/$DESCRIPTION/g" app/Http/Controllers/Controller.php
sed -id "s/<AUTHOR>/$AUTHOR/g" app/Http/Controllers/Controller.php
sed -id "s/<EMAIL>/$EMAIL/g" app/Http/Controllers/Controller.php
sed -id "s/<GITHUB_USERNAME>/$GITHUB_USERNAME/g" app/Http/Controllers/Controller.php

# resources/views/layout.blade.php
sed -id "s/<PROJECT_NAME>/$PROJECT_NAME/g" resources/views/layout.blade.php

# .env
sed -i "s/<PROJECT_NAME>/$PROJECT_NAME/g" .env

# composer.json
sed -i "s/<GITHUB_USERNAME>/$GITHUB_USERNAME/g" composer.json
sed -i "s/<LOWERCASE_PROJECT_NAME>/$LOWERCASE_PROJECT_NAME/g" composer.json
sed -i "s/<DESCRIPTION>/$DESCRIPTION/g" composer.json
sed -i "s/<DATE>/$DATE/g" composer.json
sed -i "s/<AUTHOR>/$AUTHOR/g" composer.json
sed -i "s/<EMAIL>/$EMAIL/g" composer.json

# README.md
sed -i "s/<AUTHOR>/$AUTHOR/g" README.md
sed -i "s/<GITHUB_USERNAME>/$GITHUB_USERNAME/g" README.md
sed -i "s/<PROJECT_NAME>/$PROJECT_NAME/g" README.md



























# echo "Installing dependencies..."

# break_line

# # trying with yarn
# yarn

# if [ $? -eq 1 ]; then
#   # trying with npm
#   npm install
# fi

# break_line

# echo "Running lint..."

# break_line

# # try lint with yarn
# yarn lint

# if [ $? -eq 1 ]; then
#   # try lint with npm
#   npm run lint
# fi

# break_line

# echo "Initializing git..."

# break_line

# git init

# break_line

# echo "Adding remote origin..."

# git branch -m main

# git remote add origin "https://github.com/$GITHUB_USERNAME/$GITHUB_REPO_NAME"

# echo "Initializing git flow..."

# break_line

# git flow init -d

# break_line

# echo "Renaming 'master' to 'main'..."

# break_line

# git checkout master
# git branch -m main
# git checkout develop

# break_line

# echo "Adding 'runme.sh' file to '.gitignore'..."

# echo "runme.sh" >> ".gitignore"

# echo "Adding files to the staging area..."

# git add .

# echo "Making the first commit..."

# break_line

# git commit -m "feat: initial commit"

# break_line

# echo "Pushing the changes..."

# break_line

# git push origin main
# git push origin develop

# break_line

# echo "Deleting 'runme.sh' file..."
# echo "Have a nice coding, $AUTHOR!"

# sleep 3

# rm -rf runme.sh
