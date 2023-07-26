<?php

// В этом подходе мы можем внедрить объект через конструктор класса.
class Programmer {
    private $skills;
    public function __construct($skills){
        $this->skills = $skills;
    }
    public function totalSkills(){
        return count($this->skills);
    }
}
$createskills = array("PHP", "JQUERY", "AJAX");
$p = new Programmer($createskills);
echo $p->totalSkills();


// вы вводите объект в свой класс через функцию установки.
class Profile {
    private $language;
    public function setLanguage($language){
        $this->language = $language;
    }
}
$profile = new Profile();
$language = ["Hindi","English","French"];
$profile->setLanguage($language);
