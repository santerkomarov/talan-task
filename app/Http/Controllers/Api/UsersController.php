<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UsersCatalog;
use Illuminate\Http\Request;
use App\Http\Requests\ApiUsersCatalogRequest;

use App\Http\Resources\UsersCatalogResource;
use App\Http\Resources\UsersCatalogCollection;

use Illuminate\Support\Facades\Cache;

// use App\Actions\SaveJsonAction;
// use App\Actions\SaveXlsxAction;

class UsersController extends Controller
{
    // For method store()
    private $item;

    /**
     * Display a listing of the resource.
     * Cache, driver=file
     * Observer for cache: App\Observers\UsersCatalogObserver
     * @param Illuminate\Http\Request 
     * @return App\Http\Resources\UsersCatalogCollection
     */
    public function index(Request $request)
    {
        // Lifetime cache = 24 hour
        return new UsersCatalogCollection( Cache::remember('all-users', 60*60*24, function(){
            return UsersCatalog::all();
        }) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * Copy also in Json file. 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(ApiUsersCatalogRequest $request, SaveJsonAction $json, SaveXlsxAction $xlsx)
    public function store(ApiUsersCatalogRequest $request)
    {
        $newItem = UsersCatalog::create($request->validated());

        // return one just created item
        //?return $this->sendResponse(new UsersCatalogResource($newItem), 'New User created successfully.');
        return new UsersCatalogResource($newItem);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UsersCatalog  $usersCatalog
     * @return \Illuminate\Http\Response
     */
    public function show( $id )
    {
        $this->item = UsersCatalog::find($id);
        if ( $this->item ) {
            // Return one item, so it's should be Resource. If return many items so should be use Collection.
            // return response([ 'Item' => new UsersCatalogResource($item), 'message' => 'Retrieved successfully'], 200);
            return response([ 
                'Item' => Cache::remember('one-user', 60*60*24, function() {
                    return new UsersCatalogResource($this->item);
                }), 
                'message' => 'Retrieved successfully'], 200);
        }

        return response()->json(['message'=>'Nothing found'], 200);  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UsersCatalog  $usersCatalog
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UsersCatalog  $usersCatalog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = UsersCatalog::find($id);
        if ( $item ) {
            $item->update( [
                'fio'=> $request->fio,
                'email'=> $request->email,
                'phone'=> $request->phone,
                ] );
            return new UsersCatalogCollection($item);  
        } 
        return response()->json(['status'=>'failed','message'=>'Equipment #' .$id.' not found'], 200);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UsersCatalog  $usersCatalog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = UsersCatalog::find($id);
        if ( $item ) {
            $item->delete();
            return response()->json(['status'=>'success','message'=>'UsersCatalog item  was deleted'], 200);
        }
        return response()->json(['status'=>'failed','message'=>'UsersCatalog item ' . $id . ' not found'], 200);
    }

    /**
     * Search request parameter in all columns of "users-catalog" table.
     * 
     * @param  string  $word
     * @return App\Http\Resources\UsersCatalogCollection
     */

    public function search( $word = null )
    {
        if ( !$word ) {
            return response()->json(['message' => "Empty data"], 200);
        }
        $item = UsersCatalog::where("fio", "LIKE","%". $word . "%")
                            ->orWhere("email", "LIKE", "%". $word . "%")
                            ->orWhere("phone", "LIKE", "%". $word . "%")
                            ->get();
        return new UsersCatalogCollection($item);
    }
}
