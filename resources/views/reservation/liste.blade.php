@extends('layouts.master')
@section('content')
     <!-- Dynamic Table Full -->
                        <div class="card">
                            <div class="card-header">
                            	<div class="b-b m-b-md">
                                    <h2>La liste des réservations</h2>
                                </div>
                             </div>
                            <div class="card-block">
                                <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->
                                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th class="hidden-xs">Date d'arrivée</th>
                                            <th class="hidden-xs w-20">Date de sortie</th>
                                            <th class="hidden-xs w-20">Prix Total</th>
                                            <th class="hidden-xs w-20">Prix Payé</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                @foreach($reservations as $res)
                   <tr>
                                            <td>{{$res->client->nom}} {{$res->client->prenom}}</td>
                                            <td>{{date_format(date_create($res->date_reservation),"Y-m-d")}}</td>
                                            <td>{{date_format(date_create($res->date_liberation),"Y-m-d")}}</td>
                                            <td>{{$res->total}} DA</td>
                                            <td>{{$res->prixPaye}} DA</td>
                                            <td>
            <div class="btn-group">
                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Action <span class="caret"></span>
                      </button>
                     <ul class="dropdown-menu">
                        @if($res->prixPaye < $res->total)
                        <li><a type="button" data-toggle="modal" data-target="#payementModal" id="{{$res->id}}" class="montantClass"><i class="fa fa-money fa-1x"></i> Payer</a></li>
                        @endif
                        <li><a type="button" data-toggle="modal" id="{{$res->id}}" data-target="#modalFin" class="finRes"><i class="fa fa-clock-o fa-1x"></i> Libérer</a></li>
                        <li><a type="button" id="{{$res->id}}" href="infos/{{$res->id}}"><i class="fa fa-clock-o fa-1x"></i> Infos</a></li>
                   </ul>
            </div>
                                            </td>
                   </tr>
                @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- .card-block -->
                        </div>
                        <!-- .card -->
                        <!-- End Dynamic Table Full -->
                        <!-- Top Modal -->
                    <div class="modal fade" id="payementModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-top modal-md">
                            <div class="modal-content">
                                <div class="card-header bg-green bg-inverse">
                                    <h4>Montant Payé</h4>
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
                                                <label for="example-nf-email">Montant Payé</label>
                                                <input class="form-control" type="email" id="montantPaye" name="example-nf-email" placeholder="Enter Price...">
                                            </div>
                                    </div>
                                </div>
                                <!-- End Card Tabs Default Style -->
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
                                    <button class="btn btn-sm btn-app" type="button" id="validerMontant"><i class="ion-checkmark"></i> Valider</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Top Modal -->
                    <!-- Top Modal -->
                    <div class="modal fade" id="modalFin" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-top modal-md">
                            <div class="modal-content">
                                <div class="card-header bg-green bg-inverse">
                                    <h4>Libération de la chambre</h4>
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
                                         Voulez vous mettre fin à la réservation
                                    </div>
                                </div>
                                <!-- End Card Tabs Default Style -->
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
                                    <button class="btn btn-sm btn-app" type="button" id="valFin"><i class="ion-checkmark"></i> Valider</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Top Modal -->
@endsection
@section('scripts')
    <!-- Page JS Plugins -->
    <script src="{{asset('js/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <!-- Page JS Plugins -->
    <script src="{{asset('js/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js')}}"></script>
    <script src="{{asset('js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>

    <!-- Page JS Code -->
    <script src="{{asset('js/pages/base_forms_wizard.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/app-custom.js')}}"></script>
    <!-- Page JS Plugins -->
        <script src="{{asset('js/plugins/datatables/jquery.dataTables.min.js')}}"></script>

        <!-- Page JS Code -->
        <script src="{{asset('js/pages/base_tables_datatables.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/reservation/reserver.js')}}"></script>
@endsection