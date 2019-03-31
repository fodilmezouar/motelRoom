<!DOCTYPE html>

<html class="app-ui">

<head>
    <!-- Meta -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Document title -->
    <title>Pages &ndash; Blank | AppUI</title>

    <meta name="description" content="AppUI - Admin Dashboard Template & UI Framework" />
    <meta name="author" content="rustheme" />
    <meta name="robots" content="noindex, nofollow" />
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{asset('img/favicons/apple-touch-icon.png')}}" />
    <link rel="icon" href="{{asset('img/favicons/favicon.ico')}}" />

    <!-- Google fonts -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,900%7CRoboto+Slab:300,400%7CRoboto+Mono:400" />
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{asset('js/plugins/datatables/jquery.dataTables.min.css')}}" />
    <!-- AppUI CSS stylesheets -->
    <link rel="stylesheet" id="css-font-awesome" href="{{asset('css/font-awesome.css')}}" />
    <link rel="stylesheet" id="css-ionicons" href="{{asset('css/ionicons.css')}}" />
    <link rel="stylesheet" id="css-bootstrap" href="{{asset('css/bootstrap.css')}}" />
    <link rel="stylesheet" id="css-app" href="{{asset('css/app.css')}}" />
    <link rel="stylesheet" id="css-app-custom" href="{{asset('css/app-custom.css')}}" />
    <!-- End Stylesheets -->
</head>
<body>
    <style>
        td{
            font-size: 12px;

        }
        table td:nth-child(2){
            font: oblique bold 12px "Apple Braille", sans-serif;
        }
        @media print {
            @page { margin: 0; }
        }
    </style>
    <div class="card" id="card" data-show-print="true">

        <button class="btn btn-app hidden-print center-block mx-md-0" type="button" onclick="window.print();"><i class="ion-printer m-r-xs"></i> Print Invoice</button>

        <div class="card-header" style="border: 1px solid">
            <div id="logo" class="drawer">
                <img class="img-responsive" src="{{asset($parametre->logo)}}" width="100px"  />
            </div>
            <div class="h3 text-uppercase text-center">{{ strtoupper($parametre->nom) }}</div>
            <address class="pull-right">
                {{$parametre->adresse}}<br>
                <i class="ion-ios-telephone-outline"></i>{{$parametre->numtel}}
            </address>
        </div>
        <div class="card-block  pull-right">

        </div>
        <div class="card-block pull-center">
            <!-- Invoice Info -->
            <div class="h5 text-uppercase text-center text-blue">FICHE VOYAGEUR</div>
            <div class="h6 text-uppercase text-center text-danger">Chambre: N°{{$chambre->etage}}{{$chambre->numero}}</div>
            <!-- End Client Info -->
            </div>
    @foreach($responsable as $res)
        <!-- End Invoice Info -->
        <div class="container card-block">
            <div class="row" >
                <div class="col-sm-6">
                    <div class="table-responsive container text-sm-center" style="border: 1px solid">
                        <table class="table table-condensed table-borderless" data-toggle="table" data-show-print="true" width="50%"
                               data-url="/gh/get/response.json/wenzhixin/bootstrap-table/tree/master/docs/data/data1/">

                            <tr>
                                <td>Nom</td><td>{{$res->nom}}</td><td>:الاسم</td>
                            </tr>
                            <tr>
                                <td>Prénom</td><td>{{$res->prenom}}</td><td>:اللقب</td>
                            </tr>
                            <tr>
                                <td>Fils de</td><td>{{$res->pere}}</td><td>:ابن</td>
                            </tr>
                            <tr>
                                <td>et de</td><td>{{$res->mere}}</td><td>:وابن</td>
                            </tr>
                            <tr>
                                <td>Date de Naissance</td><td>{{$res->naissance}}</td><td>:تاريخ الازدياد</td>
                            </tr>
                            <tr>
                                <td>Lieu de Naissance</td><td>{{$res->lieu}}</td><td>مكان الازدياد</td>
                            </tr>
                            <tr>
                                <td>Profession</td><td>{{$res->job}}</td><td>:المهنة</td>
                            </tr>
                            <tr>
                                <td>adresse</td><td>{{$res->adresse}}</td><td>:العنوان</td>
                            </tr>
                            <tr>
                                <td>Nationalité</td><td class="border-success">{{$res->nationalite}}</td><td>:الجنسية</td>
                            </tr>
                        </table>
                    </div>
                </div>
            <div class="col-sm-6">
            <div class="h4 text-uppercase text-center text-blue">بطاقة التعريف المقدمة</div>
            <div class="h4 text-uppercase text-center text-blue">Piece d'identité </div>
            <div class="table-responsive container text-sm-center" style="border: 1px solid">
                <?php

                    $dateRese = date('Y-m-d', strtotime($reservation->date_reservation));
                    $TimeRese = date('H:i:s', strtotime($reservation->created_at));
                    $dateSortie = date('Y-m-d', strtotime($reservation->date_liberation));
                    $earlier = new DateTime($dateRese);
                    $later = new DateTime($dateSortie);
                    $diff = $later->diff($earlier)->format("%a");
                    $type="";
                if ($res->typePiece == 1)
                    $type="carte";
                elseif ($res->typePiece == 2)
                    $type="permis";
                elseif ($res->typePiece == 3)
                    $type="Passport";

                ?>
                <table  class="table table-condensed table-borderless" data-toggle="table" data-show-print="true" width="50%"
                        data-url="/gh/get/response.json/wenzhixin/bootstrap-table/tree/master/docs/data/data1/" >
                    <tr>
                        <td>Nature</td><td>{{$type}}</td><td>:النوع</td>
                    </tr>
                    <tr>
                        <td>N°</td><td>{{$res->numPiece}}</td><td>:الرقم</td>
                    </tr>
                    <tr>
                        <td>Fait(e) le</td><td>{{$res->datePiece}}</td><td>:صادرة بالتاريخ</td>
                    </tr>
                    <tr>
                        <td>A</td><td>{{$res->lieu}}</td><td>: ب</td>
                    </tr>
                    <tr>
                        <td>Arrivée</td><td>{{$dateRese}} a {{$TimeRese}}</td><td>:الوصول</td>
                    </tr>
                    <tr>
                        <td>Durée du séjour</td><td>{{$diff}}</td><td>: مدة الاقامة</td>
                    </tr>
                    <tr>
                        <td>Marsa Ben M'hidi le</td><td>{{date('Y-M-d')}}</td><td>:مرسي بن مهيدي</td>
                    </tr>
                </table>
            </div>
            </div>
        </div>

            <hr class="hidden-print">
            <div class="h7  text-sm-center text-danger">Nombre d'enfants de moins de 15 ans : <strong>3</strong></div>

    </div>

                <div class="card-block pull-right">الامضاء</div>
                <div class="card-block pull-left">signature</div>
        </div>
    @endforeach


</body>