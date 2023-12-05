<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Contact;
use App\Models\CustomerReview;
use App\Models\Gallery;
use App\Models\Management;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $data['slider'] = Slider::latest()->get();
        $data['gallery'] = Gallery::latest()->take(6)->get();
        $data['about'] = About::first();
        $data['categories'] = Category::orderBy('name', 'asc')->take(15)->get();
        $data['products'] = Product::latest()->take(12)->get();
        $data['home_brand'] = Brand::latest()->take(12)->get();
        $data['home_firstproduct'] = Product::latest()->take(6)->get();
        return view('pages.web_index', $data);
    }

    public function categoryProducthome($id)
    {
        $categories = Category::where('parent_id', 0)->with('children')->latest()->get();
        return view('pages.web_index', compact('about','categories'));
    }


    public function about()
    {
        $about = About::first();
        return view('pages.about', compact('about'));
    }

    public function management()
    {
        $management = Management::latest()->get();
        return view('pages.management', compact('management'));
    }

    public function products()
    {
        $products = Product::latest()->paginate(16);
        $categories = Category::where('parent_id', 0)->with('children')->latest()->get();
        return view('pages.products', compact('products', 'categories'));
    }

    public function productDetails($slug)
    {
        $product = Product::with('images')->where('slug', $slug)->first();
        $related_product = Product::where('id', '!=', $product->id)->where('category_id', $product->category_id)->take(8)->get();
        return view('pages.product_single', compact('product', 'related_product'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required'
        ]);

        $products = Product::where("name", "LIKE", "%".$request->search."%")
                            ->orWhere("price", "LIKE", "%".$request->search."%")
                            ->orWhere("description", "LIKE", "%".$request->search."%")
                            ->paginate(16);

        $categories = Category::where('parent_id', 0)->with('children')->latest()->get();
        return view('pages.products', compact('products', 'categories'));
    }

    public function gallery()
    {
        $galleries = Gallery::latest()->get();
        return view('pages.gallery', compact('galleries'));
    }

    public function contact()
    {
        return view('pages.contact');
    }
    public function allBrand()
    {
        $all_brands = Brand::latest()->get();
        return view('pages.brand_page', compact('all_brands'));
    }

    public function categoryProduct($id)
    {
        $products = Product::where('category_id',$id)->paginate(16);
        $categories = Category::where('parent_id', 0)->with('children')->latest()->get();
        return view('pages.products', compact('products', 'categories'));
    }
    public function brandProduct($id)
    {
        $products = Product::where('brand_id',$id)->paginate(16);
        $categories = Category::where('parent_id', 0)->with('children')->latest()->get();
        return view('pages.products', compact('products', 'categories'));
    }

    public function sendMessage(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:contacts,email|regex:/(.+)@(.+)\.(.+)/i',
            'phone' => 'required|unique:contacts,phone|regex:/(01)[0-9]{9}/|digits:11|max:15',
            'message' => 'required',
        ]);

        $data = Contact::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);

        return response()->json($data);
    }
}
