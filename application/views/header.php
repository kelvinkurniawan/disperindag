<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Jogja Premium Export Virtual Expo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" />
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/css/splide.min.css" />
  <link
    href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="<?=base_url()?>assets/css/style.css" />
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-light sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?=base_url()?>">
        <img src="<?=base_url('assets/images/Logo Jogja Premium.png')?>" width="72" />
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?=base_url()?>">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="javascript:void(0)" onclick="goExplore()">Exhibitors</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('page/contact')?>">Contact Us</a>
          </li>
          <?php if (isset($this->session->user)): ?>
          <li class="nav-item">
            <a class="nav-link text-danger" href="<?=base_url('page/logout')?>">
              Logout
            </a>
          </li>
          <?php else: ?>
          <li class="nav-item">
            <a type="button" class="btn btn-outline-secondary" onclick="fireLoginModal()">
              Login
            </a>
          </li>
          <?php endif;?>
        </ul>
      </div>
    </div>
  </nav>
</body>

</html>