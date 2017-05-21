<?php

use Entity\Topic\Topic;
use Service\Initialization\InitializationService as Init;
use Service\Database\DatabaseService as Database;

require_once ('src/Entity/Topic.php');
require_once ('src/Service/InitializationService.php');
require_once ('src/Service/DatabaseService.php');

class PageController
{

    function __construct()
    {
    }

    public function homeAction()
    {
        session_start();
        if (!empty($_SESSION['name'])) {
            $session = $_SESSION['name'];
        } else {
            $session = '';
        }
        $topics = Database::getAll('topic');
        $title = 'Excellent physics';
        $template = 'home';
        require_once 'app/Resources/view/baseHomeTemplate.php';
    }

    public function topicsAction()
    {
        session_start();
        if (!empty($_SESSION['name'])) {
            $session = $_SESSION['name'];
        } else {
            $session = '';
        }
        $topics = Database::getAll('topic');
        $title = 'Теорія курсу';
        $template = 'topics';
        $path = '';
        require_once 'app/Resources/view/baseOtherTemplate.php';
    }

    public function practiceAction()
    {
        session_start();
        if (!empty($_SESSION['name'])) {
            $session = $_SESSION['name'];
        } else {
            $session = '';
        }
        $topics = Database::getAll('topic');
        $title = 'Практика курсу';
        $template = 'practice';
        $path = '';
        require_once 'app/Resources/view/baseOtherTemplate.php';
    }

    public function testsAction()
    {
        session_start();
        if (!empty($_SESSION['name'])) {
            $session = $_SESSION['name'];
        } else {
            $session = '';
        }
        $title = 'Тестування';
        $template = 'tests';
        $path = '';
        require_once 'app/Resources/view/baseOtherTemplate.php';
    }

    public function testAction()
    {
        session_start();
        if (!empty($_SESSION['name'])) {
            $session = $_SESSION['name'];
        } else {
            $session = '';
        }
        $title = 'Вступний тест';
        $template = 'test';
        $path = '';
        require_once 'app/Resources/view/baseOtherTemplate.php';
    }

    public function regAction()
    {
        session_start();
        if (!empty($_SESSION['name'])) {
            header('Location: home');
        } else {
            $title = 'Реєстрація на курс';
            $template = 'reg';
            $path = '';
            require_once 'app/Resources/view/baseOtherTemplate.php';
        }
    }

    public function authAction()
    {
        session_start();
        if (!empty($_SESSION['name'])) {
            $session = $_SESSION['name'];
            header('Location: home');
        } else {
            $session = '';
            $title = 'Авторизація на курс';
            $template = 'auth';
            $path = '';
            require_once 'app/Resources/view/baseOtherTemplate.php';
        }
    }

    public function exitAction()
    {
        session_start();
        unset($_SESSION['name']);
        session_destroy();
        header('Location: authorization');
    }
}