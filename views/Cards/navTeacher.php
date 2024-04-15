<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap');
        body{
          font-family: "Source Code Pro", monospace;
        }
        .Button-nav,.Button-nav-logout
        {
            cursor: pointer;
        }
        .Button-nav:hover,.Button-nav-logout:hover
        {
            background-color: #2A78FF;
        }
        .Button-nav:hover>svg
        {
            fill: white;
            stroke: white;
        }
        .Button-nav-logout:hover>svg
        {
            stroke: white;
        }
        .Button-nav:hover>strong
        {
            color: white;
        }
        hr{
            width:75%;
            margin-left: 12.5%;
        }   
      </style>
</head>
<body class="px-1;">
    <form>
        <div class="rounded-3 shadow p-3 "  style="height: 99.6vh; width: 15%;">
            <div class="d-flex  align-items-center gap-3 Button-nav rounded-3 p-1 py-3" style="background-color: #2A78FF;color:white">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="white"  xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 12C0 8.8174 1.26428 5.76516 3.51472 3.51472C5.76516 1.26428 8.8174 0 12 0V12H24C24 15.1826 22.7357 18.2348 20.4853 20.4853C18.2348 22.7357 15.1826 24 12 24C8.8174 24 5.76516 22.7357 3.51472 20.4853C1.26428 18.2348 0 15.1826 0 12Z"/>
                    <path d="M15 0.377991C17.0754 0.915686 18.9693 1.99866 20.4853 3.51467C22.0013 5.03068 23.0843 6.92455 23.622 8.99999H15V0.377991Z" />
                </svg>
                <button type="submit">
                <strong >All briefs</strong>
                </button>
            </div>
            <br>
            <div class="d-flex  gap-3 align-items-center Button-nav rounded-3 p-1 m-l-2 py-3">
                <svg width="24" height="24" fill="#2A78FF" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 0C5.37288 0 0 5.37288 0 12C0 18.6271 5.37288 24 12 24C18.6271 24 24 18.6271 24 12C24 5.37288 18.6271 0 12 0ZM17.5385 13.8462H12C11.7552 13.8462 11.5204 13.7489 11.3473 13.5758C11.1742 13.4027 11.0769 13.1679 11.0769 12.9231V4.61538C11.0769 4.37057 11.1742 4.13578 11.3473 3.96267C11.5204 3.78956 11.7552 3.69231 12 3.69231C12.2448 3.69231 12.4796 3.78956 12.6527 3.96267C12.8258 4.13578 12.9231 4.37057 12.9231 4.61538V12H17.5385C17.7833 12 18.0181 12.0973 18.1912 12.2704C18.3643 12.4435 18.4615 12.6783 18.4615 12.9231C18.4615 13.1679 18.3643 13.4027 18.1912 13.5758C18.0181 13.7489 17.7833 13.8462 17.5385 13.8462Z" />
                    </svg>
                <strong>Current brief</strong>
                <!-- <strong>All briefs</strong> -->
            </div>
            <hr>
            <div class="d-flex  gap-3 align-items-center Button-nav-logout rounded-3 p-1 m-l-2 py-3">
                <svg width="30" height="30" stroke="#2A78FF" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 15H5M20 15L15 20M20 15L15 10M18.75 5H21.25C22.2446 5 23.1984 5.39509 23.9017 6.09835C24.6049 6.80161 25 7.75544 25 8.75V21.25C25 22.2446 24.6049 23.1984 23.9017 23.9017C23.1984 24.6049 22.2446 25 21.25 25H18.75"  stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <strong>log out</strong>
                <!-- <strong>All briefs</strong> -->
            </div>
        </form>
        <div>
            
        </div>
    </div>
</body>
</html>