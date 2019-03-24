@extends('layouts.master')

@section('content')
    <!-- End Page Content -->
    <div class="card js-wizard-simple">
        <!-- Step Tabs -->
        <ul class="nav nav-tabs nav-justified">
            <li class="active">
                <a href="#simple-classic-progress-step1" data-toggle="tab">1. Chambres</a>
            </li>
            <li>
                <a href="#simple-classic-progress-step2" data-toggle="tab">2. Infos Clients</a>
            </li>
            <li>
                <a href="#simple-classic-progress-step3" data-toggle="tab">3. Réserver</a>
            </li>
        </ul>
        <!-- End Step Tabs -->

        <!-- Form -->
            <!-- Steps Progress -->
            <div class="card-block b-b">
                <div class="wizard-progress progress progress-mini m-b-0">
                    <div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 0"></div>
                </div>
            </div>
            <!-- End Steps Progress -->

            <!-- Steps Content -->
            <div class="card-block tab-content">
                <!-- Step 2 -->
                <div class="tab-pane fade fade-up in m-t-md m-b-lg active" id="simple-classic-progress-step1">
                    <div class="b-b m-b-md">
                        <h2>Chambres</h2>
                        <div class="col-sm-offset-1 col-sm-10">
                            <br>
                            <!-- Message List -->
                            <div class="card">
                                <div class="card-header">
                                    <div class="h4">Chambres</div>
                                    <ul class="card-actions">
                                        <li>
                                            <button class="js-tooltip" title="Previous 15 Messages" type="button" data-toggle="card-action"><i class="ion-ios-arrow-left"></i></button>
                                        </li>
                                        <li>
                                            <button class="js-tooltip" title="Next 15 Messages" type="button" data-toggle="card-action"><i class="ion-ios-arrow-right"></i></button>
                                        </li>
                                        <li>
                                            <button type="button" data-toggle="card-action" data-action="refresh_toggle" data-action-mode="demo"><i class="ion-refresh"></i></button>
                                        </li>
                                        <li>
                                            <button type="button" data-toggle="card-action" data-action="fullscreen_toggle"></button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-block">
                                    <div class="pull-r-l">
                                        <table id="chambresTable" class="js-table-checkable table table-hover table-vcenter m-b-0">
                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th>Etage</th>
                                                <th>Numero</th>
                                                <th>Prix</th>
                                                <th>Etat</th>
                                            </tr>
                                            </thead>
                                            <tbody>
            @foreach($rooms as $room)

            <tr id="{{$room->id}}" class="rooms">
                 <td class="text-center">
                            <label class="css-input css-checkbox css-checkbox-default">
                                <input type="checkbox" class="cocherChambre"><span></span>
                            </label>
                 </td>
                 <td class="hidden-xs font-500">
                     @if(!$room->etage)
                        Rez De Chaussé
                     @else
                        {{$room->etage}}
                     @endif
                 </td>  
                 <td class="hidden-xs font-500">{{$room->numero}}</td>
                 <td class="hidden-xs font-500 prixRoom">{{$room->prix}}</td>
                 @if($room->state)
                    <td class="hidden-xs font-500">Occupée</td> 
                 @else
                    <td class="hidden-xs font-500">Libre</td>
                 @endif 
             </tr> 
            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- End Messages -->
                                </div>
                                <!-- .card-block -->
                            </div>
                            <!-- .card -->
                            <!-- End Message List -->
                        </div>
                        <!-- .col-sm-7 -->
                    </div>
                </div>
                <!-- End Step 2 -->
                <!-- Step 1 -->
                <div class="tab-pane fade fade-up m-t-md m-b-lg" id="simple-classic-progress-step2">
                    <div class="b-b m-b-md">
                        <h2>Informations Client</h2>
                    </div>
                    <div class="row">
                        <!-- .col-md-6 -->
                          
                        <div class="col-md-offset-1 col-md-10">
                            <!-- Floating Labels -->
                            <div class="card">

                                <div class="card-header">
                                   <h4 align="right"><button align="right" class="btn btn-primary" data-toggle="modal" data-target="#modalClients"><i class="fa fa-plus-circle "></i> Ajouter</button></h4>
                                </div>

                                <div class="card-block">
                                    <table class="table table-bordered table-striped table-vcenter" id="clients">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Prenom</th>
                                            <th>Naissance</th>
                                            <th>Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="contentClients">
                                        <tr align="center" id="vide"><td colspan="5" id="hih">Table Vide</td></tr>
                                    </tbody>
                                </table>
                                </div>
                                <!-- .card-block -->
                            </div>
                            <!-- .card -->
                            <!-- End Floating Labels -->
                        </div>
                        <!-- .col-md-6 -->
                    </div>
                    <!-- End Classic -->

                </div>
                <!-- End Step 1 -->

                <!-- Step 3 -->
                <div class="tab-pane fade fade-up m-t-md m-b-lg" id="simple-classic-progress-step3">
                    <div class="b-b m-b-md">
                        <h2>Réserver</h2>
                    </div>
                    <div class="row">
                        <!-- .col-md-6 -->

                        <div class="col-md-offset-3 col-md-6">
                            <!-- Floating Labels -->
                            <div class="card">
                                <div class="card-header">
                                    <h4>Date D'arrivée - Date de Sortie</h4>
                                    <ul class="card-actions">
                                        <li>
                                            <button type="button"><i class="ion-more"></i></button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-block">
                                    <form class="form-horizontal m-t-sm" action="base_forms_elements_modern.html" method="post" onsubmit="return false;">
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-7">
                                                <input class="form-control" id="duree" type="text" id="sejour" name="example-nf-email" placeholder="Entrez La durée" onchange="calcDuree()">
                                            </div>
                                            </div>
                                        <div class="input-daterange input-group" data-date-format="mm/dd/yyyy">
                                            <input class="form-control" type="text" id="arr" name="example-daterange1" placeholder="Date D'arrivée" onchange="calculTotal();calcDuree()">
                                            <span class="input-group-addon"><i class="ion-chevron-right"></i></span>
                                            <input class="form-control" type="text" id="sor" name="example-daterange2" placeholder="Date De Sortie" onchange="calculTotal()">
                                        </div>
                                    </form>
                                    <br>
                                    <div class="card-header" align="right">
                                    <h4>Total : <span id="prixTotal">0</span> <button class="btn btn-xs btn-default" type="button" data-toggle="modal" data-target="#modal-edit"><i class="ion-edit"></i></button></h4>
                                </div>
                                </div>
                                <!-- .card-block -->
                            </div>
                            <!-- .card -->
                            <!-- End Floating Labels -->
                        </div>
                        <!-- .col-md-6 -->
                    </div>
                    <!-- End Classic -->
                </div>
                <!-- End Step 3 -->
            </div>
            <!-- End Steps Content -->
            <!-- Top Modal -->
                    <div class="modal fade" id="modal-top" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-top modal-md">
                            <div class="modal-content">
                                <div class="card-header bg-green bg-inverse">
                                    <h4>Validation</h4>
                                    <ul class="card-actions">
                                        <li>
                                            <button data-dismiss="modal" type="button"><i class="ion-close"></i></button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-block" id="bodyModal">
                                    <!-- Card Tabs Default Style -->
                                <div class="card">
                                    <div class="card-block">
                                         Voulez Vous Valider la réservation ?
                                    </div>
                                </div>
                                <!-- End Card Tabs Default Style -->
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
                                    <button class="btn btn-sm btn-app" type="button" id="validerRes"><i class="ion-checkmark"></i> Valider</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Top Modal -->
                    <!-- Top Modal -->
                    <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-top modal-md">
                            <div class="modal-content">
                                <div class="card-header bg-green bg-inverse">
                                    <h4>Votre Prix</h4>
                                    <ul class="card-actions">
                                        <li>
                                            <button data-dismiss="modal" type="button"><i class="ion-close"></i></button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-block" id="bodyModal">
                                    <!-- Card Tabs Default Style -->
                                <div class="card">
                                    <div class="card-block">
                                         <div class="form-group">
                                                <label for="example-nf-email">Nouveau Prix</label>
                                                <input class="form-control" type="email" id="prixNouveau" name="example-nf-email" placeholder="Enter Price...">
                                            </div>
                                    </div>
                                </div>
                                <!-- End Card Tabs Default Style -->
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
                                    <button class="btn btn-sm btn-app" type="button" id="validerPrix"><i class="ion-checkmark"></i> Valider</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Top Modal -->
                    <!-- Top Modal -->
                    <div class="modal fade" id="modalClients" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-top modal-lg">
                            <div class="modal-content">
                                <div class="card-header bg-green bg-inverse">
                                    <h4>Informations Clients</h4>
                                    <ul class="card-actions">
                                        <li>
                                            <button data-dismiss="modal" type="button"><i class="ion-close"></i></button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-block" id="bodyModal">
                                    <!-- Card Tabs Default Style -->
                                <div class="card">
                                    <ul class="nav nav-tabs" data-toggle="tabs">
                                        <li class="active">
                                            <a href="#infosClient">Infos Client</a>
                                        </li>
                                        <li>
                                            <a href="#infosCarte" id="lienCarte">Infos Carte</a>
                                        </li>
                                    </ul>
                                    <div class="card-block tab-content">
                                        <div class="tab-pane active" id="infosClient">
                                        <div class="form-group">
                                            <div class="col-sm-8">
                                                <div class="form-material floating">
                                                        <select class="form-control" id="typeClient" name="material-select2" size="1" onchange="hideThings();">
                                        <option value="1">Respensable</option>
                                        <option value="2">Accompagnateur</option>
                                        <option value="3">Enfant</option>
                                    </select>
                                                        <label for="material-select2">Select</label>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <div class="form-material floating">
                                                    <input class="form-control" type="text" id="nomCl" name="material-text2">
                                                    <label for="material-text2">Nom</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-material floating">
                                                    <input class="form-control" type="text" id="prenomCl" name="material-text2">
                                                    <label for="material-text2">Prénom</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="peremere">
                                            <div class="col-xs-6">
                                                <div class="form-material floating">
                                                    <input class="form-control" type="text" id="pere" name="material-text2">
                                                    <label for="material-text2">Fils de</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-material floating">
                                                    <input class="form-control" type="text" id="mere" name="material-text2">
                                                    <label for="material-text2">Et de</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-6">
                                                <div class="form-material">
                                                    <input class="form-control" type="date" id="naissanceCl" name="example-datepicker4">
                                                    <label for="example-datepicker4">Date de Naissance</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6" id="lieuHide">
                                                <div class="form-material floating">
                                                    <input class="form-control" type="text" id="lieuCl" name="material-gridl2">
                                                    <label for="material-gridl2">Lieu</label>
                                                </div>
                                            </div>
                                        </div>

                                        
                                        <div class="form-group" id="natHide">
                                            <div class="col-sm-6">
                                                <div class="form-material floating">
                                                    <input class="form-control" type="text" id="natCl" name="material-gridl2">
                                                    <label for="material-gridl2">Nationalité</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="jobHide">
                                            <div class="col-sm-6">
                                                <div class="form-material floating">
                                                    <input class="form-control" type="tel" id="jobCl" name="material-email2">
                                                    <label for="material-email2">Profession</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-material floating">
                                                    <input class="form-control" type="tel" id="telCl" name="material-email2">
                                                    <label for="material-email2">Numero Tel</label>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="form-group" id="addressHide">
                                        <div class="col-sm-8">
                                                <div class="form-material floating">
                                                    <textarea class="form-control" id="adresseCl" name="material-textarea-small" rows="2"></textarea>
                                                    <label for="example-datepicker4">Adresse</label>
                                                </div>
                                            </div>
                                   </div>
                                        </div>
                                        <div class="tab-pane" id="infosCarte">

                                           <!-- <div class="b-b m-b-md">
                                              <h2>Les Dates :</h2>
                                        </div>!-->
                                        <div class="form-group">
                                            <div class="col-sm-8">
                                                <div class="form-material floating">
                                                        <select class="form-control" id="piece" name="material-select2" size="1">
                                        <option value="1">Carte</option>
                                        <option value="2">Permis</option>
                                    </select>
                                                        <label for="material-select2">Select</label>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-6">
                                                <div class="form-material floating">
                                                    <input class="form-control" id="numPiece" name="numPiece">
                                                    <label for="material-email2">Numéro</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-material">
                                                    <input class="form-control" type="date" id="datePiece" name="example-datepicker4">
                                                    <label for="example-datepicker4">Fait Le</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Card Tabs Default Style -->
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
                                    <button class="btn btn-sm btn-app" type="button" id="validerInfosClient"><i class="ion-checkmark"></i> Valider</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Top Modal -->
            <!-- Steps Navigation -->
            <div class="card-block b-t">
                <div class="row">
                    <div class="col-xs-6">
                        <button class="wizard-prev btn btn-default" type="button">Previous</button>
                    </div>
                    <div class="col-xs-6 text-right">
                        <button class="wizard-next btn btn-default" type="button">Next</button>
                        <button class="wizard-finish btn btn-app" type="submit" id="submitReservation" data-toggle="modal" data-target="#modal-top"><i class="ion-checkmark m-r-xs"></i> Submit</button>
                    </div>
                </div>
            </div>
            <!-- End Steps Navigation -->
        <!-- End Form -->
    </div>
    <!-- .card -->
@endsection
@section('scripts')
    <!-- Page JS Plugins -->
    
    <script src="{{asset('js/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <!-- Page JS Plugins -->
    <script src="{{asset('js/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js')}}"></script>
    <script src="{{asset('js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>

    <!-- Page JS Code -->
    <script src="{{asset('js/pages/base_forms_wizard.js')}}"></script>

    <script>
        $(function()
        {
            // Init page helpers (Table Tools helper + Easy Pie Chart plugin)
            App.initHelpers('table-tools');
        });
    </script>
    <script>
        $(function()
        {
            // Init page helpers (BS Datepicker + BS Colorpicker + Select2 + Masked Input + Tags Inputs plugins)
            App.initHelpers(['datepicker', 'colorpicker', 'select2', 'masked-inputs', 'tags-inputs']);
        });
    </script>
    <!-- Script pour cette page -->
    <script type="text/javascript" src="{{asset('js/reservation/reserver.js')}}"></script>
@endsection