<?php
require_once "../../../Controller/Users/authentification.php";
require_once "../../../Model/Users/user.php";
require_once "../../../Model/Users/passager.php";
require_once "../../../Model/Users/conducteur.php";
require_once "../../../Model/Users/admin.php";
$user = unserialize($_SESSION['user']) ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../../assets/img/favicon.png">
    <title>
        Argon Dashboard 2 PRO by Creative Tim
    </title>


    <link rel="canonical" href="https://www.creative-tim.com/product/argon-dashboard-pro" />

    <meta name="keywords" content="creative tim, html dashboard, html css dashboard, web dashboard, bootstrap 5 dashboard, bootstrap 5, css3 dashboard, bootstrap 5 admin, Argon Dashboard bootstrap 5 dashboard, frontend, responsive bootstrap 5 dashboard, soft design, soft dashboard bootstrap 5 dashboard">
    <meta name="description" content="Argon Dashboard PRO is a beautiful Bootstrap 5 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you.">

    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Argon Dashboard PRO by Creative Tim">
    <meta name="twitter:description" content="Argon Dashboard PRO is a beautiful Bootstrap 5 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you.">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image" content="https://s3.amazonaws.com/creativetim_bucket/products/137/original/argon-dashboard-pro.jpg">

    <meta property="fb:app_id" content="655968634437471">
    <meta property="og:title" content="Argon Dashboard PRO by Creative Tim" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="https://demos.creative-tim.com/argon-dashboard-pro/pages/dashboards/landing" />
    <meta property="og:image" content="https://s3.amazonaws.com/creativetim_bucket/products/137/original/argon-dashboard-pro.jpg" />
    <meta property="og:description" content="Argon Dashboard PRO is a beautiful Bootstrap 5 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you." />
    <meta property="og:site_name" content="Creative Tim" />

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    <link href="../../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />

    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />

    <link id="pagestyle" href="../../assets/css/argon-dashboard.min.css?v=2.0.5" rel="stylesheet" />

    <style>
        .async-hide {
            opacity: 0 !important
        }
    </style>
    <script>
        (function(a, s, y, n, c, h, i, d, e) {
            s.className += ' ' + y;
            h.start = 1 * new Date;
            h.end = i = function() {
                s.className = s.className.replace(RegExp(' ?' + y), '')
            };
            (a[n] = a[n] || []).hide = h;
            setTimeout(function() {
                i();
                h.end = null
            }, c);
            h.timeout = c;
        })(window, document.documentElement, 'async-hide', 'dataLayer', 4000, {
            'GTM-K9BGS8K': true
        });
    </script>

    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-46172202-22', 'auto', {
            allowLinker: true
        });
        ga('set', 'anonymizeIp', true);
        ga('require', 'GTM-K9BGS8K');
        ga('require', 'displayfeatures');
        ga('require', 'linker');
        ga('linker:autoLink', ["2checkout.com", "avangate.com"]);
    </script>


    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-NKDMSK6');
    </script>

</head>

