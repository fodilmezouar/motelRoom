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
                                            <th class="text-center" style="width: 10%;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                @foreach($reservations as $res)
                   <tr>
                                            <td>{{$res->client->nom}}</td>
                                            <td class="hidden-xs">{{date_format(date_create($res->date_reservation),"Y-m-d")}}</td>
                                            <td class="hidden-xs w-20">{{date_format(date_create($res->date_liberation),"Y-m-d")}}</td>
                                            <td class="hidden-xs w-20">{{$res->total}} DA</td>
                                            <td>
            <div class="btn-group">
                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Action <span class="caret"></span>
                      </button>
                     <ul class="dropdown-menu">
                        <li><a type="button" data-toggle="modal" id="{{$res->id}}" data-target="#modalFin" class="finRes"> <i class="ion-edit"></i> Fin réservation</a></li>
                       <li><a type="button" data-toggle="modal" data-target="#removeMatModal" id="removeMaterielsModalBtn"> <i class="ion-trash-a"></i> Supprimer</a></li>
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
                        <!-- remove brand -->
    <div class="modal fade" tabindex="-1" role="dialog" id="modalFin">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="fa fa-trash-o"></i> Mettre Fin à la réservation</h4>
                </div>
                <div class="modal-body" id="body-removeRoom">
                    <p>Etes vous sur ? avant cà vérifier les clés</p>
                </div>
                <div class="modal-footer removeCatFooter">
                    <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="ion-ios-trash"></i> Fermer</button>
                    <button type="button" class="btn btn-primary" id="valFin" data-loading-text="Loading..."> <i class="ion-android-done"></i> Valider</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- /remove brand -->
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