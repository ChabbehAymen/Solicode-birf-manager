<?php require_once(dirname(dirname(__FILE__)) ."/Helpers/ReportHandler.php");?>
<?php session_start();?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<!--   bootstrap and Tailwind links -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
<!-- CSS file link  -->
    <link rel="stylesheet" href="./views/css/login-page.css">
    <title>Document</title>

<!-- JS file link -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script><!-- Alpine's CSP-friendly Core -->
    <script src="./views/js/login.script.js" defer></script>

</head>
<body>
<button type="button" @click="open = false" <?php if (ReportHandler::getReport()!== null):?>x-data='{open: true}'<?php else:?>x-data='{open: false}'<?php endif?>    x-show="open" x-transition.duration.300ms class="fixed right-4 top-4 z-50 rounded-md bg-red-500 px-4 py-2 text-white transition hover:bg-red-600">
        <div class="flex items-center space-x-2">
            <span class="text-3xl"><i class="bx bx-check"></i></span>
            <p class="font-bold"><?php if (ReportHandler::getReport() === ReportHandler::$NO_USER_FOUND):?> No User Found With This Email<?php elseif(ReportHandler::getReport() === ReportHandler::$INCORRECT_PASS):?>Incorrect Password<?php endif?></p>
</div>
<?php ReportHandler::dropReportSession()?>
    </button>
<main class="flex">
    <div class="w-50 login-img-holder"></div>
    <div class="w-50 h-full">
        <form action="./controllers/loginController.php" method="post" class=" h-full flex flex-column justify-center items-center gap-10" >
            <p class="font-bold text-xl">Login</p>
            <input type="email" name="email" placeholder="User Email" class="form-control w-1/2">
            <input type="text" name="password" placeholder="User Password" class="form-control w-1/2"><!-- this inpute type will be changed to password-->
            <input type="submit" value="Login" name="login" class="btn btn-primary w-fit">
        </form>
    </div>
</main>
</body>
</html>


<!-- this for the dashboard page to not repete it
    <nav class="w-40 flex flex-column gap-3.5 p-3">
    <a class="bg-blue-500 text-white p-2.5 rounded" href="">Dashboard</a>
    <a class="bg-white text-blue-500 p-2.5 rounded" href="">Students</a>
    <a class="bg-white text-blue-500 p-2.5 rounded" href="">Create Project</a>
    <a class="bg-white text-blue-500 p-2.5 rounded" href="">Projects</a>
    <hr>
    <a class="bg-white text-blue-500 p-2.5 rounded" href="">Log out</a>
</nav> -->