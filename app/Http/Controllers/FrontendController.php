<?php
namespace App\Http\Controllers;
use App\Models\Menu;
use App\Models\BlogCategory;
use App\Models\SocialLink;
use App\Models\Msw;
use App\Models\Pf;
use App\Models\Youtubevideo;
use App\Models\Catalog;
use View;
use Response;
use Illuminate\Support\Facades\Request;
use DB;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

    }
    public function index()
    {
        $activeMenu = 'Home';
        $title = 'Alledged Limited';
        return view('frontend.index',compact('title'));
    }

    public function sitemap(){
        $urls = Menu::get();
        $content = View::make('sitemap',compact('urls'));
        return Response::make($content)->header('Content-Type', 'text/xml;charset=utf-8');
    }
    public function show($slug){
        if($slug == 'products'){
            $menu = Menu::where('slug',$slug)->first();
            $title = $menu->name;
            return view('frontend.page.product-page',compact('title','menu'));
        }
        if($slug == 'customer'){
            $menu = Menu::where('slug',$slug)->first();
            $title = $menu->name;
            return view('frontend.page.customer',compact('title','menu'));
        }
        if($slug == 'achievement'){
            $menu = Menu::where('slug',$slug)->first();
            $title = $menu->name;
            return view('frontend.page.achievement',compact('title','menu'));
        }
        if($slug == 'career'){
            $menu = Menu::where('slug',$slug)->first();
            $title = $menu->name;
            return view('frontend.page.career',compact('title','menu'));
        }
        if($slug == 'contact-us'){
            $menu = Menu::where('slug',$slug)->first();
            $title = $menu->name;
            return view('frontend.page.contact-us',compact('title','menu'));
        }
    }
    public function galleryDetails($id){
        $title = 'Gallery Detail';
        $gallery = DB::table('galleries')->where('id',$id)->first();
        return view('frontend.page.gallery-details',compact('title','gallery'));
    }
    public function categoryPage($category, $slug){
        if ($category == 'services') {
            $menu = Menu::where('slug',$slug)->first();
            $title = $menu->name;
            return view('frontend.page.services',compact('title','menu'));
        }
        if ($category == 'business') {
            $menu = Menu::where('slug',$slug)->first();
            $title = $menu->name;
            return view('frontend.page.business',compact('title','menu'));
        }
        if ($category == 'about-us') {
            if($slug == 'company-overview'){
                $menu = Menu::where('slug',$slug)->first();
                $title = $menu->name;
                return view('frontend.page.company-overview',compact('title','menu'));
            }
            if($slug == 'greetings'){
                $menu = Menu::where('slug',$slug)->first();
                $title = $menu->name;
                return view('frontend.page.greetings',compact('title','menu'));
            }
            if($slug == 'our-management'){
                $menu = Menu::where('slug',$slug)->first();
                $title = $menu->name;
                return view('frontend.page.our-management',compact('title','menu'));
            }
            if($slug == 'gallery'){
                $menu = Menu::where('slug',$slug)->first();
                $title = $menu->name;
                return view('frontend.page.gallery',compact('title','menu'));
            }
        }


    }

    public function childPage($category,$subCategory,$slug){
        if($category == 'business'){
            $menu = Menu::where('slug',$slug)->first();
            $title = $menu->name;
            return view('frontend.page.business',compact('title','menu'));
        }
    }
    public function businessPage($category,$subCategory,$subSubCategory,$slug){
        if($category == 'business'){
            $menu = Menu::where('slug',$slug)->first();
            $title = $menu->name;
            return view('frontend.page.business',compact('title','menu'));
        }
    }

    public function productbycat()
    {
        $menu = Menu::where('name',"Products")->first();

        if (!isset($_GET["p"]) AND !isset($_GET["b"])) {
            $products = DB::table('blogs')->get();

            $pfs = Pf::get();
            $youtube_videos =Youtubevideo::get();
            $catalogs = Catalog::get();
            $products = DB::table('blogs')->get();
            $msw = Msw::orderBy('id')->first();
        }else{
            if(@$_GET["p"]){
                $p_id = \Illuminate\Support\Facades\Crypt::decryptString($_GET["p"]);
                $pfs = Pf::where("brand_id",$p_id)->get();
                $youtube_videos =Youtubevideo::where("brand_id",$p_id)->get();
                $catalogs = Catalog::where("brand_id",$p_id)->get();
                $products = DB::table('blogs')->where("category_id", $p_id)->get();
                $msw = Msw::where("brand_id",$p_id)->first();
            }
            if(@$_GET["b"]){
                $brand_id = \Illuminate\Support\Facades\Crypt::decryptString($_GET["b"]);
                $msw = Msw::where("brand_id",$brand_id)->first();
                $pfs = Pf::where("brand_id",$brand_id)->get();
                $youtube_videos =Youtubevideo::where("brand_id",$brand_id)->get();
                $catalogs = Catalog::where("brand_id",$brand_id)->get();
                $products = DB::table('blogs')->where("brand_id", $brand_id)->get();
            }

        }
        //dd($catalogs);
        return view("frontend.products.product",compact('products','menu','msw',"pfs","youtube_videos","catalogs"));
    }

    public function subCat()
    {
        $name = ($_GET["name"]);
        $r="";
        $rp="";
        $subid = BlogCategory::where('name',$name)->first()->id;
        if (@$_GET["l"] !=2) {
            $subsub = BlogCategory::where("parent",$subid)->get();
            if(count($subsub)>0){
                return ["rp"=>1,"data"=>$subsub];
            }else{
                return $r = ["rp"=>2,"data"=>route("pcat",["p"=>\Illuminate\Support\Facades\Crypt::encryptString($subid)])];
            }
        }else{
            $subsub = SocialLink::where('product_category',$subid)->get();
            if(count($subsub)>0){
                $sub = '<select><option value="0">Select</option>';
                $hdiv ='<div id="brand1" class="select-selected">Select</div><div id="brand11" class="select-items select-hide">';

                for ($i=0; $i <count($subsub) ; $i++) {
                    $r=route("pcat",["b"=>\Illuminate\Support\Facades\Crypt::encryptString($subsub[$i]->id)]);
                    $sub .='<option value='.$subsub[$i]->id.'>'.$subsub[$i]->name.'</option>';
                    $hdiv .='<a href='.$r.'><div>'.$subsub[$i]->name.'</div></a>';
                }
                $hdiv .="</div>";
                $sub .="</select>". $hdiv;
                return ["rp"=>1,"data"=>$sub];
            }else{


                return $r = ["rp"=>2,"data"=>route("pcat",["p"=>\Illuminate\Support\Facades\Crypt::encryptString($subid)])];
            }
        }

    }
}
