
# 🌊 OceanClean

 Simple News Platform for Ocean Cleanliness
📌 Overview

OceanClean is a lightweight web application built with Laravel 11, designed to support ocean-cleanliness awareness by providing a simple platform to create and view news articles.
The system focuses on simplicity.

## Features

👥 Authentication

User Registration

User Login / Logout

📰 News Module

View News — Public users can browse and read articles

Create News — Authenticated users can add new articles

💰 Donation Module

Make a Donation — Users can submit donations to support ocean-cleanliness efforts

Donation List — View total donations or recent contributions

## Tech Stack

Laravel 11

PHP 8.2+

MySQL / PostgreSQL

Blade Templates


## Run Locally

    git clone <your-repo-url>

    cd ocean

    composer install

    cp .env.example .env

    php artisan key:generate

Setup your database in .env, then migrate:

    php artisan migrate

    php artisan serve

