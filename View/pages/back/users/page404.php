<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../assets/css/page404.css" />
  <title>WeDrive</title>
</head>

<body>
  <div class="container">
    <div class="error-title">Error</div>
    <div class="error-message">Got lost? How.....? Why.....? Ahhhh....</div>
    <button>
      <a href="https://www.google.com/search?q=<?= isset($_GET['error']) ? urlencode($_GET['error']) : '' ?>" target="_blank">
        Search the Error
      </a>
    </button>
  </div>
</body>

</html>