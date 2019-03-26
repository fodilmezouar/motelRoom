@extends('layouts.master')
@section('content')
    <style>
        td{
            font-size: 12px;

        }
    </style>
    <button class="btn btn-app-blue hidden-print" type="button" onclick="window.print();"><i class="ion-printer m-r-xs"></i> Print Invoice</button>
    <div class="card">
        <div class="card-header">
            <div class="h2 text-uppercase text-center">Hotel SAIM</div>
        </div>
        <div class="pull-right">
            <address>
                Address<br>
                <i class="ion-ios-telephone-outline"></i> (000) 000-0000
            </address>
        </div>
        <div class="card-block pull-left">
            <!-- Invoice Info -->
            <div class="h5 text-uppercase text-center text-blue">FICHE VOYAGEUR</div>
            <div class="h6 text-uppercase text-center text-danger">Chambre: N01</div>
            <!-- End Client Info -->
            </div>
    @foreach($responsable as $res)
        <!-- End Invoice Info -->
        <div class="container">
        <div class="table-responsive container text-sm-center">
            <table class="table table-condensed table-borderless">

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
            <hr class="hidden-print">
            <div class="h7  text-sm-center text-danger">Nombre d'enfants de moins de 15 ans : <strong>3</strong></div>
            <div class="h4 text-uppercase text-center text-blue">بطاقة التعريف المقدمة</div>
            <div class="h4 text-uppercase text-center text-blue">Piece d'identité </div>
            <div class="table-responsive container text-sm-center">
                <?php
                    $type="";
                if ($res->typePiece == 1)
                    $type="carte";
                elseif ($res->typePiece == 2)
                    $type="permis";
                elseif ($res->typePiece == 3)
                    $type="Passport";

                ?>
                <table class="table table-condensed table-borderless">
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
                        <td>Arrivée</td><td>{{$reservation->date_reservation}}</td><td>:صادرة بالتاريخ</td>
                    </tr>
                    <tr>
                        <td>Durée du séjour</td><td>{{$reservation->date_liberation}}</td><td>: مدة الاقامة</td>
                    </tr>
                    <tr>
                        <td>Marsa Ben M'hidi le</td><td></td><td>:مرسي بن مهيدي</td>
                    </tr>

                </table>
            </div>
        </div>
    @endforeach



    <!-- Footer -->
            <!-- End Footer -->
        </div>
    </div>
@endsection
@section('scripts')
    <!-- Page JS Plugins -->
    <script src="{{asset('js/print.min.js')}}"></script>
@endsection