<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\BookService;
use App\Http\Requests\Book\CreateBookRequest;
use App\Http\Requests\Book\EditBookRequest;
use Session;

class BookController extends BaseController{
    private $book;
    public function __construct(BookService $book){
        $this->middleware('auth');
        $this->book = $book;
    }
    public function getIndex(){
        $data = $this->book->allBooks();
        return view('book.index', compact('data'));
    }
    public function getCreate(){
        return view('book.create');
    }
    public function postCreate(CreateBookRequest $request){
        $input = $request->except('_token');
        $data = $this->book->createBook($input);
        if($data['status'] == 'success'){
            Session::flash('success-message', 'Berhasil menambahkan buku');
        }
        else{
            Session::flash('error-message', 'Maaf terjadi kesalahan dalam menambahkan buku');
        }
        return redirect()->action('BookController@getIndex');
    }
    public function getEditBook($id){
        $data = $this->book->getBookById($id);
        if($data['status'] == 'failed'){
            Session::flash('error-message', 'Tidak ditemukan data buku yang anda cari');
            return redirect()->back();
        }
        return view('book.edit', compact('data'));
    }
    public function postUpdateBook(EditBookRequest $request, $id){
        $input = $request->except('_token');
        $data = $this->book->editBook($input, $id);
        if($data['status'] == 'success'){
            Session::flash('success-message', 'Berhasil memperbaharui detil buku');
            return redirect()->action('BookController@getIndex');
        }
        else{
            Session::flash('error-message', 'Gagal memperbaharui detil buku');
            return redirect()->back();
        }
    }
    public function postDeleteBook($id){
        $data = $this->book->deleteBook($id);
        if($data['status'] == 'success'){
            Session::flash('success-message', 'Penghapusan buku berhasil dilakukan');
        }
        else{
            Session::flash('error-message', 'Penghapusan buku gagal dilakukan');
        }
        return redirect()->back();
    }
}