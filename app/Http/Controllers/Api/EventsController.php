<?php

namespace App\Http\Controllers\Api;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Exception;

class EventsController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('id', 'DESC')->get();
        return response()->json([
            'status' => true,
            'events' => $events,
        ],200);
    }

    public function show(Event $event)
    {
        return response()->json([
            'status' => true,
            'event' => $event,
        ],200);
    }

    public function store(Request $request){
        DB::beginTransaction();
        try{

           $event = Event::create([
                'title' => $request->title,
                'description' => $request->description,
                'date' => $request->date,
                'location' => $request->location,
            ]);

            DB::commit();

            return response()->json([
                'status' => true,
                'event' => $event,
                'messsage' => "Usuário cadastrado com sucesso!",
            ],201);

        }catch (Exception $e){
            DB::rollBack();
            return response()->json([
                'status' => false,
                'messsage' => "Usuário não cadastrado!",
            ],400);
        }
    }

    public function update(Request $request, Event $event)
    {

        DB::beginTransaction();
        try{

            $event->update([
                'title' => $request->title,
                'description' => $request->description,
                'date' => $request->date,
                'location' => $request->location,
            ]);

            DB::commit();

            return response()->json([
                'status' => true,
                'event' => $event,
                'messsage' => "Usuário editado com sucesso!",
            ],200);

        } catch (Exception $e){
            DB::rollBack();
            return response()->json([
                'status' => false,
                'messsage' => "Usuário não editado!",
            ],400);
        }
    }

    public function destroy(Event $event){
        try{

            $event->delete();
            return response()->json([
                'status' => true,
                'event' => $event,
                'messsage' => "Usuário apagado com sucesso!",
            ],200);

        } catch (Exception $e){
            return response()->json([
                'status' => false,
                'messsage' => "Usuário não apagado!",
            ],400);
        }
    }
}
