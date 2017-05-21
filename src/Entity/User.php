<?php

namespace Entity\User;


class User
{

    /**
     * @var string $table
     */
    private $table = 'user';

    /**
     * @var int $id
     */
    private $id;

    /**
     * @var string $username
     */
    private $username;

    /**
     * @var string $username
     */
    private $email;

    /**
     * @var string $password
     */
    private $password;

    /**
     * @var string $firstName
     */
    private $firstName;

    /**
     * @var string $lastName
     */
    private $lastName;

    /**
     * @var string $country
     */
    private $country;

    /**
     * @var string $city
     */
    private $city;

    /**
     * @var string $school
     */
    private $school;

    /**
     * @var int $studyYear
     */
    private $studyYear;

    /**
     * @var int $theoryPlace
     */
    private $theoryPlace;

    /**
     * @var int $paragraph
     */
    private $paragraph;


    /**
     * @var int $practicePlace
     */
    private $practicePlace;


    /**
     * @var int $section
     */
    private $section;

    /**
     * @var string $knowLevel
     */
    private $knowLevel;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getSchool()
    {
        return $this->school;
    }

    /**
     * @param string $school
     */
    public function setSchool($school)
    {
        $this->school = $school;
    }

    /**
     * @return int
     */
    public function getStudyYear()
    {
        return $this->studyYear;
    }

    /**
     * @param int $studyYear
     */
    public function setStudyYear($studyYear)
    {
        $this->studyYear = $studyYear;
    }

    /**
     * @return int
     */
    public function getTheoryPlace()
    {
        return $this->theoryPlace;
    }

    /**
     * @param int $theoryPlace
     */
    public function setTheoryPlace($theoryPlace)
    {
        $this->theoryPlace = $theoryPlace;
    }

    /**
     * @return int
     */
    public function getPracticePlace()
    {
        return $this->practicePlace;
    }

    /**
     * @param int $practicePlace
     */
    public function setPracticePlace($practicePlace)
    {
        $this->practicePlace = $practicePlace;
    }

    /**
     * @return string
     */
    public function getKnowLevel()
    {
        return $this->knowLevel;
    }

    /**
     * @param string $knowLevel
     */
    public function setKnowLevel($knowLevel)
    {
        $this->knowLevel = $knowLevel;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return int
     */
    public function getParagraph()
    {
        return $this->paragraph;
    }

    /**
     * @param int $paragraph
     */
    public function setParagraph($paragraph)
    {
        $this->paragraph = $paragraph;
    }

    /**
     * @return int
     */
    public function getSection()
    {
        return $this->section;
    }

    /**
     * @param int $section
     */
    public function setSection($section)
    {
        $this->section = $section;
    }
}