<?php

namespace App\Http\Controllers;

use App\Dorm;
use App\User;
use App\Image;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DormController extends Controller
{
    function __construct()
    {
        $this->middleware('auth')->except('showSearchForm', 'doSearchProcess');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->isAdministrator()) {
            return view('dorms.index');
        }
        else {
            $dorm = Dorm::where('Owner','=',auth()->user()->ID)->first();
            return view('dorms.show', ['data'=>$dorm]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showCreateForm()
    {
        return view('dorms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function doSaveProcess(Request $request)
    {
        $user = new User();
        $user->Username = User::GenerateUsernameForDormitoryUser($request->Name);
        $user->Password = "1234";
        $user->EmailAddress = "default@email.com";
        $user->Name = $request->Owner;
        $user->save();

        $temp = json_decode('['.implode(',',$request->Amenities).']',true);
        $amenities = json_encode($temp);

        $dorm = new Dorm();
        $dorm->Name = $request->Name;
        $dorm->Owner = $user->ID;
        $dorm->AddressLine1 = $request->AddressLine1;
        $dorm->AddressLine2 = $request->AddressLine2;
        $dorm->City = $request->City;
        $dorm->Zip = $request->Zip;
        $dorm->Rate = $request->Rate;
        $dorm->Rooms = $request->Rooms;
        $dorm->MobileNumber = $request->MobileNumber;
        $dorm->LandLineNumber = $request->LandLineNumber;
        $dorm->BusinessPermit = $request->BusinessPermit;
        $dorm->Latitude = $request->Latitude;
        $dorm->Longitude = $request->Longitude;
        $dorm->Amenities = $amenities;
        $dorm->save();

        $this->validate($request, [
        'filename' => 'required',
        'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        return redirect()->to('/dorm');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dorm  $Dorm
     * @return \Illuminate\Http\Response
     */
    public function showDormInformation($Dorm)
    {
        $temp = explode('-',$Dorm);
        $dorm = new Dorm();
        $dorm = $dorm->where('ID','=',$temp[0])->first();
        return view('dorms.show', ['data'=>$dorm]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dorm  $Dorm
     * @return \Illuminate\Http\Response
     */
    public function showUpdateForm($Dorm)
    {
        $temp = explode('-',$Dorm);
        $dorm = new Dorm();
        $dorm = $dorm->where('ID','=',$temp[0])->first();
        return view('dorms.update', ['data'=>$dorm]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dorm  $Dorm
     * @return \Illuminate\Http\Response
     */
    public function doUpdateProcess(Request $request, Dorm $dorm)
    {
        $temp = json_decode('['.implode(',',$request->Amenities).']',true);
        $amenities = json_encode($temp);

        $dorm->AddressLine1 = $request->AddressLine1;
        $dorm->AddressLine2 = $request->AddressLine2;
        $dorm->City = $request->City;
        $dorm->Zip = $request->Zip;
        $dorm->Rate = $request->Rate;
        $dorm->Rooms = $request->Rooms;
        $dorm->MobileNumber = $request->MobileNumber;
        $dorm->LandLineNumber = $request->LandLineNumber;
        $dorm->BusinessPermit = $request->BusinessPermit;
        $dorm->Latitude = $request->Latitude;
        $dorm->Longitude = $request->Longitude;
        $dorm->Amenities = $amenities;
        $dorm->save();

        return redirect()->to('/dorm');
    }

    /**
     * Toggles the Status of the specified resource from storage.
     *
     * @param  \App\Dorm  $Dorm
     * @return \Illuminate\Http\Response
     */
    public function toggleStatus(Dorm $Dorm)
    {
        //
    }

    /**
     * Fetches all the records from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getAllDormData(Request $request)
    {
        $data = array();
        $dorms = Dorm::all();
        foreach($dorms as $dorm) {
            $entry = array();
            $entry['ID'] = $dorm->ID;
            $entry['Name'] = $dorm->Name;
            $entry['Owner'] = $dorm->getOwner()->Name;
            $entry['Address'] = sprintf("%s, %s, %s", $dorm->AddressLine1, $dorm->AddressLine2, $dorm->City);
            $entry['Mobile'] = $dorm->MobileNumber;
            $entry['Rooms'] = $dorm->Rooms;

            array_push($data, $entry);
        }
        return response()->json(['aaData'=>$data]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dorm  $dorm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dorm $dorm)
    {
        //
    }

    public function showSearchForm() {
        return view('search');
    }

    public function testAmenities(Request $request) {
        dd($request);
    }

    public function uploadImage(Request $request)
    {

        $this->validate($request, [
            'Images' => 'required',
            'Images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

//         if ($request->hasFile('Images')) {
//             $image = $request->file('Images');
//             $name = time().'.'.$image->getClientOriginalExtension();
//             $destinationPath = public_path('/images');
//             $image->move($destinationPath, $name);
//             $this->save();

// //            return back()->with('success','Image Upload successfully');
//         }

        if($request->hasfile('Images'))
         {

            foreach($request->file('Images') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/', $name);  
                $data[] = $name;  
            }
         }

         $image= new Image();
         $image->Path=json_encode($data);
         $image->Type='j';
         $image->ReferenceID=1;
         // dd($image->Path);
        
        $image->save();
        return back()->with('success', 'Your images has been successfully');


        // $data = array();
        // $data['error'] = "";
        // $data['errorkeys'] = [];
        // $data['initialPreview'] = [];
        // $data['initialPreviewConfig'] = [];
        // $data['initialPreviewThumbTags'] = [];
        // $data['append'] = true;
        // return response()->json($data);
    }

    public function doSearchProcess(Request $request)
    {
        $search = strtolower($request->Search);
        $data = array();
        $dorms = Dorm::all();
        if(strlen($search)>0) {
            foreach($dorms as $dorm) {
                if (strpos(strtolower($dorm->AddressLine1), $search) !== false) {
                    array_push($data, $dorm);
                }
                else if (strpos(strtolower($dorm->AddressLine2), $search) !== false) {
                    array_push($data, $dorm);
                }
                else if (strpos(strtolower($dorm->City), $search) !== false) {
                    array_push($data, $dorm);
                }
                else if (strpos(strtolower($dorm->Name), $search) !== false) {
                    array_push($data, $dorm);
                }
            }
        }
        return view('search',['data'=>$data,'search'=>$search]);
    }

    public function meUpload()
    {
        return view('welcome');
    }

    public function doUpload(Request $request, $dorm)
    {
        // $path = $request->file('avatar')->store('avatars');

        // return $path;

            $this->validate($request, [
            'filename' => 'required',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if($request->hasfile('filename'))
         {

            foreach($request->file('filename') as $image)
            {
                $name=$image->getClientOriginalName();
                $count = count(File::allFiles(public_path()."/uploads/2"));
                $count++;
                $image->move(public_path().'/uploads/'.$dorm.'/', $count.".".$image->getClientOriginalExtension());
                $data[] = $name;  
            }
         }

         $image= new Image();
         $image->Path=json_encode($data);
         $image->Type='j';
         $image->ReferenceID=1;
         // dd($image->Path);
        
        $image->save();

        return back()->with('success', 'Your images has been successfully');
    }

    public function ajaxData(Request $request)
    {
        $query = $request->get('query','');        

        $posts = Dorm::where('Name','LIKE','%'.$query.'%')->get();        

        return response()->json($posts);
    }
}
