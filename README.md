# Neighborhood Explorer API

Welcome to the `Neighborhood Explorer API`, the backend service for the `Neighborhood Explorer` project. This `API` is built using `Laravel 10` and `Sanctum` for secure authentication.

## Installation Guide and Testing

To use the `Neighborhood Explorer API`, follow these steps:

1. Run `composer install` to install the `PHP dependencies`.
2. Copy `.env.example` to `.env` and configure the database settings.
3. Run `php artisan migrate` to create the necessary database tables.
4. Start the server by running `php artisan serve`.
5. Use `Postman` or any other `API` testing tool to interact with the `API` endpoints:

    - **Register:** `POST` <a href="http://127.0.0.1:8000/api/register">`http://127.0.0.1:8000/api/register`</a>
    - **Login:** `POST` <a href="http://127.0.0.1:8000/api/login">`http://127.0.0.1:8000/api/login`</a>
    - **Get User:** `GET` <a href="http://127.0.0.1:8000/api/user">`http://127.0.0.1:8000/api/user`</a>
    - **Logout:** `POST` <a href="http://127.0.0.1:8000/api/logout">`http://127.0.0.1:8000/api/logout`</a>

6. Make sure to install the frontend part located in <a href="https://github.com/ionut1993255/neighborhood-explorer-frontend">`Neighborhood Explorer Frontend`</a> based on its documentation.

## Key Features

-   **Secure Authentication**: Utilizes `Sanctum` for robust user authentication.
-   **Laravel 10**: Built using `Laravel 10`, ensuring compatibility and stability.
-   **Backend for Neighborhood Explorer**: This `API` serves as the backend for the `Neighborhood Explorer` project (as you can see in the `neighborhood-explorer-frontend` repository), but it can be used for many other authentication projects.
-   **Xampp and Apache**: Developed and tested with `Xampp` and `Apache` server environments. Also tested with `Postman` for `API` endpoint testing.

## API Routes

The following routes are available in the `API`:

-   **POST /api/register**: Register a new user.
-   **POST /api/login**: Log in an existing user.
-   **GET /api/user**: Get the authenticated user.
-   **POST /api/logout**: Log out the authenticated user.
