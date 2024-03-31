<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
  </head>
  <body style="overflow: hidden">
    <div class="row">
      <div class="col-lg-6 col-sm-12 col-md-6">
        <div class="row justify-content-center">
          <img src="views/images/login-img.png" alt="" style="width: 90%" />
        </div>
      </div>
      <div class="col-lg-6 col-sm-12 col-md-6">
        <div class="row align-items-center h-100">
          <div class="row justify-content-center">
            <div>
              <h2 class="text-center">
                <strong> Login </strong>
              </h2>
            </div>
            <div class="row w-75">
              <form>
                <br />
                <div class="form-group">
                  <input
                    type="email"
                    class="form-control"
                    aria-describedby="emailHelp"
                    placeholder="Enter email"
                  />
                </div>
                <br />
                <div class="form-group">
                  <input
                    type="password"
                    class="form-control"
                    placeholder="Password"
                  />
                </div>
                <br />
                <div class="d-flex justify-content-center">
                  <button type="submit" class="btn btn-primary text-white">
                    <strong>Welcome back</strong>
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
