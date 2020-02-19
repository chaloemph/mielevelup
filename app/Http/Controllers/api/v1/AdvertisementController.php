<?php

namespace App\Http\Controllers\api\v1;

use App\Advertisement;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['success'=>Advertisement::all()], 200); 
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newAdvertisement = new Advertisement();
        $newAdvertisement->advertisementname = $request->advertisementname;
        $newAdvertisement->advertisementlink = $request->advertisementlink;
        $newAdvertisement->save();
        return response()->json(['success'=>$newAdvertisement], 200); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function show(Advertisement $advertisement)
    {
        return response()->json(['success'=>$advertisement], 200); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function edit(Advertisement $advertisement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advertisement $advertisement)
    {
        $advertisement->advertisementname = $request->advertisementname;
        $advertisement->advertisementlink = $request->advertisementlink;
        $advertisement->update();
        return response()->json(['success'=>$advertisement], 200); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertisement $advertisement)
    {
        $advertisement = Advertisement::find($advertisement->id);
        $advertisement->delete();
        return response()->json(['success'=>$advertisement], 200); 
    }
}
