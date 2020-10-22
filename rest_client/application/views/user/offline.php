<!DOCTYPE html>
<html lang="en">
<head>
  <title>permanto</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="http://localhost/rest_server_codeigniter/with_codeigniter/assets/css/style.css">
</head>
<body>


<div class="container">
  <div class="jumbotron jumbotron-fluid text-center">
    <div class="container">
        <h1 class="display-4"><?=$offline['name']?></h1>
            <p class="lead"><?=$offline['tag']?> .</p>
    </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4">

            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="http://localhost/rest_server_codeigniter/with_codeigniter/home/">Home</a></li>
                <li class="breadcrumb-item"><a href="http://localhost/rest_server_codeigniter/with_codeigniter/home/library">Library</a></li>
                <li class="breadcrumb-item"><a href="http://localhost/rest_server_codeigniter/with_codeigniter/authentication/">Login</a></li>
              </ol>
            </nav>

        </div>
    </div>
</div>

<div class="container">
    <div class="row">

        <div class="col-5">
                    <h5>Hallo <?=$offline['name']?></h5>
            <h6 class="text-danger blockquote_footer"><?=$status?></h6>

        </div>

    </div>

<footer class="footer">
      <div class="container">
        <span class="text-muted">Place sticky footer content here.</span>
      </div>
    </footer></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="http://localhost/rest_server_codeigniter/with_codeigniter/assets/js/login.js"></script>
</body>
</html>