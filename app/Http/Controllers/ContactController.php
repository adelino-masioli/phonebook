<?php


namespace App\Http\Controllers;


use App\Contact;
use App\Phone;
use App\Services\LogService;
use Illuminate\Http\Request;


class ContactController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:contact-list|contact-create|contact-edit|contact-delete', ['only' => ['index','show']]);
         $this->middleware('permission:contact-create', ['only' => ['create','store']]);
         $this->middleware('permission:contact-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:contact-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $search = $request->get('search');
        if($search && $search != ''){
            $contacts = Contact::whereHas('phones', function($query) use ($search) {
                $query->where('phone', 'like', '%'.$search.'%');
            })
            ->orWhere('name', 'like', '%'.$search.'%')
            ->orWhere('email', 'like', '%'.$search.'%')
            ->paginate(5);
        }else{
            $contacts = Contact::orderBy('id')->paginate(5);
        }
        LogService::log(30, 'select', 'list all contacts');
        return view('contacts.index',compact('contacts', 'search'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        LogService::log(30, 'create', 'form create new contact');
        return view('contacts.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required',
        ]);


       $contact = Contact::create($request->all());


        if($contact->save()){
            $phones = $request->phone;
            Phone::create_phone($phones,$contact);
        }

        LogService::log(0, 'store', 'save new contact and phones of <b>' .$contact->name.'</b>');

        return redirect()->route('contacts.index')
                        ->with('success','Contact created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        LogService::log(30, 'show', 'show contact detail and phones of <b>' . $contact->name.'</b>');
        return view('contacts.show',compact('contact'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        LogService::log(30, 'edit', 'form edit contact and phones of <b>' . $contact->name.'</b>');
        return view('contacts.edit',compact('contact'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
         request()->validate([
            'name' => 'required',
            'email' => 'required',
        ]);


        $contact->update($request->all());

        $phones = $request->phone;
        Phone::create_phone($phones, $contact);

        LogService::log(0, 'update', 'update contact and phones of <b>' . $contact->name.'</b>');

        return redirect()->route('contacts.index')
                        ->with('success','Contact updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
    
        LogService::log(0, 'delete', 'destroy contact and phones of <b>' . $contact->name.'</b>');

        $contact->delete();
        
        return redirect()->route('contacts.index')
                        ->with('success','Contact deleted successfully');
    }
}