<?php
require_once(dirname(dirname(__FILE__)) . '/Helpers/PagesController.php');
require_once(dirname(dirname(__FILE__)) . '/Helpers/Router.php');
session_start();
if (empty($_SESSION['user'])) Router::route('login');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brifer</title>
    <!--   bootstrap and Tailwind links -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- CSS link -->
    <link rel="stylesheet" href="views/css/main-page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- JS file link -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script><!-- Alpine's CSP-friendly Core -->
    <script src="views/js/studentMain.page.js" defer></script>

</head>

<body class="flex gap-4">
    <nav class="w-2/12 flex flex-column gap-3.5 shadow-sm border rounded fixed" style="padding:3vh; height:94vh;">

        <span class="hover:shadow rounded <?= empty($_GET['page']) || $_GET['page'] === 's-allProjects' ? 'selected-tab' : '' ?> p-2.5 flex text-blue-500 tems-center gap-3" id="s-allProjects">
            <svg width="30" height="30" viewBox="0 0 30 30" fill="rgb(59 130 246 / 200)" xmlns="http://www.w3.org/2000/svg">
                <path d="M3 15C3 11.8174 4.26428 8.76516 6.51472 6.51472C8.76516 4.26428 11.8174 3 15 3V15H27C27 18.1826 25.7357 21.2348 23.4853 23.4853C21.2348 25.7357 18.1826 27 15 27C11.8174 27 8.76516 25.7357 6.51472 23.4853C4.26428 21.2348 3 18.1826 3 15Z" />
                <path d="M18 3.37793C20.0754 3.91562 21.9693 4.9986 23.4853 6.51461C25.0013 8.03062 26.0843 9.92449 26.622 11.9999H18V3.37793Z" />
            </svg>
            All Projects
        </span>

        <span class="hover:shadow rounded <?= !empty($_GET['page']) && $_GET['page'] === 'onBoard' ? 'selected-tab' : '' ?> p-2.5 flex text-blue-500 tems-center gap-3" id="onBoard">
            <svg width="30" height="30" viewBox="0 0 26 26" fill="rgb(59 130 246 / 200)" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.9994 0.811401C6.26873 0.811401 0.81189 6.26824 0.81189 12.9989C0.81189 19.7296 6.26873 25.1864 12.9994 25.1864C19.7301 25.1864 25.1869 19.7296 25.1869 12.9989C25.1869 6.26824 19.7301 0.811401 12.9994 0.811401ZM18.6244 14.8739H12.9994C12.7508 14.8739 12.5123 14.7751 12.3365 14.5993C12.1607 14.4235 12.0619 14.185 12.0619 13.9364V5.4989C12.0619 5.25026 12.1607 5.01181 12.3365 4.83599C12.5123 4.66017 12.7508 4.5614 12.9994 4.5614C13.248 4.5614 13.4865 4.66017 13.6623 4.83599C13.8381 5.01181 13.9369 5.25026 13.9369 5.4989V12.9989H18.6244C18.873 12.9989 19.1115 13.0977 19.2873 13.2735C19.4631 13.4493 19.5619 13.6878 19.5619 13.9364C19.5619 14.185 19.4631 14.4235 19.2873 14.5993C19.1115 14.7751 18.873 14.8739 18.6244 14.8739Z" />
            </svg>
            On Board
        </span>
        <hr>
        <a class=" text-blue-500 p-2.5 flex items-center gap-3" href="./controllers/logoutController.php">
            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M20 15H5M20 15L15 20M20 15L15 10M18.75 5H21.25C22.2446 5 23.1984 5.39509 23.9017 6.09835C24.6049 6.80161 25 7.75544 25 8.75V21.25C25 22.2446 24.6049 23.1984 23.9017 23.9017C23.1984 24.6049 22.2446 25 21.25 25H18.75" stroke="#2A78FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            Log out
        </a>
    </nav>
    <main class="w-full ml-72 pb-8">
        <?php
        if (isset($_GET['page'])) PagesController::LoadePage($_GET['page']);
        elseif ($_SESSION['user']['type'] === "T") PagesController::LoadePage('dashboard');
        else PagesController::LoadePage('s-allProjects');
        ?>
    </main>
</body>

</html>