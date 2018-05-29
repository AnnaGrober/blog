<?php

namespace App\Http\Controllers;

use App\Category;
use App\Feedback;
use Illuminate\Http\Request;
use DB;
use App\Categorypage;
use App\Language;
use App\TestUsers;
use Intervention\Image\Facades\Image as ImageInt;
class categoryController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function data()
    {
        return  $Data = Categorypage:: leftJoin('categories', 'categoryPages.type_category', '=', 'categories.id')
            ->leftJoin('languages as one', 'categoryPages.language', '=', 'one.id')
            ->leftJoin('languages as two', 'categoryPages.language_translation', '=', 'two.id')
            ->leftJoin('users', 'categoryPages.user', '=', 'users.id');
    }
    public function data_select()
    {
        return   $Data=  $this->data()
            ->select('categorypages.img as img','categorypages.ad as ad','categorypages.complexity as complexity',
                'categorypages.category_pages as categoryPages','categorypages.price as price', 'categorypages.ad as ad',
                'categorypages.link as link',    'categorypages.category_pages as pages',   'one.language  as  language',
                'two.language  as  translation','categories.category as category','users.name  as  user',
                'categorypages.date_start as start',  'categorypages.date_finish as finish' , 'categorypages.id as id');
    }

    public function category(Request $request) {
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
               ->where('categoryPages.price', '>=',$priceMin)
                ->where('categoryPages.price', '<=',$priceMax)
                ->where('categoryPages.complexity', '=',$complex)
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
                   return $datepicker1->where('categoryPages.date_start', '>=', $data1);
               })
                ->when($data2, function ($datepicker2) use ($data2){
                    return $datepicker2 ->where('categoryPages.date_finish', '<=',$data2);
                })
                ->select('categoryPages.id  as  id', 'categoryPages.img as img', 'categoryPages.ad as ad', 'categoryPages.complexity as complexity',
                    'one.language  as  language', 'two.language  as  translation', 'categories.category as category', 'categoryPages.date_start as date_start',
                    'categoryPages.date_finish as date_finish',  'users.name as  user')->get();

             response()->json($Data);
            return view('categorys.products', ['languages' => $languages, 'categories' => $categories, 'Data' => $Data]);
        }
        else {
            $Data=  $this->data_select()
                ->get();
            return view('category', ['languages' => $languages, 'categories' => $categories, 'Data' => $Data]);
        }
    }


    public function sel_user() {
        $id = Auth::id();
        $user = User::find($id);
        $categories = Category::get();
        $languages = Language::get();
        $Data=  $this->data_select()
            ->where('categorypages.user', $id)
            ->get();
        return view('user_cp', ['languages' => $languages, 'categories' => $categories, 'Data' => $Data],compact('user'));
    }


    public function getDetails($id) {
        $data=  $this->data_select()
            ->where('categorypages.id', $id)->get();
        return view('categorys.details', ['data'=>$data]);
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
            ->where('categorypages.id', $id)->get();
       // dd($Data);
        return view('update', ['Data'=>$Data, 'categories'=>$categories, 'languages'=>$languages]);
    }


        public function store(Request $request)
        {
            $categoryPage = new Categorypage;
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
            $filename ='l62egxS0UcVpRlWWZlOO.png';
            if (request('img') != NULL) {
                $path = public_path() . '\upload';
                $file = $request->file('file');

                foreach ($file as $f) {
                    $filename = str_random(20) . '.' . $f->getClientOriginalExtension() ?: 'png' || 'jpg';
                    $img = ImageInt::make($f);
                    $img->resize(200, 200)->save($path . '/' . $filename);
                    //dd($filename, $img);
                }
            }
            Categorypage::insert([
                'language' => $Language,
                'language_translation' => $language_translation,
                'type_category' => $type_category,
                'price' => request('price'),
                'complexity' => request('complexity'),
                'ad' => request('add'),
                'category_pages' => request('category_pages'),
                'date_start' => request('dateStart'),
                'date_finish' => request('dateFinish'),
                'user' =>request('user'),
                'img' =>$filename,
                'link' => request('link'),

            ]);
            return redirect('category');
        }

            public function up($id)
            {
                $categoryPage = new Categorypage;
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

              Categorypage::where('id', $id)
                    ->update([
                    'language' => $Language,
                    'language_translation' => $language_translation,
                    'type_category' => $type_category,
                    'price' => request('price'),
                    'complexity' => request('complexity'),
                    'ad' => request('add'),
                    'category_pages' => request('category_pages'),
                    'date_start' => request('dateStart'),
                    'date_finish' => request('dateFinish'),
                        'user' =>request('user'),
                    /*'lmg' =>request('img'),*/
                    'link' => request('link'),
                ]);
                return redirect('category');
            }
    public function del($id)
    {
            Categorypage::where('id', $id)->delete();
            return redirect('redactor');
    }

    public function feedback()
    {
        $categoryPage = new Categorypage;
        $feedback =new  Feedback;
        Feedback::insert([
            'user' =>request('user'),
            'application' =>  request('id_cat')
            ]);
    }

    }
