<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Post;
use Mail;
use Session;

class PageController extends Controller
{
    public function getIndex() {
    	$posts = Post::orderBy('created_at', 'desc')->paginate(5);
        // $posts = Post::orderBy('created_at', 'desc')->paginate(2);
        // $posts = Post::paginate(4);
    	return view('pages.welcome')->withPosts($posts);
    }

    public function getAbout() {
    	return view('pages.about');
    }

    public function getContact() {
    	return view('pages.contact');
    }
    public function postContact(Request $request){
        $this-> validate($request, [
            'email' => 'required | email',
            'subject' => 'min:3',
            'message' => 'min:10'
        ]);
        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
        );

        //syntax for sending email
        // Mail::send('view', $data, function(){
        //     mial header,
        //     CC, 
        //     Subject,
        //     body
        // });

        Mail::send('emails.contact', $data, function($message) use ($data){
            $message -> from($data['email']);
            $message -> to('talalanwer2424@gmail.com');
            $message -> subject($data['subject']);
        });
        Session::flash('success', 'You contact is successfully submitted!');

        return redirect()->route('main');
    }
}
