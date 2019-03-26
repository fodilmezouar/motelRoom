var refTmp;
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function removeMat($idMat){
    $('#body-removeRoom').attr('role',$idMat);
    return true;
}
function editMat($idMat){


    $('#body-editRoom').attr('role',$idMat);
    $.getJSON('getInformationRoom/'+$idMat, function (data) {
        // Iterate the groups first.
        var ref= data.data[0][0];
        refTmp=ref;
        var lits= data.data[0][1];
        var etage= data.data[0][2];
        var prix= data.data[0][3];
        $("#RefRoomEdit").val(ref);
        $("#numLiEdit").val(lits);
        $("#etageEdit").val(etage);
        $("#prixEdit").val(prix);
    });

}







$(function () {


    var manageMat = $("#tableRoom").DataTable({
        dom: 'Bfrtip',
        oLanguage: {
            sLengthMenu: "_MENU_",
            sInfo: "Showing <strong>_START_</strong>-<strong>_END_</strong> of <strong>_TOTAL_</strong>",
            oPaginate: {
                sPrevious: '<i class="ion-ios-arrow-left"></i>',
                sNext: '<i class="ion-ios-arrow-right"></i>'
            }
        },
        destroy: true,
        'ajax': 'getRoom',
        'order': []
    });

    $("#submitRoomForm").unbind('submit').bind('submit', function() {
        var RefMat = $("#RefRoom").val().toUpperCase();
        var RefUnique = $('#tableRoom td').filter(function (){
            return $.trim($(this).text()) == RefMat;});


        if(RefMat == ""){
            $("#RefRoom").after('<p class="text-danger">Veuillez saisir la référence</p>');
            $('#RefRoom').closest('.form-group').addClass('has-error');
        }
        else if(RefUnique.length>0){
            $("#RefRoom").after('<p class="text-danger">Référence déja existe</p>');
            $('#RefRoom').closest('.form-group').addClass('has-error');
            return false;
        }
        else{
            var form = $(this);
            $("#createRoomBtn").button('loading');
            $.ajax({
                url : form.attr('action'),
                type: form.attr('method'),
                data: form.serialize(),
                dataType: 'json',
                success:function(response) {
                    $("#createRoomBtn").button('reset');
                    if(response.success == true) {
                        manageMat.ajax.reload(null, false);
                        $("#submitRoomForm")[0].reset();
                        $(".text-danger").remove();
                        $('.form-group').removeClass('has-error').removeClass('has-success');
                        $('#add-mat-messages').html('<div class="alert alert-success">'+
                            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                            '<strong><i class="fa fa-check"></i></strong> '+ response.messages +
                            '</div>');
                        $(".alert-success").delay(500).show(10, function() {
                            $(this).delay(3000).hide(10, function() {
                                $(this).remove();
                            });
                        }); // /.alert
                    }  // if
                } // /success
            }); // /ajax
        }
        return false;
    });

    $('#removeMat').on('click',function(e){
        var idRoom = $("#body-removeRoom").attr('role');

        $.ajax({
            url: 'deleteRoom',
            type: 'post',
            dataType: 'json',
            data: {"_token": $('meta[name="csrf-token"]').attr('content'),"idRoom":idRoom},
            success:function(response) {

                $('#removeMatModal').modal('hide');
                manageMat.ajax.reload(null, false);
                $('.remove-messagesMat').html('<div class="alert alert-success">'+
                    '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                    '<strong><i class="fa fa-check"></i></strong> Suppression Effectuée</div>');

                $(".alert-success").delay(500).show(10, function() {
                    $(this).delay(3000).hide(10, function() {
                        $(this).remove();
                    });
                }); // /.alert
            }
        });
    });



    $('#editRoomBtn').on('click',function(e){
        var idMatEdit = $("#body-editRoom").attr('role');
        var RefMatEdit = $("#RefRoomEdit").val().toUpperCase();
        var NumLitEdit = $("#numLiEdit").val();
        var etageEdit = $("#etageEdit").val();
        var prixEdit = $("#prixEdit").val();
        var RefUniqueEdit = $('#tableRoom td').filter(function (){
            return $.trim($(this).text()) == RefMatEdit;});

        if(RefMatEdit == ""){
            $("#RefRoomEdit").after('<p class="text-danger">Veuillez saisir la référence</p>');
            $('#RefRoomEdit').closest('.form-group').addClass('has-error');
        }
        else if(RefUniqueEdit.length>0 && refTmp != RefMatEdit){
            $("#RefRoomEdit").after('<p class="text-danger">Référence déja existe</p>');
            $('#RefRoomEdit').closest('.form-group').addClass('has-error');
            return false;
        }
        else{
            $.ajax({
                url: 'editRoom/'+idMatEdit,
                type: 'post',
                dataType: 'json',
                data: {"_token": $('meta[name="csrf-token"]').attr('content'),"refRoomEdit":RefMatEdit,"numEdit":NumLitEdit,"etageEdit":etageEdit,"prixEdit":prixEdit},
                success:function(response) {

                    manageMat.ajax.reload(null, false);
                    $(".text-danger").remove();
                    $('.form-group').removeClass('has-error').removeClass('has-success');
                    $('#edit-room-messages').html('<div class="alert alert-success">'+
                        '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                        '<strong><i class="fa fa-check"></i></strong> '+ response.message +
                        '</div>');
                    $(".alert-success").delay(500).show(10, function() {
                        $(this).delay(3000).hide(10, function() {
                            $(this).remove();
                        });
                    }); // /.alert
                }
            });
        }
        return false;
    });




});