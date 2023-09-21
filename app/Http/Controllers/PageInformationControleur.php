<?php

namespace App\Http\Controllers;
use App\Models\Users;
use App\Models\Objets;
use App\Models\Message;
use App\Events\NewMessage;
use Illuminate\Http\Request;
use Auth ;

class PageInformationControleur extends Controller
{
    public function index( $id)
    {

        $objet=Objets::where('id' , $id)->with('user')->first() ;

        // $objet->visitor_count=$objet->visitor_count+1;
        $objet->increment('visitor_count');
        $userObjetCount = Objets::where('user_id', $objet->user->id)->count();
        return view('pageinformation',compact('objet','userObjetCount'));
    }


    public function indexMessage() {
        $distinctSenders = Message::where('reciever_id', session('personneId'))
        ->select('sender_id') // Select only the sender_id column
        ->distinct() // Get distinct sender_id values
        ->get();

        // dd($distinctSenders) ;

        $messageNumber = [] ;


        foreach( $distinctSenders as $sender ) {
            $messageCount = Message::where('reciever_id' , session('personneId'))
                                    ->where('sender_id' , $sender->sender_id )
                                    ->distinct('objet_id')
                                    ->count() ;
            $messageNumber[] = $messageCount ;
        }



        return view('indexMessage' , compact('distinctSenders' , 'messageNumber')) ;
    }


    public function messageObjet($id)
    {
        $objets = Message::where('reciever_id' , session('personneId'))->where('sender_id' , $id )->with('objet')->get() ;

        return view('messageObjet' , compact('objets' , 'id') ) ;
    }




    public function showMessage($sender_id , $objet_id) {

        // $messages = Message::where('sender_id' , $id )->orWhere('reciever_id' , $id)->dd() ;

        // foreach( $messages as $message ) {
        //     $message->statu = "read" ;
        //     $message->update() ;
        // }

        return view('message' , compact('sender_id' , 'objet_id')) ;

    }





    public function viewMessage($sender_id , $objet_id) {
        $messages = Message::where('reciever_id', session('personneId'))
        ->where('sender_id', $sender_id)
        ->where('objet_id', $objet_id)
        ->orWhere(function($query) use ($sender_id,$objet_id) {
            $query->where('sender_id', session('personneId'))
                ->where('reciever_id', $sender_id)
                ->where('objet_id', $objet_id);
        })
        ->with('sender', 'objet')
        ->get();
        // $messages = Message::where('sender_id' , $id )->orWhere('reciever_id' , $id)->dd() ;

        foreach( $messages as $message ) {
            $message->statu = "read" ;
            $message->update() ;
        }

        // return view('message' , compact('messages' , 'sender_id' , 'objet_id')) ;

        return response()->json(['messages' => $messages ]) ;
    }








    public function message(Request $req) {
        $req->validate([
            "content" => "required|string" ,
            "reciever_id" => "required" ,
            "objet_id" => "required" ,
        ]) ;

        $message = new Message ;
        $message->content = $req->content ;
        $message->sender_id =session('personneId') ;
        $message->reciever_id = $req->reciever_id  ;
        $message->objet_id = $req->objet_id  ;

        if ( $message->save() ) {
            return  redirect()->back()->with('success', 'Message envoyé avec succès!');
        }

    }



    public function repondre( Request $req ){

        $req->validate([
            'content'=> 'required|string|max:255'
        ]) ;

        $message = new Message ;
        $message->sender_id = session('personneId') ;
        $message->reciever_id = $req->reciever_id  ;
        $message->objet_id = $req->objet_id  ;
        $message->content =  $req->content ;

        if ( $message->save() ) {
            $message->load('sender') ;
            event( new NewMessage($message) ) ;
            return response()->json( [ 'alert' => "message envoyer" , 'message'=> 'envoyer !' ] ) ;

        }

        // return response()->json( [ 'alert' => "message envoyer" , 'message'=> "hi" ] ) ;
    }




    public function test(){
         return response()->json( ['ok' => 'ok' ] );
    }


}

