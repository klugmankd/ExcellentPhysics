<?php

use Entity\User\User;
use Service\Pagination\PaginateService as Paginator;
use Service\Initialization\InitializationService as Init;
use Service\Database\DatabaseService as Database;

require_once ('src/Entity/User.php');
require_once ('src/Service/PaginateService.php');
require_once ('src/Service/InitializationService.php');
require_once ('src/Service/DatabaseService.php');

class UserController
{

    public function createAction()
    {
        $inputData = array(
            'username' => filter_input(
                INPUT_POST,
                'username',
                FILTER_SANITIZE_SPECIAL_CHARS
            ),
            'password' => filter_input(
                INPUT_POST,
                'password',
                FILTER_SANITIZE_SPECIAL_CHARS
            ),
            'email' => filter_input(
                INPUT_POST,
                'email',
                FILTER_SANITIZE_SPECIAL_CHARS
            ),
            'firstName' => filter_input(
                INPUT_POST,
                'firstName',
                FILTER_SANITIZE_SPECIAL_CHARS
            ),
            'lastName' => filter_input(
                INPUT_POST,
                'lastName',
                FILTER_SANITIZE_SPECIAL_CHARS
            ),
            'country' => filter_input(
                INPUT_POST,
                'country',
                FILTER_SANITIZE_SPECIAL_CHARS
            ),
            'city' => filter_input(
                INPUT_POST,
                'city',
                FILTER_SANITIZE_SPECIAL_CHARS
            ),
            'school' => filter_input(
                INPUT_POST,
                'school',
                FILTER_SANITIZE_SPECIAL_CHARS
            ),
            'studyYear' => filter_input(
                INPUT_POST,
                'studyYear',
                FILTER_SANITIZE_SPECIAL_CHARS
            )
        );

        $user = new User();
        Init::userInitBefore($user, $inputData);
        $hasCreated = Database::createUser($user);

        echo $hasCreated;

        unset($user);
    }

    public function checkAction()
    {
        $inputData = array(
            'username' => filter_input(
                INPUT_POST,
                'username',
                FILTER_SANITIZE_SPECIAL_CHARS
            ),
            'email' => filter_input(
                INPUT_POST,
                'email',
                FILTER_SANITIZE_SPECIAL_CHARS
            ),
            'password' => filter_input(
                INPUT_POST,
                'password',
                FILTER_SANITIZE_SPECIAL_CHARS
            )
        );

        $user = new User();
        Init::userInitBeforeAuth($user, $inputData);

        $dbUser = new User();

        if (!empty($user->getUsername())) {
            $readUser = Database::getUserByCriteria(
                'username',
                $user->getUsername()
            );
            if (!empty($readUser->id)) {
                Init::userInitAfterAuth($readUser, $dbUser);
                $checking = ($user->getPassword() == $dbUser->getPassword()) ? true : false;
            } else {
                $checking = false;
            }
        } else if (!empty($user->getEmail())) {
            $readUser = Database::getUserByCriteria(
                'email',
                $user->getEmail()
            );
            if (!empty($readUser->id)) {
                Init::userInitAfterAuth($readUser, $dbUser);
                $checking = ($user->getPassword() == $dbUser->getPassword()) ?
                    true :
                    false;
            } else {
                $checking = false;
            }
        } else {
            $checking = false;
        }

        if ($checking) {
            session_start();
            $_SESSION['name'] = $dbUser->getUsername();
            $message = "Користувача авторизовано.<br>Вітаємо {$dbUser->getUsername()}!";
        } else {
            $message = 'Користувача не авторизовано.';
        }

        require_once 'app/Resources/view/messageTemplate.php';

        unset($user, $dbUser);
    }
}