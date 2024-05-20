# Neighborhood Explorer API

Welcome to the `Neighborhood Explorer API`, the backend service for the `Neighborhood Explorer` project. This `API` is built using `Laravel 10` and `Sanctum` for secure authentication.

## Key Features

-   **Secure Authentication**: Utilizes `Sanctum` for robust user authentication.
-   **Laravel 10**: Built using `Laravel 10`, ensuring compatibility and stability.
-   **Backend for Neighborhood Explorer**: This `API` serves as the backend for the `Neighborhood Explorer` project (as you can see in the `neighborhood-explorer-frontend` repository), but it can be used for many other authentication projects.
-   **Xampp and Apache**: Developed and tested with `Xampp` and `Apache` server environments. Also tested with `Postman` for `API` endpoint testing.

## Installation and Usage

To use the `Neighborhood Explorer API`, follow these steps:

1. Install `Xampp` and set up an `Apache` server environment on your local machine.
2. Clone the `neighborhood-explorer-backend` repository to your local machine.
3. Navigate into the project directory using the command `cd your-project-folder`.
4. Copy `.env.example` to `.env` and configure the database settings.
5. Run `composer install` to install `PHP dependencies`.
6. Run `php artisan migrate` to create the necessary database tables.
7. Start the server by running `php artisan serve`.
8. Use `Postman` or any other `API` testing tool to interact with the `API` endpoints:

    - Register: `POST http://127.0.0.1:8000/api/register`
    - Login: `POST http://127.0.0.1:8000/api/login`
    - Get User: `GET http://127.0.0.1:8000/api/user`
    - Logout: `POST http://127.0.0.1:8000/api/logout`

9. Integrate the `Neighborhood Explorer API` with the frontend project located in `neighborhood-explorer-frontend` repository.

## API Routes

The following routes are available in the `API`:

-   **POST /api/register**: Register a new user.
-   **POST /api/login**: Log in an existing user.
-   **GET /api/user**: Get the authenticated user.
-   **POST /api/logout**: Log out the authenticated user.
