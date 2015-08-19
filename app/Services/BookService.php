<?php

namespace App\Services;
use App\Models\Book;

class BookService {
    private $api = array();

    private $status_failed = 'failed';
    private $status_success = 'success';
    private $message_failed = 'something went wrong';
    private $message_success = 'the process is succeed';

    public function __construct(){
        $this->api['message'] = $this->message_failed;
        $this->api['result'] = null;
        $this->api['status'] = $this->status_failed;
    }
    public function allBooks(){
        $books = Book::all();
        if($books != '[]'){
            $all_book = null;
            foreach($books as $book)
            {
                $all_book[] = [
                    'id' => encode($book->id),
                    'name' => $book->name,
                    'author' => $book->author,
                    'stock' => $book->stock
                ];
            }
            $this->api['status'] = $this->status_success;
            $this->api['message'] = $this->message_success;
            $this->api['result'] = $all_book;
        }
        return $this->api;
    }
    public function createBook(array $data){
        $data['user_id'] = \Auth::user()->id;
        $create = Book::create($data);
        if($create){
            $this->api['status'] = $this->status_success;
            $this->api['message'] = $this->message_success;
        }
        return $this->api;
    }
    public function getBookById($id){
        $decoded_id = decode($id);
        $find = Book::find($decoded_id);
        if(!is_null($find)){
            $this->api['status'] = $this->status_success;
            $this->api['message'] = $this->message_success;
            $this->api['result'] = [
                'id' => $id,
                'name' => $find->name,
                'author' => $find->author,
                'stock' => $find->stock
            ];
        }
        return $this->api;
    }
    public function editBook(array $data, $id){
        $find = Book::find(decode($id));
        if(!is_null($find)){
            $update = $find->update($data);
            if($update){
                $this->api['status'] = $this->status_success;
                $this->api['message'] = $this->message_success;
            }
        }
        return $this->api;
    }
    public function deleteBook($id){
        $find = Book::find(decode($id));
        if(!is_null($find)){
            $delete = $find->delete();
            if($delete){
                $this->api['status'] = $this->status_success;
                $this->api['message'] = $this->message_success;
            }
        }
        return $this->api;
    }
} 