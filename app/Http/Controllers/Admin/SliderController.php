<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = Slider::orderBy('id','DESC')->search()->paginate(5);
        return view('Admin.slider.index_slider',compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.slider.create_slider');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'slider_name'=>'required|unique:sliders|max:255',
            'slider_link'=>'required',
            'slider_image'=>'required',
            'slider_status'=>'required'
            
        ],
        [
            'slider_name.unique'=> 'O nome do controle deslizante já existe',
            'slider_name.required'=> '
            O nome do controle deslizante não pode ficar vazio
            ',
            'slider_link.required'=> '
            O link não pode ficar em branco',
            'slider_image.required'=> '
            A imagem não pode ficar em branco',
           
           
     
        ]
    );

        $slider = new Slider();
        $slider->slider_name = $data['slider_name'];
        $slider->slider_link = $data['slider_link'];
        $slider->slider_status = $data['slider_status'];
      
        if ($files=$request->file('slider_image')) {
           
            $imageName=time().'_'.$files->getClientOriginalName();
            $files->move(\public_path("uploads/img/"), $imageName);
            $slider->slider_image = $imageName;


             $slider->save();
             return redirect()->route('Slider.index')->with('status', 'Controle deslizante adicionado com sucesso');
        }
       
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
        $slider = Slider::find($id);
        return view('Admin.slider.edit_slider',compact('slider'));
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
        $data = $request->validate([
            'slider_name'=>'required',
            'slider_link'=>'required',
            'slider_status'=>'required'
            
        ],
        [
            'slider_name.required'=> '
            O nome do controle deslizante não pode ficar vazio',
            'slider_link.required'=> '
            O link não pode ficar em branco',
           
           
           
     
        ]
    );

        $slider = Slider::find($id);
        $slider->slider_name = $data['slider_name'];
        $slider->slider_link = $data['slider_link'];
        $slider->slider_status = $data['slider_status'];
      
        if($request->hasFile('slider_image')){
              
            $destination ='uploads/img/'.$slider->slider_image;
      
            if(File::exists($destination)){
                File::delete($destination);
            }else{
                 $file = $request->file("slider_image");
                  $imageName=time().'_'.$file->getClientOriginalName();
                  $file->move(\public_path("uploads/img/"),$imageName);
                  $slider->slider_image = $imageName;
            }
           
        }
         $slider->update(); 
            return redirect()->route('Slider.index')->with('status', 'Controle deslizante editado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Slider::find($id)->delete();
        return redirect()->back()->with('status','Controle deslizante excluído com sucesso!');
    }
}
