<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ShakaRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Item;
use App\Models\Category;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['item']   =  Item::all();
        return view('admin.item.index',$this->data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['categories']  = Category::all();
        return view('admin.item.create',$this->data);
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
          'category'                => 'required',
          'name'                    => 'required',
          'description'             => 'required',
          'price'                   => 'required',
          'image'                   => 'required|mimes:jpg,bmp,png,jpeg',
        ]);

         $image = $request->file('image');
        // $slug = str_slug($request->title);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename =  $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/item'))
            {
                mkdir('uploads/item', 0777 , true);
            }
            $image->move('uploads/item',$imagename);
        }else {
            $imagename = 'dafault.png';
        }

        $item                 = new Item();
        $item->category_id    = $request->category;
        $item->name           = $request->name;
        $item->description    = $request->description;
        $item->price          = $request->price;
        $item->image          = $imagename;
       if($item->save()){
         Session::flash('message','Item Successfully Added');
       }
       return redirect()->route('items.index');



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
        $this->data['item']            = Item::find($id);
        $this->data['categories']      = Category::all();
        return view('admin.item.edit',$this->data);
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
            'category'    => 'required',
            'name'        => 'required',
            'description' => 'required',
            'price'       => 'required',
            'image'       => 'required|mimes:jpeg,jpg,bmp,png',
        ]);

         $image = $request->file('image');
        // $slug = str_slug($request->title);
        $item = Item::find($id);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename =  $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/item'))
            {
                mkdir('uploads/item', 0777 , true);
            }
            unlink('uploads/item/'.$item->image);
            $image->move('uploads/item',$imagename);
        }else {
            $imagename = $item->image;
        }

        $item->category_id    = $request->category;
        $item->name           = $request->name;
        $item->description    = $request->description;
        $item->price          = $request->price;
        $item->image          = $imagename;
       if($item->save()){
         Session::flash('message','Item Successfully Update');
       }
       return redirect()->route('items.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $item = Item::find($id);
        if (file_exists('uploads/item/'.$item->image))
        {
            unlink('uploads/item/'.$item->image);
        }
       if($item->delete() ){
            Session::flash('message','Slider Successfully Deleted');
       }
        return redirect()->back();
    }
}
