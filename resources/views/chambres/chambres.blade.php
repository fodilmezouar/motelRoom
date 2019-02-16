@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <br>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="page-heading">Chambres</div>
                </div> <!-- /panel-heading -->
                <div class="panel-body">
                    <div class="remove-messagesMat"></div>
                    <div class="div-action pull pull-right" style="padding-bottom:20px;">
                        <button class="btn btn-app"  data-toggle="modal" data-target="#addRoom"> <i class="fa fa-plus-circle"></i> Ajouter Chambre </button>

                    </div> <!-- /div-action -->

                    <table class="table table-bordered table-striped table-vcenter js-dataTable-simple" width="100%" id="tableRoom">
                        <thead>
                        <tr>
                            <th>Référence</th>
                            <th>etage</th>
                            <th>lits</th>
                            <th>prix</th>
                            <th>Etat</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                    </table>
                    <!-- /table -->
                </div> <!-- /panel-body -->
            </div> <!-- /panel -->
        </div> <!-- /col-md-12 -->
    </div> <!-- /row -->

    <div class="modal fade" id="addRoom" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" id="submitRoomForm" action="createRoom" method="POST">
                    {{csrf_field()}}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="fa fa-plus"></i> Ajouter Chambre</h4>
                    </div>
                    <div class="modal-body">
                        <div id="add-mat-messages"></div>
                        <div class="form-group">
                            <label for="brandName" class="col-sm-3 control-label">Référence </label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="RefRoom" placeholder="Référence chambre" name="RefRoom" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="brandName" class="col-sm-3 control-label">nombre de lits </label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="numLi" placeholder="Nombre de lits" name="numLit" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="brandName" class="col-sm-3 control-label">Étage </label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="etage" placeholder="Étage" name="etage" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="brandName" class="col-sm-3 control-label">Prix </label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="prix" placeholder="Prix" name="prix" autocomplete="off">
                            </div>
                        </div>
                    </div> <!-- /modal-body -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>

                        <button type="submit" class="btn btn-app-green" id="createRoomBtn" data-loading-text="Loading..." autocomplete="off">Ajouter</button>
                    </div>
                    <!-- /modal-footer -->
                </form>
                <!-- /.form -->
            </div>
            <!-- /modal-content -->
        </div>
        <!-- /modal-dailog -->
    </div>
    <!-- / add modal -->

    <!-- edit brand -->
    <div class="modal fade" id="editMaterielsModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">

                <form class="form-horizontal" id="editMatForm" action="" method="POST">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="fa fa-edit"></i> Modfier Chambre</h4>
                    </div>
                    <div class="modal-body" id="body-editRoom">
                        <div id="edit-room-messages"></div>
                        <div class="form-group">
                            <label for="brandName" class="col-sm-3 control-label">Référence </label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="RefRoomEdit" placeholder="Référence chambre" name="refRoomEdit" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="brandName" class="col-sm-3 control-label">nombre de lits </label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="numLiEdit" placeholder="Nombre de lits" name="numEdit" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="brandName" class="col-sm-3 control-label">Étage </label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="etageEdit" placeholder="Étage" name="etageEdit" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="brandName" class="col-sm-3 control-label">Prix </label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="prixEdit" placeholder="Prix" name="prixEdit" autocomplete="off">
                            </div>
                        </div>
                        <!-- /edit brand result -->

                    </div> <!-- /modal-body -->

                    <div class="modal-footer editBrandFooter">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="ion-android-remove-circle"></i> Fermer</button>

                        <button type="submit" class="btn btn-success" id="editRoomBtn" data-loading-text="Loading..." autocomplete="off"> <i class="ion-edit"></i> Modifier</button>
                    </div>
                    <!-- /modal-footer -->
                </form>
                <!-- /.form -->
            </div>
            <!-- /modal-content -->
        </div>
        <!-- /modal-dailog -->
    </div>
    <!-- / add modal -->
    <!-- /edit brand -->

    <!-- remove brand -->
    <div class="modal fade" tabindex="-1" role="dialog" id="removeMatModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="fa fa-trash-o"></i> Supprimer Matériel</h4>
                </div>
                <div class="modal-body" id="body-removeRoom">
                    <p>Etes vous sur ?</p>
                </div>
                <div class="modal-footer removeCatFooter">
                    <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="ion-ios-trash"></i> Fermer</button>
                    <button type="button" class="btn btn-primary" id="removeMat" data-loading-text="Loading..."> <i class="ion-android-done"></i> Supprimer</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- /remove brand -->


@endsection
@section('scripts')

    <!-- Page JS Plugins -->
    <script src="{{asset('js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/chambres.js')}}"></script>
    <!-- Page JS Code -->

@endsection