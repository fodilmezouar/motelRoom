<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chambres;

class RoomController extends Controller
{

    public function getRoom(){
        $output = array('data' => array());
        $rooms = Chambres::all();
        foreach ($rooms as $room)
        {
            $button_Action = '<!-- Single button -->
                  <div class="btn-group">
                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Action <span class="caret"></span>
                      </button>
                     <ul class="dropdown-menu">
                        <li><a type="button" data-toggle="modal" id="editMaterielsModalBtn" data-target="#editMaterielsModal" onclick="editMat('.$room->id.');"> <i class="ion-edit"></i> Editer</a></li>
                       <li><a type="button" data-toggle="modal" data-target="#removeMatModal" id="removeMaterielsModalBtn" onclick="removeMat('.$room->id.');"> <i class="ion-trash-a"></i> Supprimer</a></li>';

            if($room->etat=="Occupé"){
                $button_Action=$button_Action.'<li><a type="button" data-toggle="modal" data-target="#affecterMatModal" id="affecterMaterielsModalBtn" onclick="affecterMat('.$room->id.');"> <i class="fa fa-external-link"></i> Libérer</a></li>          
                     </ul>
                 </div>';
            }
            else{
                $button_Action=$button_Action.'</ul></div>';
            }
            $output['data'][] = array(
                $room->numero,
                $room->etage,
                $room->lits,
                $room->prix,
                $room->state,
                $button_Action
            );
        }
        return response()->json($output);
    }
    public function createRoom(Request $request){
        $Chambre = new Chambres();
        $Chambre->lits = $request->input('numLit');
        $Chambre->numero = strtoupper($request->input('RefRoom'));
        $Chambre->prix = $request->input('prix');
        $Chambre->etage = $request->input('etage');
        $Chambre->state = "Libre";
        $Chambre->save();
        $valid['success'] = array('success' => false, 'messages' => array());
        $valid['success'] = true;
        $valid['messages'] = "Ajout réussi";
        return response()->json($valid);
    }
    function editRoom($id,Request $request){
        $Chambre = Chambres::find($id);
        $Chambre->numero = strtoupper($request->input('refRoomEdit'));
        $Chambre->lits = $request->input('numEdit');
        $Chambre->prix = $request->input('prixEdit');
        $Chambre->etage = $request->input('etageEdit');
        $Chambre->save();
        return response()->json(array('success' => true,'message' => "Chambre mis à jour"));
    }
    function deleteRoom(Request $request){
        $id = $request->input('idRoom');
        Chambres::destroy($id);
        $valid['success'] = array('success' => false, 'messages' => array());
        $valid['success'] = true;
        $valid['messages'] = "Suppression réussi";
        return response()->json($valid);
    }
    public function getRom($id){
        $output = array('data' => array());
        $chambre = Chambres::find($id);

        $output['data'][] = array(
            $chambre->numero,
            $chambre->lits,
            $chambre->etage,
            $chambre->prix,
        );

        return response()->json($output);

    }

}
