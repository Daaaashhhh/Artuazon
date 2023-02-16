# Project Name

Here is my submission for the assesment for the developer role at the bittel company.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Steps to reproduce

1. Install Laravel on your computer, if you haven't already. You can follow the official Laravel installation guide for instructions on how to do this.

2. Download or clone the login and register application from the repository or the source code you have.

3. Open a terminal or command prompt and navigate to the project directory.

4. Run the following command to install the project dependencies:
   composer install

5. Copy the .env.example file to create a new .env file: cp .env.example .env

6. Generate an application key: php artisan key:generate

7. Open the .env file in a text editor and update the database settings to match your local environment.

8. Run the following command to run the database migrations: php artisan migrate

9. Serve the application by running the following command: php artisan serve

10. Open a web browser and navigate to the URL displayed in the output of the php artisan serve command.

11. You should see the login and registration pages of my Laravel application. You can now register a new account, log in, and explore the features of my application.
