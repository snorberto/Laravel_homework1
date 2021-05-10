<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImageGallery;

class ImageGalleryController extends Controller
{

    public function index()
    {
        $images = ImageGallery::latest()->paginate(6);
        return view('image-galleryMain', compact('images'));
    }

    public function showPictures()
    {
        $msg = ImageGallery::orderBy('id','asc')->get();
        return view('image-galleryView', ['pictures'=>$msg]);
    }

    public function store(Request $req)
    {
        $this->validate($req,[
            'title' => 'required',
            'image' => 'required|image|max:2048'
        ]);
        $image = $req->file('image');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $form_data = array(
            'title' => $req->title,
            'image' => $new_name
        );
        ImageGallery::create($form_data);
        return redirect('img_viewPic')->with('success', 'Data Added successfully.');
    }
    public function deletePicture($id)
    {
        $data = ImageGallery::findOrFail($id);
        $data->delete();
        return redirect('img_viewPic')->with('success', 'Data is successfully deleted');
    }

    public function edit($id)
    {
        $data = ImageGallery::findOrFail($id);
        return view('image-galleryEdit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')
        {
            $this->validate($request,[
                'title' => 'required',
                'image' => 'image|max:2048'
            ]);
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }
        else
        {
            $this->validate($request,[
                'title' => 'required',
            ]);
        }
        $form_data = array(
            'title' => $request->title,
            'image' => $image_name
        );
        ImageGallery::whereId($id)->update($form_data);
        return redirect('img_viewPic')->with('success', 'Data is successfully updated');
    }

}
