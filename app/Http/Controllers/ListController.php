<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\View;

use App\Models\Book;
use App\Http\Requests\createRequest;
use App\Http\Requests\updateRequest;
use Session;
use Illuminate\Pagination\LengthAwarePaginator;

class ListController extends Controller
{

    public function index( Request $request )
    {
        $result = Book::query();

        if (!empty($request->book_title)) {
            $result = $result->where('book_title', 'like', '%'.$request->book_title.'%');
        }

        if (!empty($request->description)) {
            $result = $result->where('description', 'like', '%'.$request->description.'%');
        }

        if (!empty($request->category)) {
            $result = $result->where('category', 'like', '%'.$request->category.'%');
        }

        if (!empty($request->keywords)) {
            $result = $result->where('keywords', 'like', '%'.$request->keywords.'%');
        }

        if (!empty($request->price)) {
            $result = $result->where('price', 'like', '%'.$request->price.'%');
        }

        if (!empty($request->publisher)) {
            $result = $result->where('publisher', 'like', '%'.$request->publisher.'%');
        }

        $table = $result->paginate(5);
        
        return view('index', compact('table'));
    }

    public function add( )
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(createRequest $request)
    {
        $table = new Book;

        $table->book_title          = $request->book_title;
        $table->description         = $request->description;
        $table->category            = $request->category;
        $table->keywords            = $request->keywords;
        $table->price               = $request->price;
        $table->stock               = $request->stock;
        $table->publisher           = $request->publisher;
        
        try{
            $table->save();
            return redirect()->route('home');
        }catch (Exception $e) {
            $response = ['code' => 500, 'data' => null, 'msg' => 'error', 'status' => true];
            return $response;
        }     

    }

    public function edit($id)
    {
        $table = Book::find($id);

        return view('edit', compact('table'));
    }

    public function update(updateRequest $request)
    {
        $table = Book::find($request->id);

        $table->book_title          = $request->book_title;
        $table->description         = $request->description;
        $table->category            = $request->category;
        $table->keywords            = $request->keywords;
        $table->price               = $request->price;
        $table->stock               = $request->stock;
        $table->publisher           = $request->publisher;      

        try{
            $table->save();
            return redirect()->route('home');
        }catch (Exception $e) {
            $response = ['code' => 500, 'data' => null, 'msg' => 'error', 'status' => true];
            return $response;
        }

    }

    public function delete($id)
    {
        if(Book::where('id',$id)->delete()){            
            return redirect()->route('home');
        }

    }

    public function view($id)
    {
        $table = Book::find($id);

        return view('view', compact('table'));
    }

    public function multipleDelete( Request $request){
        $id = $request->id;
        foreach ($id as $row) 
        {
            Book::where('id', $row)->delete();
        }
        return redirect()->route('home');
    }
}
