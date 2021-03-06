<?php

namespace App\Http\Controllers;

use App\Category;
use App\Feedback;
use App\File;
use Illuminate\Http\Request;
use DB;
use App\Advent;
use App\Language;
use App\TestUsers;
use Intervention\Image\Facades\Image as ImageInt;
use  Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
class categoryController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function data()
    {
        return  $Data = Advent:: leftJoin('categories', 'Advents.type_category', '=', 'categories.id')
            ->leftJoin('languages as one', 'Advents.language', '=', 'one.id')
            ->leftJoin('languages as two', 'Advents.language_translation', '=', 'two.id')
            ->leftJoin('users', 'Advents.user', '=', 'users.id');
    }
    public function data_select()
    {
        return   $Data=  $this->data()
            ->select('Advents.img as img','Advents.ad as ad','Advents.complexity as complexity',
                'Advents.great_announcement as Advents','Advents.price as price','Advents.status as status',
                'Advents.link as link',       'one.language  as  language',
                'two.language  as  translation','categories.category as category','users.name  as  user',
                'Advents.date_start as start',  'Advents.date_finish as finish' ,
                'Advents.extra as extra');
    }

    public function category($id=null, Request $request) {
        $categories = Category::get();
        $languages = Language::get();
        if($request->ajax() ){
            $lang= $request->lang;
            $lang_tran= $request->lang_tran;
            $cat =  $request->cat;
           $priceMin =  $request->priceMin;
            $priceMax =  $request->priceMax;
            $complex =  $request->complex;
            $data1 =  $request->data1;
            $data2 =  $request->data2;

            $Data=  $this->data()

               ->where('Advents.price', '>=',$priceMin)
                ->where('Advents.price', '<=',$priceMax)
                ->where('Advents.complexity', '=',$complex)
               ->when($lang, function ($language) use ($lang){
                    return $language ->where('one.id', $lang);
                })
                ->when($lang_tran, function ($language) use ($lang_tran){
                    return $language ->where('two.id', $lang_tran);
                })

               ->when($cat, function ($category) use ($cat){
                    return $category ->where('categories.id', $cat);
                })
               ->when($data1, function ($datepicker1) use ($data1) {
                   return $datepicker1->where('Advents.date_start', '>=', $data1);
               })
                ->when($id, function ($category) use ($id){
                return $category ->where('categories.id', $id);
            })
                ->when($data2, function ($datepicker2) use ($data2){
                    return $datepicker2 ->where('Advents.date_finish', '<=',$data2);
                })
                ->select('Advents.id  as  id', 'Advents.img as img', 'Advents.ad as ad', 'Advents.complexity as complexity',
                    'one.language  as  language', 'two.language  as  translation', 'categories.category as category', 'Advents.date_start as date_start',
                    'Advents.date_finish as date_finish',  'users.name as  user')->get();

             response()->json($Data);
            return view('categorys.products', ['languages' => $languages, 'categories' => $categories, 'Data' => $Data]);
        }
        else {
            $Data=  $this->data_select()
                ->when($id, function ($category) use ($id){
                    return $category ->where('categories.id', $id);
                })
                ->get();
            $type= Category::where('id', $id)->first();
         if($id==null)   return view('category', ['languages' => $languages, 'categories' => $categories, 'Data' => $Data]);
             else  return view('categorys/category_type', ['languages' => $languages, 'categories' => $categories, 'Data' => $Data, 'type'=>
             $type]);
        }
    }



    public function sel_user() {
        $id = Auth::id();
        $user = User::find($id);
        $categories = Category::get();
        $languages = Language::get();
        $Data=  $this->data_select()
            ->where('Advents.user', $id)
            ->get();
        return view('user_cp', ['languages' => $languages, 'categories' => $categories, 'Data' => $Data],compact('user'));
    }


    public function getDetails($id) {
        $data=  $this->data_select()
            ->where('Advents.id', $id)->get();
        $files = File::where('files.app', $id)->get();
        return view('categorys.details', ['data'=>$data, 'files'=>$files]);
    }
    public function create()
    {
        $categories = Category::get();
        $languages = Language::get();
        return view('create',['categories'=>$categories], ['languages'=>$languages]);
    }
    public function update($id)
    {
        $categories = Category::get();
        $languages = Language::get();
        $Data=  $this->data_select()
            ->where('Advents.id', $id)->get();
        $files = File::where('files.app', $id)->get();
       // dd($Data);
        return view('update', ['Data'=>$Data, 'categories'=>$categories, 'languages'=>$languages,
            'files'=>$files]);
    }


    public function upload(Request $request)
    {
        foreach ($request->file() as $file) {
            foreach ($file as $f) {
                $f->move(storage_path('images'), time().'_'.$f->getClientOriginalName());
            }
        }
        return "Успех";
    }


        public function store(Request $request)
        {
            $Advent = new Advent;
            $category = new Category;
            $language = new Language;

            if (request('language2') != NULL) {
                Language::insert(['language' => request('language2')]);
                $Language = Language:: where('language', request('language2'))->value('id');

            } else {
                $Language = Language:: where('language', request('language'))->value('id');
            }
            if (request('language_translation2') != NULL) {
                Language::insert(['language' => request('language_translation2')]);
                $language_translation = Language:: where('language', request('language_translation2'))->value('id');

            } else {
                $language_translation = Language:: where('language', request('language_translation'))->value('id');
            }

            if (request('type_category2') != NULL) {
                Category::insert(['category' => request('type_category2')]);
                $type_category = Category:: where('category', request('type_category2'))->value('id');

            } else {
                $type_category = Category:: where('category', request('type_category'))->value('id');
            }
            if (request('extra') == true){
                $extra=true;
                }
                else $extra=false;
            $filename ='l62egxS0UcVpRlWWZlOO.png';
            if (request('img') != NULL) {
                $path = public_path() . '\upload';
                $image = $request->file('img');

                foreach ($image as $f) {
                    $filename = str_random(20) . '.' . $f->getClientOriginalExtension() ?: 'png' || 'jpg';
                    $img = ImageInt::make($f);
                    $img->resize(200, 200)->save($path . '/' . $filename);
                    //dd($filename, $img);
                }
            }


            Advent::insert([
                'language' => $Language,
                'language_translation' => $language_translation,
                'type_category' => $type_category,
                'price' => request('price'),
                'complexity' => request('complexity'),
                'ad' => request('add'),
                'great_announcement' => request('great_announcement'),
                'date_start' => request('dateStart'),
                'date_finish' => request('dateFinish'),
                'user' =>request('user'),
                'img' =>$filename,
                'extra' =>$extra,
                'link' => request('link'),
                'created_at' => Carbon::now()->toDateTimeString()

            ]);

                    $id_now=Advent:: where('user',request('user'))
                        ->orderby('created_at', 'desc')
                        ->value('id');


            foreach ($request->file() as $file) {
                foreach ($file as $f) {

                    //$f->move(storage_path('images'), time() . '/' . $f->getClientOriginalName());
                    $f->move (public_path('storage') , time() . '/' . $f->getClientOriginalName());
                    $name=$f->getClientOriginalName();

                    File::insertGetId([
                        'app'=>$id_now,
                        'file'=> $name
                    ]);
                }
            }
            //return response()->download(storage_path('images'), $name);
            return redirect( request('user') .'/project');
        }

            public function up($id, Request $request)
            {
                $Advent = new Advent;
                $category = new Category;
                $language = new Language;

                if (request('language2') != NULL) {
                    Language::insert(['language' => request('language2')]);
                    $Language = Language:: where('language', request('language2'))->value('id');

                } else {
                    $Language = Language:: where('language', request('language'))->value('id');
                }
                if (request('language_translation2') != NULL) {
                    Language::insert(['language' => request('language_translation2')]);
                    $language_translation = Language:: where('language', request('language_translation2'))->value('id');

                } else {
                    $language_translation = Language:: where('language', request('language_translation'))->value('id');
                }

                if (request('type_category2') != NULL) {
                    Category::insert(['category' => request('type_category2')]);
                    $type_category = Category:: where('category', request('type_category2'))->value('id');

                } else {
                    $type_category = Category:: where('category', request('type_category'))->value('id');
                }
                if (request('extra') == true){
                    $extra=true;
                }
                else $extra=false;
                $filename ='l62egxS0UcVpRlWWZlOO.png';
                if (request('img') != NULL) {
                    $path = public_path() . '\upload';
                    $image = $request->file('img');

                    foreach ($image as $f) {
                        $filename = str_random(20) . '.' . $f->getClientOriginalExtension() ?: 'png' || 'jpg';
                        $img = ImageInt::make($f);
                        $img->resize(200, 200)->save($path . '/' . $filename);
                        //dd($filename, $img);
                    }
                }

              Advent::where('id', $id)
                    ->update([
                        'language' => $Language,
                        'language_translation' => $language_translation,
                        'type_category' => $type_category,
                        'price' => request('price'),
                        'complexity' => request('complexity'),
                        'ad' => request('add'),
                        'great_announcement' => request('great_announcement'),
                        'date_start' => request('dateStart'),
                        'date_finish' => request('dateFinish'),
                        'user' =>request('user'),
                        'img' =>$filename,
                        'extra' =>$extra,
                        'link' => request('link'),
                        'updated_at' => Carbon::now()->toDateTimeString()
                ]);

                $id_now=Advent:: where('user',request('user'))
                    ->orderby('updated_at', 'desc')
                    ->value('id');


                foreach ($request->file() as $file) {
                    foreach ($file as $f) {

                        $f->move(storage_path('images') . '_' . $f->getClientOriginalExtension()());
                        $name=storage_path('images') . '_' .$f->getClientOriginalName();

                        dd($name);
                        File::updateGetId([
                            'app'=>$id_now,
                            'file'=> $name
                        ]);
                    }

                }

                return redirect( request('user') .'/project');
            }
    public function del($id)
    {
            Advent::where('id', $id)->delete();
            return redirect('redactor');
    }

    public function feedback()
    {
        $Advent = new Advent;
        $feedback =new  Feedback;
        Feedback::insert([
            'user' =>request('user'),
            'application' =>  request('id_cat')
            ]);
    }

    }
