<?php
class PagesController
{
    private static $pages = ['t-dashboard'=>'/views/teacher-dashboard-page.php'];

    static function LoadePage(string $name)
    {
        foreach (self::$pages as $lName => $path) {
            if($name === $lName) require dirname(dirname(__FILE__)).$path;
        }
    }
    
}
