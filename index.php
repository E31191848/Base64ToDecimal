<?php
include_once('./Base62.php');
$base62 = new Base62();
isset($_POST['decimal']) ? $char = preg_replace('/[^0-9\-\+\/\*]/', '', $_POST['decimal']) :  $char = '';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Vian Azis">
    <meta name="generator" content="Base62 Tool">
    <title>Base62</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/cover/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <style>
        a,
        a:focus,
        a:hover {
            color: #fff;
        }

        .btn-secondary,
        .btn-secondary:hover,
        .btn-secondary:focus {
            color: #333;
            text-shadow: none;
            background-color: #fff;
            border: .05rem solid #fff;
        }

        html,
        body {
            height: 100%;
            background-color: #333;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            color: #fff;
            text-shadow: 0 .05rem .1rem rgba(0, 0, 0, .5);
        }

        .cover-container {
            max-width: 42em;
        }

        .masthead {
            margin-bottom: 2rem;
        }

        .masthead-brand {
            margin-bottom: 0;
        }

        .nav-masthead .nav-link {
            padding: .25rem 0;
            font-weight: 700;
            color: rgba(255, 255, 255, .5);
            background-color: transparent;
            border-bottom: .25rem solid transparent;
        }

        .nav-masthead .nav-link:hover,
        .nav-masthead .nav-link:focus {
            border-bottom-color: rgba(255, 255, 255, .25);
        }

        .nav-masthead .nav-link+.nav-link {
            margin-left: 1rem;
        }

        .nav-masthead .active {
            color: #fff;
            border-bottom-color: #fff;
        }

        @media (min-width: 48em) {
            .masthead-brand {
                float: left;
            }

            .nav-masthead {
                float: right;
            }
        }

        .cover {
            padding: 0 1.5rem;
        }

        .cover .btn-lg {
            padding: .75rem 1.25rem;
            font-weight: 700;
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .rounded {
            border-radius: 10px !important;
        }

        .bg-my {
            background-color: #fff !important;
            color: #333;
        }

        .font-larger {
            font-size: 1.5rem;
            font-weight: 600;
        }
    </style>
</head>

<body class="text-center">
    <div class="container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="masthead d-flex w-100 p-3 mx-auto flex-column">
            <div class="inner">
                <h3 class="masthead-brand">Base62 Tools</h3>
                <nav class="nav nav-masthead justify-content-center">
                    <a class="nav-link active" style="cursor: pointer;">Desimal - Base62</a>
                    <a class="nav-link" href="./index2.php">Base62 - Desimal</a>
                </nav>
            </div>
        </header>

        <main role="main" class="inner cover my-auto py-5">
            <div class="row">
                <div class="col-12 col-md-6">
                    <form action="" method="post" id="encode">
                        <h1 class="cover-heading">Input Desimal</h1>
                        <textarea autofocus cols="30" rows="5" type="text" name="decimal" id="decimal" class="d-flex border border-light rounded w-100 px-3 py-1 bg-my font-larger"><?= $char; ?></textarea>
                        <p class="lead mt-3">
                        <div class="row my-3">
                            <div class="col-3">
                                <button type="button" id="tambah" class="btn btn-block btn-lg btn-secondary rounded pt-0 pb-1">+</button>
                            </div>
                            <div class="col-3">
                                <button type="button" id="kurang" class="btn btn-block btn-lg btn-secondary rounded pt-0 pb-1">-</button>
                            </div>
                            <div class="col-3">
                                <button type="button" id="kali" class="btn btn-block btn-lg btn-secondary rounded pt-0 pb-1">x</button>
                            </div>
                            <div class="col-3">
                                <button type="button" id="bagi" class="btn btn-block btn-lg btn-secondary rounded pt-0 pb-1">:</button>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-lg btn-secondary btn-block py-1 rounded d-none">Convert</button>
                        <button type="button" id="clean" class="btn btn-lg btn-secondary btn-block pt-0 pb-1 rounded">Clean</button>
                        </p>
                    </form>
                </div>
                <div class="col-12 col-md-6">
                    <h1 class="cover-heading">Output Base62</h1>
                    <textarea disabled cols="30" rows="5" type="text" name="base62" id="base62" class="d-flex border border-light rounded w-100 px-3 py-1 bg-my font-larger"><?= $base62->encodeBase62($char); ?></textarea>
                    <button type="button" id="copy" class="btn btn-lg btn-secondary btn-block pt-0 pb-1 rounded mt-3">Copy</button>
                </div>
            </div>
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script>
        $("#clean").click(function() {
            $("#decimal").val('').focus();
            $("#base62").html('').show();
        });
        $("#copy").click(function() {
            var container = document.createElement("textarea");
            document.body.appendChild(container);
            container.value = $("#base62").val(); //save main text in it
            container.select(); //select textarea contenrs
            document.execCommand("copy");
            document.body.removeChild(container);
        });
        $("#tambah").click(function() {
            var a = $("#decimal").val();
            $("#decimal").val(a + '+').focus();
        });
        $("#kurang").click(function() {
            var a = $("#decimal").val();
            $("#decimal").val(a + '-').focus();
        });
        $("#kali").click(function() {
            var a = $("#decimal").val();
            $("#decimal").val(a + '*').focus();
        });
        $("#bagi").click(function() {
            var a = $("#decimal").val();
            $("#decimal").val(a + '/').focus();
        });
        $("#decimal").keyup(function() {
            var replace = $("#decimal").val().replace(/[^0-9\-\+\/\*]/, "");
            $("#decimal").val(replace);
            $.ajax({
                type: 'POST',
                url: './api/encode.php',
                data: $('#encode').serialize(),
                success: function(data) {
                    $('#base62').html(data).show();
                }
            });
        });
    </script>
</body>

</html>