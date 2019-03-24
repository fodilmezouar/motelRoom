     var total = 0;
     var idChambres = [];
     var clients = [];
     var cptClients = 0;
     function calcDuree(){
        var duree = parseInt($('#duree').val());
        if(!duree)
            duree = 0;
        var start= $("#arr").datepicker("getDate");
        var end = new Date(start);
        end.setDate(end.getDate() + duree);
        var $datepicker = $('#sor');
        $datepicker.datepicker();
        $datepicker.datepicker('setDate',new Date(end));
        console.log(end);
     }
     $('.rooms').on('click',function(){
       $('.rooms').removeClass('active');
       $('input:checked').prop( "checked", false );
     });
     $('#clients').on('click','.delete',function(){
      $(this).parent().parent().remove();
      if($('#contentClients').html().trim() == "")
        $('#clients').append('<tr align="center" id="vide"><td colspan="5" id="hih">Table Vide</td></tr>');
    });
     $('#validerPrix').on('click',function(){
        var prix = $('#prixNouveau').val();
        $('#prixTotal').html(prix);
        $('#modal-edit').modal('hide');
     });
     function hideThings(){
        if($('#typeClient').val() == "3"){
            $('#lienCarte').addClass('hide');
            $('#infosCarte').addClass('hide');
            $('#peremere').addClass('hide');
            $('#lieuHide').addClass('hide');
            $('#natHide').addClass('hide');
            $('#jobHide').addClass('hide');
            $('#addressHide').addClass('hide');
        }
        else
          {
            $('#lienCarte').removeClass('hide');
            $('#infosCarte').removeClass('hide');
            $('#peremere').removeClass('hide');
            $('#lieuHide').removeClass('hide');
            $('#natHide').removeClass('hide');
            $('#jobHide').removeClass('hide');
            $('#addressHide').removeClass('hide');
          }

     }
     function calculTotal(){
        var trChambres = $("tr[class*='active']");
     var somme = 0;
     var prixChambre =parseInt($('#prix').val());
     for(var i = 0;i< trChambres.length ;i++){
        var tr = trChambres[i];
        idChambres[i] = tr.id;
        var pr = parseInt($('#'+tr.id+' .prixRoom').html());
        somme+=pr;
     }

     var arr = $('#arr').val();
     var sor = $('#sor').val();
     var start= $("#arr").datepicker("getDate");
    var end= $("#sor").datepicker("getDate");
    var days = (end- start) / (1000 * 60 * 60 * 24);
    var sejour = Math.round(days);
     $('#prixTotal').html(sejour * somme);
     }
     $('#validerInfosClient').on('click',function(){
         var typeClient = $('#typeClient').val();
         var nomCl = $('#nomCl').val();
         var prenomCl = $('#prenomCl').val();
         var pere = $('#pere').val();
         var mere = $('#mere').val();
         var naissanceCl = $('#naissanceCl').val();
         var lieuCl = $('#lieuCl').val();
         var adresseCl = $('#adresseCl').val();
         var natCl = $('#natCl').val();
         var jobCl = $('#jobCl').val();
         var telCl = $('#telCl').val();
         var piece = $('#piece').val();
         var numPiece = $('#numPiece').val();
         var datePiece = $('#datePiece').val();
         clients[cptClients++] = {
             "typeClient":typeClient,
             "nomCl":nomCl,
             "prenomCl":prenomCl,
             "pere":pere,
             "mere":mere,
             "naissanceCl":naissanceCl,
             "lieuCl":lieuCl,
             "adresseCl":adresseCl,
             "natCl":natCl,
             "jobCl":jobCl,
             "telCl":telCl,
             "piece":piece,
             "numPiece":numPiece,
             "datePiece":datePiece
         };
         var help = "";
         if(typeClient == "1")
            help = "Respensable";
         else if(typeClient == "2")
            help = "Accompagnateur";
         else
            help ="Enfant";
         var aAjoute = "<tr><td>"+nomCl+"</td>"+
                            "<td>"+prenomCl+"</td>"+ 
                            "<td>"+naissanceCl+"</td>"+ 
                            "<td>"+help+"</td>"+
                            "<td class='text-center'>"+
                            "<button class='btn btn-danger delete'>"+
                            "<i class='ion-close'></i> Supprimer</button>"+
                             "</td></tr>";
        if($('#hih').html()){
          $('#vide').remove();  
        }
        $('#clients').append(aAjoute);  
         console.log(clients);
     });
     $("#submitReservation").on('click', function() {
     var trChambres = $("tr[class='active']");
     var somme = 0;
     //var prixChambre =parseInt($('#prix').val());
     for(var i = 0;i< trChambres.length ;i++){
     	var tr = trChambres[i];
     	idChambres[i] = tr.id;
     	//somme+=prixChambre;
     }
     var arr = $('#arr').val();
     var sor = $('#sor').val();
     var start= $("#arr").datepicker("getDate");
    var end= $("#sor").datepicker("getDate");
    var days = (end- start) / (1000 * 60 * 60 * 24);
    var sejour = Math.round(days);
     $('#arrRecap').html(arr);
     $('#sorRecap').html(sor);
     $('#sejour').html(sejour);
     //total = somme * sejour;
     });
     $("#validerRes").on('click',function(){
     	/* store client */
     	var idClient,idRes;
         
       /* store reservation */
       $.ajax({
                url: 'storeReservation',
                type: 'post',
                dataType: 'json',
                data: {
                	"_token": $('meta[name="csrf-token"]').attr('content'),
                	"arr":$('#arr').val(),
                	"sor":$('#sor').val(),
                	"total":parseInt( $('#prixTotal').html()),
                	"idChambre":idChambres[0],
                    "clients":clients
                },
                success:function(response) {
                        window.location.href = "liste";
                }
             });
     });
         var idRes ;
         $('.finRes').on('click',function(){
            idRes = $(this).attr('id');
         });
         var idResMontant ;
         $('.montantClass').on('click',function(){
            idResMontant = $(this).attr('id');
            alert(idResMontant);
         });
         $('#valFin').on('click',function(){
            $.ajax({
                url: 'liberer',
                type: 'post',
                dataType: 'json',
                data: {
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                    "idRes":idRes
                },
                success:function(response) {
                           location.reload();
                }
             });
         });
         $('#validerMontant').on('click',function(){
            $.ajax({
                url: 'payer',
                type: 'post',
                dataType: 'json',
                data: {
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                    "idResMontant":idResMontant,
                    "montant":$('#montantPaye').val()
                },
                success:function(response) {
                           location.reload();
                }
             });
         });
         
     