<body class="g-sidenav-show bg-gray-100">
    <?php require_once "dashHeader.php" ?>
    <!-- <div class="min-height-300 bg-primary position-absolute w-100"></div> -->
    <main class="main-content max-height-vh-100 h-100">
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl ">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm">
                            <a class="text-white" href="javascript:;">
                                <i class="ni ni-box-2"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Account</a></li>
                        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Settings</li>
                    </ol>
                    <h6 class="font-weight-bolder text-white">Settings</h6>
                </nav>
                <div class="sidenav-toggler sidenav-toggler-inner d-xl-block d-none me-auto">
                    <a href="javascript:;" class="nav-link text-body p-0">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line bg-white"></i>
                            <i class="sidenav-toggler-line bg-white"></i>
                            <i class="sidenav-toggler-line bg-white"></i>
                        </div>
                    </a>
                </div>
                <div class="collapse navbar-collapse me-md-0 me-sm-4 mt-sm-0 mt-2" id="navbar">
                    <ul class="navbar-nav justify-content-end ms-auto">
                        <li class="nav-item d-xl-none ps-3 pe-0 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid mt-6">
            <div class="row align-items-center">
                <div class="col-lg-4 col-sm-8">
                    <div class="nav-wrapper position-relative end-0">
                        <ul class="nav nav-pills nav-fill p-1" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 active  active " data-bs-toggle="tab" href="settings.php" role="tab" aria-selected="true">
                                    Messages
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="../../examples/pages/account/billing.html" role="tab" aria-selected="false">
                                    Social
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="../../examples/pages/account/invoice.html" role="tab" aria-selected="false">
                                    Notifications
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="../../examples/pages/account/security.html" role="tab" aria-selected="false">
                                    Backup
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid my-5 py-2">
            <div class="row mb-5">
                <div class="col-lg-3">
                    <div class="card position-sticky top-1">
                        <ul class="nav flex-column bg-white border-radius-lg p-3">
                            <li class="nav-item">
                                <a class="nav-link text-body d-flex align-items-center" data-scroll="" href="#profile">
                                    <i class="ni ni-spaceship me-2 text-dark opacity-6"></i>
                                    <span class="text-sm">Profile</span>
                                </a>
                            </li>
                            <li class="nav-item pt-2">
                                <a class="nav-link text-body d-flex align-items-center" data-scroll="" href="#basic-info">
                                    <i class="ni ni-books me-2 text-dark opacity-6"></i>
                                    <span class="text-sm">Basic Info</span>
                                </a>
                            </li>
                            <li class="nav-item pt-2">
                                <a class="nav-link text-body d-flex align-items-center" data-scroll="" href="#password">
                                    <i class="ni ni-atom me-2 text-dark opacity-6"></i>
                                    <span class="text-sm">Change Password</span>
                                </a>
                            </li>
                            <li class="nav-item pt-2">
                                <a class="nav-link text-body d-flex align-items-center" data-scroll="" href="#2fa">
                                    <i class="ni ni-ui-04 me-2 text-dark opacity-6"></i>
                                    <span class="text-sm">2FA</span>
                                </a>
                            </li>
                            <li class="nav-item pt-2">
                                <a class="nav-link text-body d-flex align-items-center" data-scroll="" href="#accounts">
                                    <i class="ni ni-badge me-2 text-dark opacity-6"></i>
                                    <span class="text-sm">Accounts</span>
                                </a>
                            </li>
                            <li class="nav-item pt-2">
                                <a class="nav-link text-body d-flex align-items-center" data-scroll="" href="#notifications">
                                    <i class="ni ni-bell-55 me-2 text-dark opacity-6"></i>
                                    <span class="text-sm">Notifications</span>
                                </a>
                            </li>
                            <li class="nav-item pt-2">
                                <a class="nav-link text-body d-flex align-items-center" data-scroll="" href="#sessions">
                                    <i class="ni ni-watch-time me-2 text-dark opacity-6"></i>
                                    <span class="text-sm">Sessions</span>
                                </a>
                            </li>
                            <li class="nav-item pt-2">
                                <a class="nav-link text-body d-flex align-items-center" data-scroll="" href="#delete">
                                    <i class="ni ni-settings-gear-65 me-2 text-dark opacity-6"></i>
                                    <span class="text-sm">Delete Account</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 mt-lg-0 mt-4">

                    <div class="card card-body" id="profile">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-sm-auto col-4">
                                <div class="avatar avatar-xl position-relative">
                                    <img src="../../assets/img/team-3.jpg" alt="bruce" class="w-100 border-radius-lg shadow-sm">
                                </div>
                            </div>
                            <div class="col-sm-auto col-8 my-auto">
                                <div class="h-100">
                                    <h5 class="mb-1 font-weight-bolder">
                                        Mark Johnson
                                    </h5>
                                    <p class="mb-0 font-weight-bold text-sm">
                                        CEO / Co-Founder
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-auto ms-sm-auto mt-sm-0 mt-3 d-flex">
                                <label class="form-check-label mb-0">
                                    <small id="profileVisibility">
                                        Switch to invisible
                                    </small>
                                </label>
                                <div class="form-check form-switch ms-2">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault23" checked onchange="visible()">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4" id="basic-info">
                        <div class="card-header">
                            <h5>Basic Info</h5>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label">First Name</label>
                                    <div class="input-group">
                                        <input id="firstName" name="firstName" class="form-control" type="text" placeholder="Alec" required="required">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Last Name</label>
                                    <div class="input-group">
                                        <input id="lastName" name="lastName" class="form-control" type="text" placeholder="Thompson" required="required">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-6">
                                    <label class="form-label mt-4">I'm</label>
                                    <select class="form-control" name="choices-gender" id="choices-gender">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="col-sm-5 col-5">
                                            <label class="form-label mt-4">Birth Date</label>
                                            <select class="form-control" name="choices-month" id="choices-month"></select>
                                        </div>
                                        <div class="col-sm-4 col-3">
                                            <label class="form-label mt-4">&nbsp;</label>
                                            <select class="form-control" name="choices-day" id="choices-day"></select>
                                        </div>
                                        <div class="col-sm-3 col-4">
                                            <label class="form-label mt-4">&nbsp;</label>
                                            <select class="form-control" name="choices-year" id="choices-year"></select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label mt-4">Email</label>
                                    <div class="input-group">
                                        <input id="email" name="email" class="form-control" type="email" placeholder="example@email.com">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="form-label mt-4">Confirmation Email</label>
                                    <div class="input-group">
                                        <input id="confirmation" name="confirmation" class="form-control" type="email" placeholder="example@email.com">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label mt-4">Your location</label>
                                    <div class="input-group">
                                        <input id="location" name="location" class="form-control" type="text" placeholder="Sydney, A">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="form-label mt-4">Phone Number</label>
                                    <div class="input-group">
                                        <input id="phone" name="phone" class="form-control" type="number" placeholder="+40 735 631 620">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 align-self-center">
                                    <label class="form-label mt-4">Language</label>
                                    <select class="form-control" name="choices-language" id="choices-language">
                                        <option value="English">English</option>
                                        <option value="French">French</option>
                                        <option value="Spanish">Spanish</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label mt-4">Skills</label>
                                    <input class="form-control" id="choices-skills" type="text" value="vuejs, angular, react" placeholder="Enter something" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4" id="password">
                        <div class="card-header">
                            <h5>Change Password</h5>
                        </div>
                        <div class="card-body pt-0">
                            <label class="form-label">Current password</label>
                            <div class="form-group">
                                <input class="form-control" type="password" placeholder="Current password">
                            </div>
                            <label class="form-label">New password</label>
                            <div class="form-group">
                                <input class="form-control" type="password" placeholder="New password">
                            </div>
                            <label class="form-label">Confirm new password</label>
                            <div class="form-group">
                                <input class="form-control" type="password" placeholder="Confirm password">
                            </div>
                            <h5 class="mt-5">Password requirements</h5>
                            <p class="text-muted mb-2">
                                Please follow this guide for a strong password:
                            </p>
                            <ul class="text-muted ps-4 mb-0 float-start">
                                <li>
                                    <span class="text-sm">One special characters</span>
                                </li>
                                <li>
                                    <span class="text-sm">Min 6 characters</span>
                                </li>
                                <li>
                                    <span class="text-sm">One number (2 are recommended)</span>
                                </li>
                                <li>
                                    <span class="text-sm">Change it often</span>
                                </li>
                            </ul>
                            <button class="btn bg-gradient-dark btn-sm float-end mt-6 mb-0">Update password</button>
                        </div>
                    </div>

                    <div class="card mt-4" id="2fa">
                        <div class="card-header d-flex">
                            <h5 class="mb-0">Two-factor authentification</h5>
                            <span class="badge badge-success ms-auto">Enabled</span>
                        </div>
                        <div class="card-body">
                            <div class="d-flex">
                                <p class="my-auto">Security keys</p>
                                <p class="text-secondary text-sm ms-auto my-auto me-3">No Security Keys</p>
                                <button class="btn btn-sm btn-outline-dark mb-0" type="button">Add</button>
                            </div>
                            <hr class="horizontal dark">
                            <div class="d-flex">
                                <p class="my-auto">SMS number</p>
                                <p class="text-secondary text-sm ms-auto my-auto me-3">+4012374423</p>
                                <button class="btn btn-sm btn-outline-dark mb-0" type="button">Edit</button>
                            </div>
                            <hr class="horizontal dark">
                            <div class="d-flex">
                                <p class="my-auto">Authenticator app</p>
                                <p class="text-secondary text-sm ms-auto my-auto me-3">Not Configured</p>
                                <button class="btn btn-sm btn-outline-dark mb-0" type="button">Set up</button>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4" id="accounts">
                        <div class="card-header">
                            <h5>Accounts</h5>
                            <p class="text-sm">Here you can setup and manage your integration settings.</p>
                        </div>
                        <div class="card-body pt-0">
                            <div class="d-flex">
                                <img class="width-48-px" src="../../assets/img/small-logos/logo-slack.svg" alt="logo_slack">
                                <div class="my-auto ms-3">
                                    <div class="h-100">
                                        <h5 class="mb-0">Slack</h5>
                                        <a class="text-sm text-body" href="javascript:;">Show less <i class="fas fa-chevron-up text-xs ms-1" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <p class="text-sm text-secondary ms-auto me-3 my-auto">Enabled</p>
                                <div class="form-check form-switch my-auto">
                                    <input class="form-check-input" checked type="checkbox" id="flexSwitchCheckDefault1">
                                </div>
                            </div>
                            <div class="ps-5 pt-3 ms-3">
                                <p class="mb-0 text-sm">You haven't added your Slack yet or you aren't authorized. Please add our Slack Bot to your account by clicking on <a href="javascript">here</a>. When you've added the bot, send your verification code that you have received.</p>
                                <div class="d-sm-flex bg-gray-100 border-radius-lg p-2 my-4">
                                    <p class="text-sm font-weight-bold my-auto ps-sm-2">Verification Code</p>
                                    <input class="form-control form-control-sm ms-sm-auto mt-sm-0 mt-2 w-sm-15 w-40" type="text" value="1172913" data-bs-toggle="tooltip" data-bs-placement="top" title="Copy!">
                                </div>
                                <div class="d-sm-flex bg-gray-100 border-radius-lg p-2 my-4">
                                    <p class="text-sm font-weight-bold my-auto ps-sm-2">Connected account</p>
                                    <h6 class="text-sm ms-auto me-3 my-auto"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="6d05080101022d0e1f080c19041b0840190400430e0200">[email&#160;protected]</a></h6>
                                    <button class="btn btn-sm bg-gradient-danger my-sm-auto mt-2 mb-0" type="button" name="button">Delete</button>
                                </div>
                            </div>
                            <hr class="horizontal dark">
                            <div class="d-flex">
                                <img class="width-48-px" src="../../assets/img/small-logos/logo-spotify.svg" alt="logo_spotify">
                                <div class="my-auto ms-3">
                                    <div class="h-100">
                                        <h5 class="mb-0">Spotify</h5>
                                        <p class="mb-0 text-sm">Music</p>
                                    </div>
                                </div>
                                <p class="text-sm text-secondary ms-auto me-3 my-auto">Enabled</p>
                                <div class="form-check form-switch my-auto">
                                    <input class="form-check-input" checked type="checkbox" id="flexSwitchCheckDefault2">
                                </div>
                            </div>
                            <hr class="horizontal dark">
                            <div class="d-flex">
                                <img class="width-48-px" src="../../assets/img/small-logos/logo-atlassian.svg" alt="logo_atlassian">
                                <div class="my-auto ms-3">
                                    <div class="h-100">
                                        <h5 class="mb-0">Atlassian</h5>
                                        <p class="mb-0 text-sm">Payment vendor</p>
                                    </div>
                                </div>
                                <p class="text-sm text-secondary ms-auto me-3 my-auto">Enabled</p>
                                <div class="form-check form-switch my-auto">
                                    <input class="form-check-input" checked type="checkbox" id="flexSwitchCheckDefault3">
                                </div>
                            </div>
                            <hr class="horizontal dark">
                            <div class="d-flex">
                                <img class="width-48-px" src="../../assets/img/small-logos/logo-asana.svg" alt="logo_asana">
                                <div class="my-auto ms-3">
                                    <div class="h-100">
                                        <h5 class="mb-0">Asana</h5>
                                        <p class="mb-0 text-sm">Organize your team</p>
                                    </div>
                                </div>
                                <div class="form-check form-switch ms-auto my-auto">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault4">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4" id="notifications">
                        <div class="card-header">
                            <h5>Notifications</h5>
                            <p class="text-sm">Choose how you receive notifications. These notification settings apply to the things you’re watching.</p>
                        </div>
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th class="ps-1" colspan="4">
                                                <p class="mb-0">Activity</p>
                                            </th>
                                            <th class="text-center">
                                                <p class="mb-0">Email</p>
                                            </th>
                                            <th class="text-center">
                                                <p class="mb-0">Push</p>
                                            </th>
                                            <th class="text-center">
                                                <p class="mb-0">SMS</p>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="ps-1" colspan="4">
                                                <div class="my-auto">
                                                    <span class="text-dark d-block text-sm">Mentions</span>
                                                    <span class="text-xs font-weight-normal">Notify when another user mentions you in a comment</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                                    <input class="form-check-input" checked type="checkbox" id="flexSwitchCheckDefault11">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault12">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault13">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="ps-1" colspan="4">
                                                <div class="my-auto">
                                                    <span class="text-dark d-block text-sm">Comments</span>
                                                    <span class="text-xs font-weight-normal">Notify when another user comments your item.</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                                    <input class="form-check-input" checked type="checkbox" id="flexSwitchCheckDefault14">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                                    <input class="form-check-input" checked type="checkbox" id="flexSwitchCheckDefault15">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault16">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="ps-1" colspan="4">
                                                <div class="my-auto">
                                                    <span class="text-dark d-block text-sm">Follows</span>
                                                    <span class="text-xs font-weight-normal">Notify when another user follows you.</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault17">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                                    <input class="form-check-input" checked type="checkbox" id="flexSwitchCheckDefault18">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault19">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="ps-1" colspan="4">
                                                <div class="my-auto">
                                                    <p class="text-sm mb-0">Log in from a new device</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                                    <input class="form-check-input" checked type="checkbox" id="flexSwitchCheckDefault20">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                                    <input class="form-check-input" checked type="checkbox" id="flexSwitchCheckDefault21">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                                    <input class="form-check-input" checked type="checkbox" id="flexSwitchCheckDefault22">
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4" id="sessions">
                        <div class="card-header pb-3">
                            <h5>Sessions</h5>
                            <p class="text-sm">This is a list of devices that have logged into your account. Remove those that you do not recognize.</p>
                        </div>
                        <div class="card-body pt-0">
                            <div class="d-flex align-items-center">
                                <div class="text-center w-5">
                                    <i class="fas fa-desktop text-lg opacity-6"></i>
                                </div>
                                <div class="my-auto ms-3">
                                    <div class="h-100">
                                        <p class="text-sm mb-1">
                                            Bucharest 68.133.163.201
                                        </p>
                                        <p class="mb-0 text-xs">
                                            Your current session
                                        </p>
                                    </div>
                                </div>
                                <span class="badge badge-success badge-sm my-auto ms-auto me-3">Active</span>
                                <p class="text-secondary text-sm my-auto me-3">EU</p>
                                <a href="javascript:;" class="text-primary text-sm icon-move-right my-auto">See more
                                    <i class="fas fa-arrow-right text-xs ms-1" aria-hidden="true"></i>
                                </a>
                            </div>
                            <hr class="horizontal dark">
                            <div class="d-flex align-items-center">
                                <div class="text-center w-5">
                                    <i class="fas fa-desktop text-lg opacity-6"></i>
                                </div>
                                <p class="my-auto ms-3">Chrome on macOS</p>
                                <p class="text-secondary text-sm ms-auto my-auto me-3">US</p>
                                <a href="javascript:;" class="text-primary text-sm icon-move-right my-auto">See more
                                    <i class="fas fa-arrow-right text-xs ms-1" aria-hidden="true"></i>
                                </a>
                            </div>
                            <hr class="horizontal dark">
                            <div class="d-flex align-items-center">
                                <div class="text-center w-5">
                                    <i class="fas fa-mobile text-lg opacity-6"></i>
                                </div>
                                <p class="my-auto ms-3">Safari on iPhone</p>
                                <p class="text-secondary text-sm ms-auto my-auto me-3">US</p>
                                <a href="javascript:;" class="text-primary text-sm icon-move-right my-auto">See more
                                    <i class="fas fa-arrow-right text-xs ms-1" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4" id="delete">
                        <div class="card-header">
                            <h5>Delete Account</h5>
                            <p class="text-sm mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                        </div>
                        <div class="card-body d-sm-flex pt-0">
                            <div class="d-flex align-items-center mb-sm-0 mb-4">
                                <div>
                                    <div class="form-check form-switch mb-0">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault0">
                                    </div>
                                </div>
                                <div class="ms-2">
                                    <span class="text-dark font-weight-bold d-block text-sm">Confirm</span>
                                    <span class="text-xs d-block">I want to delete my account.</span>
                                </div>
                            </div>
                            <button class="btn btn-outline-secondary mb-0 ms-auto" type="button" name="button">Deactivate</button>
                            <button class="btn bg-gradient-danger mb-0 ms-2" type="button" name="button">Delete Account</button>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer pt-3  ">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="copyright text-center text-sm text-muted text-lg-start">
                                © <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>,
                                made with <i class="fa fa-heart"></i> by
                                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                                for a better web.
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </main>
    <div class="fixed-plugin">
        <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
            <i class="fa fa-cog py-2"> </i>
        </a>
        <div class="card shadow-lg">
            <div class="card-header pb-0 pt-3 bg-transparent ">
                <div class="float-start">
                    <h5 class="mt-3 mb-0">Argon Configurator</h5>
                    <p>See our dashboard options.</p>
                </div>
                <div class="float-end mt-4">
                    <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                        <i class="fa fa-close"></i>
                    </button>
                </div>

            </div>
            <hr class="horizontal dark my-1">
            <div class="card-body pt-sm-3 pt-0 overflow-auto">

                <div>
                    <h6 class="mb-0">Sidebar Colors</h6>
                </div>
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors my-2 text-start">
                        <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
                    </div>
                </a>

                <div class="mt-3">
                    <h6 class="mb-0">Sidenav Type</h6>
                    <p class="text-sm">Choose between 2 different sidenav types.</p>
                </div>
                <div class="d-flex">
                    <button class="btn bg-gradient-primary w-100 px-3 mb-2 active me-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
                    <button class="btn bg-gradient-primary w-100 px-3 mb-2" data-class="bg-default" onclick="sidebarType(this)">Dark</button>
                </div>
                <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>

                <div class="d-flex my-3">
                    <h6 class="mb-0">Navbar Fixed</h6>
                    <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
                    </div>
                </div>
                <hr class="horizontal dark mb-1">
                <div class="d-flex my-4">
                    <h6 class="mb-0">Sidenav Mini</h6>
                    <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarMinimize" onclick="navbarMinimize(this)">
                    </div>
                </div>
                <hr class="horizontal dark my-sm-4">
                <div class="mt-2 mb-5 d-flex">
                    <h6 class="mb-0">Light / Dark</h6>
                    <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
                    </div>
                </div>
                <a class="btn btn-primary w-100" href="https://www.creative-tim.com/product/argon-dashboard-pro">Buy now</a>
                <a class="btn btn-dark w-100" href="https://www.creative-tim.com/product/argon-dashboard">Free demo</a>
                <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/overview/argon-dashboard">View documentation</a>
                <div class="w-100 text-center">
                    <a class="github-button" href="https://github.com/creativetimofficial/ct-argon-dashboard-pro" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/argon-dashboard on GitHub">Star</a>
                    <h6 class="mt-3">Thank you for sharing!</h6>
                    <a href="https://twitter.com/intent/tweet?text=Check%20Argon%20Dashboard%20PRO%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fargon-dashboard-pro" class="btn btn-dark mb-0 me-2" target="_blank">
                        <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/argon-dashboard-pro" class="btn btn-dark mb-0 me-2" target="_blank">
                        <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="../../assets/js/core/popper.min.js"></script>
    <script src="../../assets/js/core/bootstrap.min.js"></script>
    <script src="../../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="../../assets/js/plugins/choices.min.js"></script>

    <script src="../../assets/js/plugins/dragula/dragula.min.js"></script>
    <script src="../../assets/js/plugins/jkanban/jkanban.js"></script>
    <script>
        if (document.getElementById('choices-gender')) {
            var gender = document.getElementById('choices-gender');
            const example = new Choices(gender);
        }

        if (document.getElementById('choices-language')) {
            var language = document.getElementById('choices-language');
            const example = new Choices(language);
        }

        if (document.getElementById('choices-skills')) {
            var skills = document.getElementById('choices-skills');
            const example = new Choices(skills, {
                delimiter: ',',
                editItems: true,
                maxItemCount: 5,
                removeItemButton: true,
                addItems: true
            });
        }

        if (document.getElementById('choices-year')) {
            var year = document.getElementById('choices-year');
            setTimeout(function() {
                const example = new Choices(year);
            }, 1);

            for (y = 1900; y <= 2020; y++) {
                var optn = document.createElement("OPTION");
                optn.text = y;
                optn.value = y;

                if (y == 2020) {
                    optn.selected = true;
                }

                year.options.add(optn);
            }
        }

        if (document.getElementById('choices-day')) {
            var day = document.getElementById('choices-day');
            setTimeout(function() {
                const example = new Choices(day);
            }, 1);


            for (y = 1; y <= 31; y++) {
                var optn = document.createElement("OPTION");
                optn.text = y;
                optn.value = y;

                if (y == 1) {
                    optn.selected = true;
                }

                day.options.add(optn);
            }

        }

        if (document.getElementById('choices-month')) {
            var month = document.getElementById('choices-month');
            setTimeout(function() {
                const example = new Choices(month);
            }, 1);

            var d = new Date();
            var monthArray = new Array();
            monthArray[0] = "January";
            monthArray[1] = "February";
            monthArray[2] = "March";
            monthArray[3] = "April";
            monthArray[4] = "May";
            monthArray[5] = "June";
            monthArray[6] = "July";
            monthArray[7] = "August";
            monthArray[8] = "September";
            monthArray[9] = "October";
            monthArray[10] = "November";
            monthArray[11] = "December";
            for (m = 0; m <= 11; m++) {
                var optn = document.createElement("OPTION");
                optn.text = monthArray[m];
                // server side month start from one
                optn.value = (m + 1);
                // if june selected
                if (m == 1) {
                    optn.selected = true;
                }
                month.options.add(optn);
            }
        }

        function visible() {
            var elem = document.getElementById('profileVisibility');
            if (elem) {
                if (elem.innerHTML == "Switch to visible") {
                    elem.innerHTML = "Switch to invisible"
                } else {
                    elem.innerHTML = "Switch to visible"
                }
            }
        }

        var openFile = function(event) {
            var input = event.target;

            // Instantiate FileReader
            var reader = new FileReader();
            reader.onload = function() {
                imageFile = reader.result;

                document.getElementById("imageChange").innerHTML = '<img width="200" src="' + imageFile + '" class="rounded-circle w-100 shadow" />';
            };
            reader.readAsDataURL(input.files[0]);
        };
    </script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>

    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script src="../../assets/js/argon-dashboard.min.js?v=2.0.5"></script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v52afc6f149f6479b8c77fa569edb01181681764108816" integrity="sha512-jGCTpDpBAYDGNYR5ztKt4BQPGef1P0giN6ZGVUi835kFF88FOmmn8jBQWNgrNd8g/Yu421NdgWhwQoaOPFflDw==" data-cf-beacon='{"rayId":"7bad19ceeff7492d","version":"2023.3.0","r":1,"token":"1b7cbb72744b40c580f8633c6b62637e","si":100}' crossorigin="anonymous"></script>
</body>

</html>