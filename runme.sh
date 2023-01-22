#!/bin/bash

# RUN THIS FILE WITH bash runme.sh TO START YOUR PROJECT

# utils
function break_line() {
  echo ""
}

# delete .git
# rm -rf .git

break_line

# ask user information
echo "Before we get started, let's answer a few questions."
echo "You can change the answers whenever you want later :)"

break_line

read -p "Your name (John Doe): " USERNAME
read -p "Your GitHub username (jonhdoe): " GITHUB_USERNAME
read -p "Your email (johndoe2000@mail.com): " USER_EMAIL
read -p "Your project name (project-name): " PROJECT_NAME
read -p "Your project description (Lorem Ipsum...): " PROJECT_DESCRIPTION

# creates an .env file
cp .env.example .env

# replaces placeholders with input data

# config/app.php
sed -i "s/<PROJECT_NAME>/$PROJECT_NAME/g" config/app.php

# .env
sed -i "s/<PROJECT_NAME>/$PROJECT_NAME/g" .env

# composer.json
sed -i "s/<GITHUB_USERNAME>/$GITHUB_USERNAME/g" composer.json
sed -i "s/<PROJECT_NAME>/$PROJECT_NAME/g" composer.json
sed -i "s/<PROJECT_DESCRIPTION>/$PROJECT_DESCRIPTION/g" composer.json
sed -i "s/<USERNAME>/$USERNAME/g" composer.json
sed -i "s/<USER_EMAIL>/$USER_EMAIL/g" composer.json

# README.md
sed -i "s/<USERNAME>/$USERNAME/g" README.md
sed -i "s/<GITHUB_USERNAME>/$GITHUB_USERNAME/g" README.md
sed -i "s/<PROJECT_NAME>/$PROJECT_NAME/g" README.md

# install dependencies
composer install

# generate APP_KEY
php artisan key:generate

# automatically delete this file
rm -r runme.sh
