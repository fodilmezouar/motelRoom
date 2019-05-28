     var total = 0;
     var idChambres = [];
     var clients = [];
     var cptClients = 0;
     var clientEdit;
     $('.lio').on('click',function(){
          $('.lio').removeClass('active');
          $(this).addClass('active');
     });


     $('#tableData').dataTable();
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
      $(this).parent().parent().parent().parent().remove();
      if($('#contentClients').html().trim() == "")
        $('#clients').append('<tr align="center" id="vide"><td colspan="5" id="hih">Table Vide</td></tr>');
    });
     $('#clients').on('click','.edit',function(){
        $('#formInfosEdit')[0].reset();
      clientEdit = $(this).attr('id');
      var cl = clients[clientEdit];

        if(cl["typeClient"])
                $('#typeClientEdit').val(cl["typeClient"]);
             if(cl["nomCl"])
                $('#nomClEdit').val(cl["nomCl"]);
             if(cl["prenomCl"])
                $('#prenomClEdit').val(cl["prenomCl"]);
             if(cl["pere"])
                $('#pereEdit').val(cl["pere"]);
             if(cl["mere"])
                $('#mereEdit').val(cl["mere"]);
             if(cl["naissanceCl"])
                $('#naissanceClEdit').val(cl["naissanceCl"]);
             if(cl["lieuCl"])
                $('#lieuClEdit').val(cl["lieuCl"]);
             if(cl["adresseCl"])
                $('#adresseClEdit').val(cl["adresseCl"]);
             if(cl["natCl"])
                $('#natClEdit').val(cl["natCl"]);
             if(cl["jobCl"])
                $('#jobClEdit').val(cl["jobCl"]);
             if(cl["telCl"])
                $('#telClEdit').val(cl["telCl"]);
             if(cl["piece"])
                $('#pieceEdit').val(cl["piece"]);
             if(cl["numPiece"])
                $('#numPieceEdit').val(cl["numPiece"]);
             if(cl["datePiece"])
                $('#datePieceEdit').val(cl["datePiece"]);
            hideThingsEdit();

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
            $('#natHide').addClass('hide');
            $('#jobHide').addClass('hide');
            $('#addressHide').addClass('hide');
            $('#telHide').addClass('hide');
        }
        else
          {
            $('#lienCarte').removeClass('hide');
            $('#infosCarte').removeClass('hide');
            $('#peremere').removeClass('hide');
            $('#natHide').removeClass('hide');
            $('#jobHide').removeClass('hide');
            $('#addressHide').removeClass('hide');
            $('#telHide').removeClass('hide');
          }

     }
     function hideThingsEdit(){
        if($('#typeClientEdit').val() == "3"){
            $('#lienCarteEdit').addClass('hide');
            $('#infosCarteEdit').addClass('hide');
            $('#peremereEdit').addClass('hide');
            $('#natHideEdit').addClass('hide');
            $('#jobHideEdit').addClass('hide');
            $('#addressHideEdit').addClass('hide');
            $('#telHideEdit').addClass('hide');
        }
        else
          {
            $('#lienCarteEdit').removeClass('hide');
            $('#infosCarteEdit').removeClass('hide');
            $('#peremereEdit').removeClass('hide');
            $('#natHideEdit').removeClass('hide');
            $('#jobHideEdit').removeClass('hide');
            $('#addressHideEdit').removeClass('hide');
            $('#telHideEdit').removeClass('hide');
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
    /*
     $('.addClient').on('click',function(){
        var tr = $('tbody[class="listeClient"] tr[id="'+$(this).attr('id')+'"]');
        alert("d");
         clients[cptClients++]={
            "isClient":true
         };

     });*/
     function add(type,nom,prenom,pere,mere,naissance,lieu,adresse,nat,job,tel,typePiece,numPiece,datePiece,idCl){
        clients[cptClients++] = {
             "typeClient":type,
             "nomCl":nom,
             "prenomCl":prenom,
             "pere":pere,
             "mere":mere,
             "naissanceCl":naissance,
             "lieuCl":lieu,
             "adresseCl":adresse,
             "natCl":nat,
             "jobCl":job,
             "telCl":tel,
             "piece":typePiece,
             "numPiece":numPiece,
             "datePiece":datePiece,
             "isClient":true,
             "idCl":idCl
         };
         var help = "";
         if(type == "1")
            help = "Respensable";
         else if(type == "2")
            help = "Accompagnateur";
         else
            help ="Enfant";
        var action = '<div class="btn-group">'+
                      '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'+
                          'Action <span class="caret"></span>'+
                      '</button>'+
                     '<ul class="dropdown-menu">'+
                        '<li id="'+(cptClients-1)+'" class="edit"><a data-toggle="modal" data-target="#modalClientsEdit" type="button"> Editer</a></li>'+
                        '<li class="delete"><a type="button"  > Supprimer</a></li>'
                   '</ul>'+
            '</div>';
         var aAjoute = "<tr id='"+(cptClients-1)+"' class='trClient'><td class='nomTb'>"+nom+"</td>"+
                            "<td class='prenomTb'>"+prenom+"</td>"+ 
                            "<td class='naissTb'>"+naissance+"</td>"+ 
                            "<td class='typeTb'>"+help+"</td>"+
                            "<td class='text-center'>"+action+"</td></tr>";
      $('tbody[class="listeClient"] tr[id="'+idCl+'"]').remove();

        if($('#hih').html()){
          $('#vide').remove();  
        }
        $('#clients').append(aAjoute);
        $('#modalListe').modal('hide'); 
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
             "datePiece":datePiece,
             "isClient":false
         };
         var help = "";
         if(typeClient == "1")
            help = "Respensable";
         else if(typeClient == "2")
            help = "Accompagnateur";
         else
            help ="Enfant";
        var action = '<div class="btn-group">'+
                      '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'+
                          'Action <span class="caret"></span>'+
                      '</button>'+
                     '<ul class="dropdown-menu">'+
                        '<li id="'+(cptClients-1)+'" class="edit"><a data-toggle="modal" data-target="#modalClientsEdit" type="button"> Editer</a></li>'+
                        '<li class="delete"><a type="button"  > Supprimer</a></li>'
                   '</ul>'+
            '</div>';
         var aAjoute = "<tr id='"+(cptClients-1)+"' class='trClient'><td class='nomTb'>"+nomCl+"</td>"+
                            "<td class='prenomTb'>"+prenomCl+"</td>"+ 
                            "<td class='naissTb'>"+naissanceCl+"</td>"+ 
                            "<td class='typeTb'>"+help+"</td>"+
                            "<td class='text-center'>"+action+"</td></tr>";
        if($('#hih').html()){
          $('#vide').remove();  
        }
        $('#clients').append(aAjoute);  
        $('#formInfos')[0].reset();
         //console.log(clients);
        $('#modalClients').modal('hide');
     });
     $('#validerInfosClientEdit').on('click',function(){
         var typeClient = $('#typeClientEdit').val();
         var nomCl = $('#nomClEdit').val();
         var prenomCl = $('#prenomClEdit').val();
         var pere = $('#pereEdit').val();
         var mere = $('#mereEdit').val();
         var naissanceCl = $('#naissanceClEdit').val();
         var lieuCl = $('#lieuClEdit').val();
         var adresseCl = $('#adresseClEdit').val();
         var natCl = $('#natClEdit').val();
         var jobCl = $('#jobClEdit').val();
         var telCl = $('#telClEdit').val();
         var piece = $('#pieceEdit').val();
         var numPiece = $('#numPieceEdit').val();
         var datePiece = $('#datePieceEdit').val();
         var cl = clients[clientEdit];
         cl["typeClient"] =typeClient;
         cl["nomCl"]=nomCl;
         cl["prenomCl"]=prenomCl;
        cl["pere"]=pere;
             cl["mere"]=mere;
             cl["naissanceCl"]=naissanceCl;
             cl["lieuCl"]=lieuCl;
             cl["adresseCl"]=adresseCl;
             cl["natCl"]=natCl;
             cl["jobCl"]=jobCl;
             cl["telCl"]=telCl;
             cl["piece"]=piece;
             cl["numPiece"]=numPiece;
             cl["datePiece"]=datePiece;
         var help = "";
         if(typeClient == "1")
            help = "Respensable";
         else if(typeClient == "2")
            help = "Accompagnateur";
         else
            help ="Enfant"; 
        $('.trClient[id="'+clientEdit+'"] .nomTb').html(nomCl);
        $('.trClient[id="'+clientEdit+'"] .prenomTb').html(prenomCl);
        $('.trClient[id="'+clientEdit+'"] .naissTb').html(naissanceCl);
        $('.trClient[id="'+clientEdit+'"] .typeTb').html(help);
         //console.log(clients);
        $('#modalClientsEdit').modal('hide');
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
                type: 'get',
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
         
     
