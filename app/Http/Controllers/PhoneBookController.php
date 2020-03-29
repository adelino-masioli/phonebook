<?php


namespace App\Http\Controllers;


use App\PhoneBook;
use App\Phone;
use Illuminate\Http\Request;


class PhoneBookController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:phonebook-list|phonebook-create|phonebook-edit|phonebook-delete', ['only' => ['index','show']]);
         $this->middleware('permission:phonebook-create', ['only' => ['create','store']]);
         $this->middleware('permission:phonebook-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:phonebook-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phonebooks = PhoneBook::latest()->paginate(5);
        return view('phonebooks.index',compact('phonebooks'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('phonebooks.create');
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


        $phone_book = PhoneBook::create($request->all());


        if($phone_book->save()){
            $phones = $request->phone;
            Phone::create_phone($phones, $phone_book);
        }

        return redirect()->route('phonebooks.index')
                        ->with('success','Contact created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\PhoneBook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function show(PhoneBook $phonebook)
    {
        return view('phonebooks.show',compact('phonebook'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PhoneBook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function edit(PhoneBook $phonebook)
    {
        return view('phonebooks.edit',compact('phonebook'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PhoneBook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PhoneBook $phonebook)
    {
         request()->validate([
            'name' => 'required',
            'email' => 'required',
        ]);


        $phonebook->update($request->all());

        $phones = $request->phone;
        Phone::create_phone($phones, $phonebook);

        return redirect()->route('phonebooks.index')
                        ->with('success','Contact updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PhoneBook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function destroy(PhoneBook $phonebook)
    {
        $phonebook->delete();


        return redirect()->route('phonebooks.index')
                        ->with('success','Contact deleted successfully');
    }
}