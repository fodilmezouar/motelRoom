@extends('layouts.master')
@section('content')
     <!-- Dynamic Table Full -->
                        <div class="card">
                            <div class="card-header">
                            	<div class="b-b m-b-md">
                                    <h2>Informations Clients</h2>
                                </div>
                             </div>
                            <div class="card-block">
                                <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->
                                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th class="hidden-xs">Prenom</th>
                                            <th class="hidden-xs w-20">Date,Lieu de Naissance</th>
                                            <th class="hidden-xs w-20">Type</th>
                                            <th class="hidden-xs w-20">Apercu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                @foreach($clients as $client)
                   <tr>
                                            <td>{{$client->nom != null ? $client->nom : '/'}} </td>
                                            <td>{{$client->prenom != null ? $client->prenom : '/'}}</td>
                                            <td>{{$client->naissance != null ? date_format(date_create($client->naissance),"Y-m-d") : '/'}} {{$client->lieu != null ? $client->lieu :''}}</td>
                                            <td>
                                                @if($client->type == '1')
                                                      {{'Respensable'}}
                                                    @elseif($client->type == '2')
                                                    {{'Accompagnateur'}}
                                                    @else
                                                    {{'Enfant'}}
                                                    @endif
                                            </td>
                                            <td><button  class="btn btn-primary" data-toggle="modal" data-target="#infosClients{{$client->id}}"><i class="fa fa-eye "></i> Apercu</button></td>
                   </tr>
                   <!-- Top Modal -->
                    <div class="modal fade" id="infosClients{{$client->id}}" tabindex="-1" role="dialog" aria-hidden="true">
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
                                        <li class="active lio">
                                            <a href="#lien1{{$client->id}}">Infos Client</a>
                                        </li>
                                        @if($client->type != '3')
                                        <li class="lio">
                                            <a href="#lien2{{$client->id}}">Infos Carte</a>
                                        </li>
                                        @endif
                                    </ul>
                                    <div class="card-block tab-content">
                                        <div class="tab-pane active" id="lien1{{$client->id}}">
                                        <div class="form-group">
                                            <div class="row">
                                              <div class="col-sm-6">
                                                <label class="col-sm-12" for="example-email-input">Type</label>
                                                <div class="col-sm-12">
                                                    @if($client->type == '1')
                                                      {{'Respensable'}}
                                                    @elseif($client->type == '2')
                                                    {{'Accompagnateur'}}
                                                    @else
                                                    {{'Enfant'}}
                                                    @endif
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                              <div class="col-sm-6">
                                                <label class="col-sm-12" for="example-email-input">Nom</label>
                                                <div class="col-sm-12">
                                                    @if($client->nom)
                                                     {{$client->nom}}
                                                    @else
                                                       /
                                                    @endif
                                                </div>
                                              </div>
                                              <div class="col-sm-6">
                                                <label class="col-sm-12" for="example-email-input">Prenom</label>
                                                <div class="col-sm-12">
                                                    @if($client->prenom)
                                                      {{$client->prenom}}
                                                    @else
                                                       /
                                                    @endif
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                        @if($client->type != '3')
                                        <div class="form-group" id="peremere">
                                            <div class="row">
                                              <div class="col-sm-6">
                                                <label class="col-sm-12" for="example-email-input">Fils de</label>
                                                <div class="col-sm-12">
                                                    @if($client->pere)
                                                     {{$client->pere}}
                                                    @else
                                                       /
                                                    @endif
                                                </div>
                                              </div>
                                              <div class="col-sm-6">
                                                <label class="col-sm-12" for="example-email-input">Et de</label>
                                                <div class="col-sm-12">
                                                    @if($client->mere)
                                                     {{$client->mere}}
                                                    @else
                                                       /
                                                    @endif
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                    @endif
                                        <div class="form-group">
                                            <div class="row">
                                              <div class="col-sm-6">
                                                <label class="col-sm-12" for="example-email-input">Date de naissance</label>
                                                <div class="col-sm-12">
                                                    @if($client->naissance)
                                                     {{$client->naissance}}
                                                    @else
                                                       /
                                                    @endif
                                                </div>
                                              </div>
                                              <div class="col-sm-6" id="lieuHide">
                                                <label class="col-sm-12" for="example-email-input">Lieu</label>
                                                <div class="col-sm-12">
                                                    @if($client->lieu)
                                                     {{$client->lieu}}
                                                    @else
                                                       /
                                                    @endif
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                        @if($client->type != '3')
                                        <div class="form-group">
                                            <div class="row">
                                              <div class="col-sm-6" id="natHide">
                                                <label class="col-sm-12" for="example-email-input">Nationalité</label>
                                                <div class="col-sm-12">
                                                    @if($client->nationalite)
                                                     {{$client->nationalite}}
                                                    @else
                                                       /
                                                    @endif
                                                </div>
                                              </div>
                                              <div class="col-sm-6" id="jobHide">
                                                <label class="col-sm-12" for="example-email-input">Profession</label>
                                                <div class="col-sm-12">
                                                    @if($client->job)
                                                     {{$client->job}}
                                                    @else
                                                       /
                                                    @endif
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                        @endif
                                        @if($client->type != '3')
                                        <div class="form-group">
                                            <div class="row">
                                              <div class="col-sm-6" id="telHide">
                                                <label class="col-sm-12" for="example-email-input">Numéro de tel</label>
                                                <div class="col-sm-12">
                                                    @if($client->tel)
                                                     {{$client->tel}}
                                                    @else
                                                       /
                                                    @endif
                                                </div>
                                              </div>
                                              <div class="col-sm-6" id="addressHide">
                                                <label class="col-sm-12" for="example-email-input">Adresse</label>
                                                <div class="col-sm-12">
                                                    @if($client->adresse)
                                                     {{$client->adresse}}
                                                    @else
                                                       /
                                                    @endif
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                      @endif
                                        </div>
                                        @if($client->type != '3')
                                        <div class="tab-pane" id="lien2{{$client->id}}">
                                        <div class="form-group">
                                            <div class="row">
                                              <div class="col-sm-6">
                                                <label class="col-sm-12" for="example-email-input">Type</label>
                                                <div class="col-sm-12">
                                                    @if($client->typePiece == '1')
                                                      Carte
                                                    @else
                                                    Permis
                                                    @endif
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                              <div class="col-sm-6">
                                                <label class="col-sm-12" for="example-email-input">Numéro</label>
                                                <div class="col-sm-12">
                                                    @if($client->numPiece)
                                                     {{$client->numPiece}}
                                                    @else
                                                       /
                                                    @endif
                                                </div>
                                              </div>
                                              <div class="col-sm-6">
                                                <label class="col-sm-12" for="example-email-input">Fait le</label>
                                                <div class="col-sm-12">
                                                    @if($client->datePiece)
                                                     {{$client->datePiece}}
                                                    @else
                                                       /
                                                    @endif
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                        <div>
                                        </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <!-- End Card Tabs Default Style -->
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Top Modal -->
                @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- .card-block -->
                        </div>
                        <!-- .card -->
                        <!-- End Dynamic Table Full -->
                    
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