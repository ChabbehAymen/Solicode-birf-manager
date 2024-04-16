<?php
require_once(dirname(dirname(__FILE__)) . "/Helpers/Router.php");
session_start();
unset($_SESSION['user']);
Router::route('login');