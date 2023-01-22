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

# ask user information
echo "Before we get started, let's answer a few questions."
echo "You can change the answers whenever you want later :)"

break_line

read -p "Your name (John Doe): " USERNAME
read -p "Your GitHub username (jonhdoe): " GITHUB_USERNAME
read -p "Your email (johndoe2000@mail.com): " USER_EMAIL
read -p "Your project name (project-name): " PROJECT_NAME
read -p "Your project description (Lorem Ipsum...): " PROJECT_DESCRIPTION

break_line

if [ $? -eq 0 ]; then
  # creates an .env file
  cp .env.example .env

  if [ $? -eq 0 ]; then
    echo "SUCESS: .env file created"

    # replaces placeholders with input data

    # config/app.php
    sed -i "s/<PROJECT_NAME>/$PROJECT_NAME/g" config/app.php

    # .env
    sed -i "s/<PROJECT_NAME>/$PROJECT_NAME/g" .env

    # composer.json
    sed -i "s/<GITHUB_USERNAME>/$GITHUB_USERNAME/g" composer.json
    sed -i "s/<PROJECT_NAME>/$PROJECT_NAME/g" composer.json
    sed -i "s/<PROJECT_DESCRIPTION>/$PROJECT_DESCRIPTION/g" composer.json
    sed -i "s/<DATE>/$DATE/g" composer.json
    sed -i "s/<USERNAME>/$USERNAME/g" composer.json
    sed -i "s/<USER_EMAIL>/$USER_EMAIL/g" composer.json

    # README.md
    sed -i "s/<USERNAME>/$USERNAME/g" README.md
    sed -i "s/<GITHUB_USERNAME>/$GITHUB_USERNAME/g" README.md
    sed -i "s/<PROJECT_NAME>/$PROJECT_NAME/g" README.md

    if [ $? -eq 0 ]; then
      echo "SUCESS: Completed fields"

      break_line

      # delete composer.lock file
      rm -r composer.lock

      # install dependencies
      composer install

      if [ $? -eq 0 ]; then
        # generate APP_KEY
        php artisan key:generate

        if [ $? -eq 0 ]; then
          # delete git
          rm -rf .git

          if [ $? -eq 0 ]; then
            # automatically delete this file
            rm -r runme.sh

            echo "Great, now you just need to create your git repository and you will be ready to start!"
          else
            echo "ERROR: Cannot delete .git directory"
          fi
        else
          echo "ERROR: Cannot generate APP_KEY"
        fi
      else
        echo "ERROR: Cannot install composer dependencies"
      fi
    else
      echo "ERROR: Cannot not fill in the fields with the obtained data"
    fi
  else
    echo "ERROR: Cannot create .env file"
  fi
else
  echo "ERROR: Unable to get data"
fi
