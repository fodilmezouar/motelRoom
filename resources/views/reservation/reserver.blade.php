@extends('layouts.master')

@section('content')
    <!-- End Page Content -->
    <div class="card js-wizard-simple">
        <!-- Step Tabs -->
        <ul class="nav nav-tabs nav-justified">
            <li class="active">
                <a href="#simple-classic-progress-step1" data-toggle="tab">1. Infos Client</a>
            </li>
            <li>
                <a href="#simple-classic-progress-step2" data-toggle="tab">2. Chambres</a>
            </li>
            <li>
                <a href="#simple-classic-progress-step3" data-toggle="tab">3. Réserver</a>
            </li>
        </ul>
        <!-- End Step Tabs -->

        <!-- Form -->
        <form class="form-horizontal" action="base_forms_wizard.html" method="post">
            <!-- Steps Progress -->
            <div class="card-block b-b">
                <div class="wizard-progress progress progress-mini m-b-0">
                    <div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 0"></div>
                </div>
            </div>
            <!-- End Steps Progress -->

            <!-- Steps Content -->
            <div class="card-block tab-content">
                <!-- Step 1 -->
                <div class="tab-pane fade fade-up in m-t-md m-b-lg active" id="simple-classic-progress-step1">
                    <div class="b-b m-b-md">
                        <h2>Informations Client</h2>
                    </div>
                    <div class="row">
                        <!-- .col-md-6 -->

                        <div class="col-md-offset-2 col-md-8">
                            <!-- Floating Labels -->
                            <div class="card">
                                <!--<div class="card-header">
                                   <h4>Floating Labels</h4>
                                    <ul class="card-actions">
                                        <li>
                                            <button type="button"><i class="ion-more"></i></button>
                                        </li>
                                    </ul>
                                </div>-->
                                <div class="card-block">
                                    <form class="form-horizontal m-t-sm" action="base_forms_elements_modern.html" method="post" onsubmit="return false;">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <div class="form-material floating">
                                                    <input class="form-control" type="text" id="nom" name="material-text2">
                                                    <label for="material-text2">Nom</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-material floating">
                                                    <input class="form-control" type="text" id="prenom" name="material-text2">
                                                    <label for="material-text2">Prénom</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-8">
                                                <div class="form-material floating">
                                                    <input class="form-control" type="tel" id="tel" name="material-email2">
                                                    <label for="material-email2">Numero Tel</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <div class="form-material floating">
                                                    <input class="form-control" type="text" id="permis" name="material-gridf2">
                                                    <label for="material-gridf2">Numero Permis</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-material floating">
                                                    <input class="form-control" type="text" id="carte" name="material-gridl2">
                                                    <label for="material-gridl2">Numéro Carte</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-8">
                                                <div class="form-material floating">
                                                    <textarea class="form-control" id="adresse" name="material-textarea-small" rows="2"></textarea>
                                                    <label for="example-datepicker4">Adresse</label>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <div class="col-sm-8">
                                                <div class="form-material">
                                                    <input class="form-control" type="date" id="naissance" name="example-datepicker4">
                                                    <label for="example-datepicker4">Date de Naissance</label>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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

                <!-- Step 2 -->
                <div class="tab-pane fade fade-up m-t-md m-b-lg" id="simple-classic-progress-step2">
                    <div class="b-b m-b-md">
                        <h2>Chambres</h2>
                        <div class="col-sm-offset-1 col-sm-10">
                            <br>
                            <!-- Message List -->
                            <div class="card">
                                <div class="card-header">
                                    <div class="h4">Chambres Libres</div>
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
                                        <table class="js-table-checkable table table-hover table-vcenter m-b-0">
                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th>Numéro</th>
                                                <th>Lit</th>
                                                <th>Etage</th>
                                                <th>Prix</th>
                                            </tr>
                                            </thead>
                                            <tbody>
            @foreach($roomsLibre as $room)
            <tr id="{{$room->id}}">
                 <td class="text-center">
                            <label class="css-input css-checkbox css-checkbox-default">
                                <input type="checkbox" class="cocherChambre"><span></span>
                            </label>
                 </td>  
                 <td class="hidden-xs font-500">{{$room->numero}}</td>
                 <td class="hidden-xs font-500">{{$room->lits}}</td>
                 <td class="hidden-xs font-500">{{$room->etage}}</td>
                 <td class="hidden-xs font-500">{{$room->prix}} DA</td> 
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
                                        <div class="input-daterange input-group" data-date-format="mm/dd/yyyy">
                                            <input class="form-control" type="text" id="arr" name="example-daterange1" placeholder="Date D'arrivée">
                                            <span class="input-group-addon"><i class="ion-chevron-right"></i></span>
                                            <input class="form-control" type="text" id="sor" name="example-daterange2" placeholder="Date De Sortie">
                                        </div>
                                    </form>
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
                        <div class="modal-dialog modal-dialog-top modal-lg">
                            <div class="modal-content">
                                <div class="card-header bg-green bg-inverse">
                                    <h4>Récapitulation</h4>
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
                                            <a href="#infosClientModal">Infos Client</a>
                                        </li>
                                        <li>
                                            <a href="#btabs-static-profile">Infos Réservation</a>
                                        </li>
                                    </ul>
                                    <div class="card-block tab-content">
                                        <div class="tab-pane active" id="infosClientModal">

                                        </div>
                                        <div class="tab-pane" id="btabs-static-profile">
                                        	<div class="b-b m-b-md">
                                              <h2>Les Dates :</h2>
                                        </div>
                                        <div>
                                        	<p><b>Date D'arrivée</b> : <span id="arrRecap"></span></p>
                                            <p><b>Date de Sortie</b> : <span id="sorRecap"></span></p>
                                            <p><b>Séjour (nombre de jours)</b> : <span id="sejour"></span></p>
                                        </div>
                                        	<div class="b-b m-b-md">
                        <h2>Chambres Choisies</h2>
                    </div>
                                            <table class="table table-vcenter m-b-0">
                                            <thead>
                                            <tr>
                                                <th>Numéro</th>
                                                <th>Lit</th>
                                                <th>Etage</th>
                                                <th>Prix</th>
                                            </tr>
                                            </thead>
                                            <tbody id="bodyRecap">
                                            </tbody>
                                            <tfoot>
                                            	<tr>
                                            		<td colspan="3"></td>
                                            		<th id="totalRec"></th>
                                            	</tr>
                                            </tfoot>
                                        </table>
                           
                                        </div>
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
        </form>
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