<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Offer;

class OfferController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $allslider=Offer::orderBy('created_at', 'desc')->paginate(10);
      return view('admin.offer.index')->with('allslider', $allslider);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.offer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
      'name'=> 'required',
      // 'link_url'=> 'required|url',
      'offer_image' => 'required',
      ]);

      $slider= new Offer;
      if ($request->offer_image) {
        $image = $request->file('offer_image');
        $name = uniqid().'-'.str_slug($request->name).'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/storage/offer');
        // $destinationPath = '/home/alrayantyping/public_html/storage/offer';
        $imagePath = $destinationPath. "/".  $name;
        if(!$image->move($destinationPath, $name))
        {
          echo "file not upload"; die();
        }
        $slider->offer_image = $name;
      }

       $slider->name=$request->input('name');
       // $slider->caption=$request->input('caption');
       $slider->offer_image=$name;
       // $slider->link_url= $request->input('link_url');
       $slider->status=1;
       $slider->save();

       $lastid=$slider->id;
       // $result=DB::table('latestissue')
       //        ->whereNotIn('id',$lastid)
       //        ->get();
       // $result->save();

       return redirect('/admin/offer')->with('success', 'Offer image Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $slider = Offer::findOrFail($id);
      return view('admin.offer.edit')->with('slider', $slider);
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
      $this->validate($request, [
      'name'=> 'required',
      // 'link_url'=> 'required|url',
      // 'issue_image' => 'required',
      ]);

      $slider = Offer::findOrFail($id);
      if ($request->offer_image) {
        $image = $request->file('offer_image');
        $name = uniqid().'-'.str_slug($request->name).'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/storage/offer');
        // $destinationPath = '/home/alrayantyping/public_html/storage/offer';
        $imagePath = $destinationPath. "/".  $name;
        if(!$image->move($destinationPath, $name))
        {
          echo "file not upload"; die();
        }
        $slider->offer_image = $name;
      }

       $slider->name=$request->input('name');
       // $slider->caption=$request->input('caption');
       // $slider->link_url= $request->input('link_url');
       $slider->status=1;
       $slider->save();

       $lastid=$slider->id;
       // $result=DB::table('latestissue')
       //        ->whereNotIn('id',$lastid)
       //        ->get();
       // $result->save();

       return redirect('/admin/offer')->with('success', 'Offer image Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Offer::destroy($id); 
        return redirect('/admin/offer')->with('success', 'Ads Has Been Deleted');
    }
}
