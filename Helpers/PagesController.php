<?php
class PagesController
{
    private static $pages = ['dashboard'=>'/views/layouts-teacher/dashboard-page.php', 'student'=>'/views/layouts-teacher/students-page.php', 'projects'=>'/views/layouts-teacher/projects-page.php', 'create-project'=>'/views/layouts-teacher/create-project-page.php'];

    static function LoadePage(string $name)
    {
        foreach (self::$pages as $lName => $path) {
            if($name === $lName) require dirname(dirname(__FILE__)).$path;
        }
    }
    
}
