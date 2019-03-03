<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Slider;

class SliderController extends Controller
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
		$allslider=Slider::orderBy('created_at', 'desc')->paginate(10);
      return view('admin.slider.index')->with('allslider', $allslider);
	}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
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
      'link_url'=> 'required|url',
      'slider_image' => 'required',
      ]);

      $slider= new Slider;
      if ($request->slider_image) {
        $image = $request->file('slider_image');
        $name = uniqid().'-'.str_slug($request->name).'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/storage/slider');
        // $destinationPath = '/home/alrayantyping/public_html/storage/slider';
        $imagePath = $destinationPath. "/".  $name;
        if(!$image->move($destinationPath, $name))
        {
          echo "file not upload"; die();
        }
        $slider->slider_image = $name;
      }

       $slider->name=$request->input('name');
       $slider->caption=$request->input('caption');
       $slider->slider_image=$name;
       $slider->link_url= $request->input('link_url');
       $slider->status=1;
       $slider->save();

       $lastid=$slider->id;
       // $result=DB::table('latestissue')
       //        ->whereNotIn('id',$lastid)
       //        ->get();
       // $result->save();

       return redirect('/admin/slider')->with('success', 'Slider image Created');
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
      $slider = Slider::findOrFail($id);
      return view('admin.slider.edit')->with('slider', $slider);
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
      'link_url'=> 'required|url',
      // 'issue_image' => 'required',
      ]);

      $slider = Slider::findOrFail($id);
      if ($request->slider_image) {
        $image = $request->file('slider_image');
        $name = uniqid().'-'.str_slug($request->name).'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/storage/slider');
        // $destinationPath = '/home/alrayantyping/public_html/storage/slider';
        $imagePath = $destinationPath. "/".  $name;
        if(!$image->move($destinationPath, $name))
        {
          echo "file not upload"; die();
        }
        $slider->slider_image = $name;
      }

       $slider->name=$request->input('name');
       $slider->caption=$request->input('caption');
       $slider->link_url= $request->input('link_url');
       $slider->status=1;
       $slider->save();

       $lastid=$slider->id;
       // $result=DB::table('latestissue')
       //        ->whereNotIn('id',$lastid)
       //        ->get();
       // $result->save();

       return redirect('/admin/slider')->with('success', 'Slider image Created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Slider::destroy($id); 
        return redirect('/admin/slider')->with('success', 'Ads Has Been Deleted');
    }
}