<!DOCTYPE html>

<html lang="pl">
    <head>
        <title>Różaniec</title>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
        <link rel="stylesheet" href="css/style.css" type="text/css"/>
        <link rel="stylesheet" href="css/modal.css" type="text/css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="js/global.js"></script>
        <script src="js/stopwatch.js"></script>
        <script src="js/counter.js"></script>
    </head>
    <body onload="pokaz_modlitwy('Wstep')">
        <div class="container main_field">
            <div class="navbar mt-2 navbar-expand-lg navbar-light" style="text-align:center;">
                <button class="navbar-toggler btn text-dark" type="button"  data-toggle="collapse" data-target="#menu">
                    <span class="navbar-toggler-icon"></span>
                </button>       
                <div class="collapse navbar-collapse" id="menu">
                    <ul class="navbar-nav ml-auto mr-auto text-center">
                        <li class="nav-item"><a class="nav-link text-secondary" href="#" onclick="pokaz_modlitwy('Wstep')">Wstęp</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-secondary" data-toggle="dropdown" href="#">Radosne</a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-item"><a class="dropdown-link" href="#" onclick="station(1, 'Radosna')">Zwiastowanie Najświętszej Maryi Pannie</a></li>
                                <li class="dropdown-item"><a class="dropdown-link" href="#" onclick="station(2, 'Radosna')">Nawiedzenie świętej Elżbiety</a></li>
                                <li class="dropdown-item"><a class="dropdown-link" href="#" onclick="station(3, 'Radosna')">Narodzenie Pana Jezusa</a></li>
                                <li class="dropdown-item"><a class="dropdown-link" href="#" onclick="station(4, 'Radosna')">Ofiarowanie Jezusa w Świątyni</a></li>
                                <li class="dropdown-item"><a class="dropdown-link" href="#" onclick="station(5, 'Radosna')">Odnalezienie Jezusa w Świątyni</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-secondary" data-toggle="dropdown" href="#">Światła</a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-item"><a class="dropdown-link" href="#" onclick="station(1, 'Światła')">Chrzest Pana Jezusa w Jordanie</a></li>
                                <li class="dropdown-item"><a class="dropdown-link" href="#" onclick="station(2, 'Światła')">Objawienie się Jezusa w Kanie Galilejskiej</a></li>
                                <li class="dropdown-item"><a class="dropdown-link" href="#" onclick="station(3, 'Światła')">Głoszenie królestwa Bożego i wzywanie do nawrócenia</a></li>
                                <li class="dropdown-item"><a class="dropdown-link" href="#" onclick="station(4, 'Światła')">Przemienienie Pańskie na górze Tabor</a></li>
                                <li class="dropdown-item"><a class="dropdown-link" href="#" onclick="station(5, 'Światła')">Ustanowienie Eucharystii</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-secondary" data-toggle="dropdown" href="#">Bolesne</a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-item"><a class="dropdown-link" href="#" onclick="station(1, 'Bolesne')">Modlitwa Jezusa w Ogrójcu</a></li>
                                <li class="dropdown-item"><a class="dropdown-link" href="#" onclick="station(2, 'Bolesne')">Biczowanie Jezusa</a></li>
                                <li class="dropdown-item"><a class="dropdown-link" href="#" onclick="station(3, 'Bolesne')">Cierniem ukoronowanie Jezusa</a></li>
                                <li class="dropdown-item"><a class="dropdown-link" href="#" onclick="station(4, 'Bolesne')">Dźwiganie krzyża na Kalwarię</a></li>
                                <li class="dropdown-item"><a class="dropdown-link" href="#" onclick="station(5, 'Bolesne')">Ukrzyżowanie i śmierć Jezusa</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-secondary" data-toggle="dropdown" href="#">Chwalebne </a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-item"><a class="dropdown-link" href="#" onclick="station(1, 'Chwalebne')">Zmartwychwstanie Jezusa Chrystusa</a></li>
                                <li class="dropdown-item"><a class="dropdown-link" href="#" onclick="station(2, 'Chwalebne')">Wniebowstąpienie Pana Jezusa</a></li>
                                <li class="dropdown-item"><a class="dropdown-link" href="#" onclick="station(3, 'Chwalebne')">Zesłanie Ducha Świętego</a></li>
                                <li class="dropdown-item"><a class="dropdown-link" href="#" onclick="station(4, 'Chwalebne')">Wniebowzięcie Najświętszej Maryi Panny</a></li>
                                <li class="dropdown-item"><a class="dropdown-link" href="#" onclick="station(5, 'Chwalebne')">Ukoronowanie Maryi na Królową nieba i ziemi</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link text-secondary" href="#" onclick="pokaz_modlitwy('Zakonczenie')">Zakończenie</a></li>
                        </li>
                    </ul>
                </div>
                <div id="myModal" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>Dostępne stacje do wyboru:</h2>
                        <span class="close">&times;</span>
                    </div>
                    <div class="modal-body">
                    </div>
                </div>

                </div>
                <div class="row">
                    <input class="form-control mr-sm-2 col-md-12 col-lg-7" type="text" id="stacja" placeholder="Szukaj">
                    <button class="btn btn-success col-md-12 col-lg-4" type="submit" id="sub" onclick="szukaj_stacji()">Search</button>
                </div>
            </div>
            <div style="border-bottom: 1px solid grey;"></div>
            <div class="row">
                <div class="col-md-6 col-sm-12 timer_container">
                    <div id="clock">00:00:00</div>
                </div>
                <div class="col-md-6 col-sm-12 button_container">
                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                            <button class="btn btn-success timer_management" id="start_button">Start</button>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <button class="btn btn-danger timer_management" id="pause_button">Pause</button>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <button class="btn btn-warning timer_management" id="stop_button">Stop</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="main_content">
                
            </div>

            <div id="accordion">
                
            </div>
        </div>
    </body>
</html>