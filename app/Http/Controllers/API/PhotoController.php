<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photo;
use App\Repositories\PhotoRepository;

class PhotoController extends Controller
{

    public function __construct(Photo $photo){
        $this->photo = $photo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {



        $photoRepository = new PhotoRepository($this->photo);


        $api =  ["test" => "Chegamos no index"];
        $query = Photo::all();

        

        //para teste de quebras de string na URN
        if($request->has('attr')) {$filter =  explode(':',$request->attr);}
        

        return response()->json($query, 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
 
 
        $image = $request->file('image');
        $image_urn = $image->store('images', 'public');

        $api =  ["test" => "Chegamos no store",
                        "request-1" => $request->name,
                        "request-2" => $image_urn];

 

        $save_data = $this->photo->create([
            'nome' => $api['request-1'],
            'image' => $api['request-2']
        ]);

        return response()->json($save_data, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $query = Photo::findOrFail($id);

        return response()->json($query, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $query = Photo::findOrFail($id);

        if($query == 0 && $query == null) {

                $query->delete();

        }

        $msg = ['msg' => 'Foto apagada com sucesso!'];

        return response()->json($msg, 201);

    }

    public function view() {

        $photos = $this->photo->with('comments')->all();

        return view('welcome', ['photos' => $photos]);
    }
}
