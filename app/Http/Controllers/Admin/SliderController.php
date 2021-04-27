<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Carbon\Carbon;
use App\Http\Requests\ShakaRequest;
use Illuminate\Support\Facades\Session;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['slider']   = Slider::all();

        return view('admin.slider.index',$this->data);
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
         $this->validate($request,[
          'title'                => 'required',
          'sub_title'            => 'required',
          'image'                => 'required|mimes:jpg,bmp,png,jpeg',
        ]);

        $image = $request->file('image');
        // $slug = str_slug($request->title);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename =  $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/slider'))
            {
                mkdir('uploads/slider', 0777 , true);
            }
            $image->move('uploads/slider',$imagename);
        }else {
            $imagename = 'dafault.png';
        }

        $slider                = new Slider();
        $slider->title         = $request->title;
        $slider->sub_title     = $request->sub_title;
        $slider->image         = $imagename;
       if($slider->save()){
         Session::flash('message','Slider Successfully Added');
       }
       return redirect()->route('slider.index');

     // $formdata = $request->all();
     // if( Slider::create($formdata)){
     //  Session::flash('message', 'Course Added Successfully');
     // }
     
     // return redirect()->route('slider.index')->with('successMsg','Slider Successfully Saved');

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
        $this->data['value']      = Slider::findOrFail($id);
        return view('admin.slider.edit',$this->data);
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
         $this->validate($request,[
            'title'        => 'required',
            'sub_title'    => 'required',
            'image'        => 'required|mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        // $slug = str_slug($request->title);
        $slider = Slider::find($id);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/slider'))
            {
                mkdir('uploads/slider', 0777 , true);
            }
             unlink('uploads/slider/'.$slider->image);
            $image->move('uploads/slider',$imagename);
        }else {
            $imagename = $slider->image;
        }

        $slider->title            = $request->title;
        $slider->sub_title        = $request->sub_title;
        $slider->image            = $imagename;
        $slider->save();
        return redirect()->route('slider.index')->with('successMsg','Slider Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        if (file_exists('uploads/slider/'.$slider->image))
        {
            unlink('uploads/slider/'.$slider->image);
        }
       if($slider->delete() ){
            Session::flash('message','Slider Successfully Deleted');
       }
        return redirect()->back();
    }
}
