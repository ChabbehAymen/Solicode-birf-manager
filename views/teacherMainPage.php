<?php
require_once(dirname(dirname(__FILE__)) . '/Helpers/PagesController.php');
session_start();
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
    <script src="https://cdn.canvasjs.com/canvasjs.min.js" defer></script>
    <script src="views/js/main.page.js" defer></script>
</head>

<body class="flex gap-4">
    <nav class="w-2/12 flex flex-column gap-3.5 shadow-sm border rounded fixed" style="padding:3vh; height:94vh;">
        <span class="hover:shadow rounded <?= empty($_GET['page']) || $_GET['page'] === 'dashboard' ? 'selected-tab' : '' ?> p-2.5 flex items-center gap-3" id="dashboard">
            <svg width="30" height="30" viewBox="0 0 30 30" fill="rgb(59 130 246 / 200)" xmlns="http://www.w3.org/2000/svg">
                <path d="M3 15C3 11.8174 4.26428 8.76516 6.51472 6.51472C8.76516 4.26428 11.8174 3 15 3V15H27C27 18.1826 25.7357 21.2348 23.4853 23.4853C21.2348 25.7357 18.1826 27 15 27C11.8174 27 8.76516 25.7357 6.51472 23.4853C4.26428 21.2348 3 18.1826 3 15Z" />
                <path d="M18 3.37793C20.0754 3.91562 21.9693 4.9986 23.4853 6.51461C25.0013 8.03062 26.0843 9.92449 26.622 11.9999H18V3.37793Z" />
            </svg>
            Dashboard
        </span>
        <span class="hover:shadow rounded <?= !empty($_GET['page']) && ($_GET['page'] === 'students' || $_GET['page'] === 'student-projects') ? 'selected-tab' : '' ?> p-2.5 flex text-blue-500 items-center gap-3" id="students">
            <svg width="26" height="20" viewBox="0 0 26 20" fill="rgb(59 130 246 / 200)" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M13 2.50001C12.4255 2.50001 11.8566 2.61318 11.3258 2.83304C10.795 3.0529 10.3127 3.37516 9.90641 3.78142C9.50015 4.18768 9.17789 4.66997 8.95803 5.20077C8.73816 5.73157 8.625 6.30048 8.625 6.87501C8.625 7.44955 8.73816 8.01845 8.95803 8.54925C9.17789 9.08005 9.50015 9.56235 9.90641 9.96861C10.3127 10.3749 10.795 10.6971 11.3258 10.917C11.8566 11.1369 12.4255 11.25 13 11.25C14.1603 11.25 15.2731 10.7891 16.0936 9.96861C16.9141 9.14813 17.375 8.03534 17.375 6.87501C17.375 5.71469 16.9141 4.60189 16.0936 3.78142C15.2731 2.96095 14.1603 2.50001 13 2.50001ZM11.125 12.5C9.79892 12.5 8.52715 13.0268 7.58947 13.9645C6.65178 14.9022 6.125 16.1739 6.125 17.5C6.125 18.1631 6.38839 18.7989 6.85723 19.2678C7.32607 19.7366 7.96196 20 8.625 20H17.375C18.038 20 18.6739 19.7366 19.1428 19.2678C19.6116 18.7989 19.875 18.1631 19.875 17.5C19.875 16.1739 19.3482 14.9022 18.4105 13.9645C17.4728 13.0268 16.2011 12.5 14.875 12.5H11.125ZM19.65 8.63001C20.0474 7.11669 19.9176 5.51316 19.2822 4.0834C18.6467 2.65364 17.5433 1.48285 16.1537 0.763763C16.6833 0.401909 17.2859 0.160902 17.9189 0.0578081C18.5519 -0.0452855 19.1998 -0.00794414 19.8168 0.167189C20.4338 0.342321 21.0047 0.650962 21.4892 1.07125C21.9736 1.49154 22.3597 2.01321 22.6202 2.5993C22.8806 3.18539 23.009 3.82157 22.9963 4.4628C22.9835 5.10402 22.83 5.73461 22.5465 6.30989C22.263 6.88518 21.8564 7.3911 21.3557 7.79182C20.8549 8.19254 20.2722 8.47827 19.6487 8.62876L19.65 8.63001ZM22.375 17.5H23C23.663 17.5 24.2989 17.2366 24.7678 16.7678C25.2366 16.2989 25.5 15.6631 25.5 15C25.5 13.6739 24.9732 12.4022 24.0355 11.4645C23.0978 10.5268 21.8261 10 20.5 10H19.125C18.955 10.333 18.7581 10.6515 18.5362 10.9525C19.7008 11.6036 20.6705 12.5537 21.3453 13.7046C22.0201 14.8556 22.3756 16.1658 22.375 17.5ZM3 4.37501C2.99981 3.5785 3.21707 2.79705 3.62835 2.11493C4.03963 1.43281 4.62932 0.875917 5.33384 0.504302C6.03835 0.132687 6.83094 -0.0395455 7.62614 0.00617798C8.42134 0.0519015 9.18898 0.313846 9.84625 0.763763C8.45531 1.4813 7.35083 2.65195 6.71534 4.08224C6.07986 5.51253 5.95142 7.11684 6.35125 8.63001C5.3961 8.3999 4.54618 7.85508 3.93828 7.08325C3.33039 6.31142 2.99989 5.35749 3 4.37501ZM6.875 10H5.5C4.17392 10 2.90215 10.5268 1.96447 11.4645C1.02678 12.4022 0.5 13.6739 0.5 15C0.5 15.6631 0.763392 16.2989 1.23223 16.7678C1.70107 17.2366 2.33696 17.5 3 17.5H3.625C3.62441 16.1658 3.97985 14.8556 4.65466 13.7046C5.32947 12.5537 6.29919 11.6036 7.46375 10.9525C7.24195 10.6515 7.04505 10.333 6.875 10Z" />
            </svg>
            Students
        </span>

        <span class="hover:shadow rounded <?= !empty($_GET['page']) && $_GET['page'] === 'projects' ? 'selected-tab' : '' ?> p-2.5 flex text-blue-500 tems-center gap-3" id="projects">
            <svg width="30" height="30" viewBox="0 0 30 30" fill="rgb(59 130 246 / 200)" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 3.21429C0 1.43973 1.11979 0 2.5 0H7.5C8.88021 0 10 1.43973 10 3.21429V4.28571H20V3.21429C20 1.43973 21.1198 0 22.5 0H27.5C28.8802 0 30 1.43973 30 3.21429V9.64286C30 11.4174 28.8802 12.8571 27.5 12.8571H22.5C21.1198 12.8571 20 11.4174 20 9.64286V8.57143H10V9.64286C10 9.7567 9.99479 9.87054 9.98438 9.97768L14.1667 17.1429H19.1667C20.5469 17.1429 21.6667 18.5826 21.6667 20.3571V26.7857C21.6667 28.5603 20.5469 30 19.1667 30H14.1667C12.7865 30 11.6667 28.5603 11.6667 26.7857V20.3571C11.6667 20.2433 11.6719 20.1295 11.6823 20.0223L7.5 12.8571H2.5C1.11979 12.8571 0 11.4174 0 9.64286V3.21429Z" />
            </svg>
            Projects
        </span>

        <span class="hover:shadow rounded <?= !empty($_GET['page']) && $_GET['page'] === 'create-project' ? 'selected-tab' : '' ?> p-2.5 flex text-blue-500 tems-center gap-3" id="create-project">
            <svg width="30" height="30" viewBox="0 0 30 30" fill="rgb(59 130 246 / 200)" xmlns="http://www.w3.org/2000/svg">
                <path d="M30 24.375C30 26.4434 28.3184 28.125 26.25 28.125H3.75C1.68164 28.125 0 26.4434 0 24.375V5.625C0 3.55664 1.68164 1.875 3.75 1.875H11.25C12.4277 1.875 13.541 2.43164 14.25 3.375L15.375 4.875C15.7266 5.34961 16.2832 5.625 16.875 5.625H26.25C28.3184 5.625 30 7.30664 30 9.375V24.375ZM13.5938 22.0312C13.5938 22.8105 14.2207 23.4375 15 23.4375C15.7793 23.4375 16.4062 22.8105 16.4062 22.0312V18.2812H20.1562C20.9355 18.2812 21.5625 17.6543 21.5625 16.875C21.5625 16.0957 20.9355 15.4688 20.1562 15.4688H16.4062V11.7188C16.4062 10.9395 15.7793 10.3125 15 10.3125C14.2207 10.3125 13.5938 10.9395 13.5938 11.7188V15.4688H9.84375C9.06445 15.4688 8.4375 16.0957 8.4375 16.875C8.4375 17.6543 9.06445 18.2812 9.84375 18.2812H13.5938V22.0312Z" />
            </svg>
            Create Project
        </span>

        <hr>
        <a class=" text-blue-500 p-2.5 flex items-center gap-3" href="">
            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M20 15H5M20 15L15 20M20 15L15 10M18.75 5H21.25C22.2446 5 23.1984 5.39509 23.9017 6.09835C24.6049 6.80161 25 7.75544 25 8.75V21.25C25 22.2446 24.6049 23.1984 23.9017 23.9017C23.1984 24.6049 22.2446 25 21.25 25H18.75" stroke="#2A78FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            Log out</a>
    </nav>
    <main class="w-full ml-64"  >
        <?php
        if (isset($_GET['page'])) PagesController::LoadePage($_GET['page']);
        elseif ($_SESSION['user']['type'] === "T") PagesController::LoadePage('dashboard');
        else PagesController::LoadePage('home');
        ?>
    </main>
</body>

</html>