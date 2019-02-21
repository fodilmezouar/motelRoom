     var total = 0;
     var idChambres = [];
     $("#submitReservation").on('click', function() {
     	var infosClient = "";
     	 if($('#nom').val())
     	 	infosClient+="<p><b>Nom : </b>"+$('#nom').val();
     	 else
     	 	infosClient+="<p><b>Nom : </b>Nom n'est pas encore saisi";
     	 if($('#prenom').val() && $('#nom').val())
     	 	infosClient+=" "+$('#prenom').val()+"</p>";
     	 else
     	 	infosClient+="</p>";
     	 if($('#tel').val())
     	 	infosClient+="<p><b>Tel : </b>"+$('#tel').val()+"</p>";
     	 else
     	 	infosClient+="<p><b>Tel : </b>Numéro de Tel n'est pas encore saisi";
     	 if($('#permis').val())
     	 	infosClient+="<p><b>Numéro de permis : </b>"+$('#permis').val()+"</p>";
     	 else if($('#carte').val())
     	 	infosClient+="<p><b>Numéro de carte : </b>"+$('#carte').val()+"</p>";
     	 else
     	 	infosClient+="<p>Ni Numéro de tel ni Numéro de la carte sont saisis</p>";
     	 if($('#adresse').val())
     	 	infosClient+="<p><b>Adresse : </b>"+$('#adresse').val()+"</p>";
     	 else
     	 	infosClient+="<p><b>Adresse : </b>Adresse n'est pas encore saisi";
     	 if($('#naissance').val())
     	 	infosClient+="<p><b>Date de naissance : </b>"+$('#naissance').val()+"</p>";
     	 else
     	 	infosClient+="<p><b>Date de naissance : </b>Date de naissance n'est pas encore saisi";
     $('#infosClientModal').html(infosClient);
     var trChambres = $("tr[class='active']");
     var somme = 0;
     for(var i = 0;i< trChambres.length ;i++){
     	var tr = trChambres[i];
     	idChambres[i] = tr.id; 
     	tr.classList.remove("active");
     	tr.firstElementChild.remove();
     	$("#bodyRecap").append(tr);
     	somme+=parseInt(tr.lastElementChild.innerHTML);
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
     $('#totalRec').html("Total : "+(somme * sejour)+" DA");
     total = somme * sejour;
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
                	"nom":$('#nom').val(),
                	"prenom":$('#prenom').val(),
                	"tel":$('#tel').val(),
                	"permis":$('#permis').val(),
                	"carte":$('#carte').val(),
                	"adresse":$('#adresse').val(),
                	"naissance":$('#naissance').val(),
                	"arr":$('#arr').val(),
                	"sor":$('#sor').val(),
                	"total":total,
                	"idChambres":idChambres,
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
         
     
