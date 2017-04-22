<?php
namespace App\Http\Controllers;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\User;
use URL;
use Validator;
use App\Http\Requests\StoreBlogPost;
use App\Http\Validations\Validations;
use App\Http\Validations\BaseForm;
use Storage;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('check.login');
    }
    public function index(Request $request)
    {
        if ($request->ajax() && $search =  $request->search) {
            $account = User::where('name', 'like', "%$search%")
                ->orwhere('email', 'like', "%$search%")
                ->orwhere('id', "$search")->paginate(10);
            $account->withPath("?search=".urlencode("$search"));

            return view('admin.account.search')->with('account', $account);
        }
        if ($request->ajax()) {
            $account = User::paginate(10);
            session()->put('url', URL::full());
            $account->withPath("");

            return view('admin.account.search')->with('account', $account);
        } elseif ($search =  $request->search) {
            $account = User::where('name', 'like', "%$search%")
                ->orwhere('email', 'like', "%$search%")
                ->orwhere('id', "$search")->paginate(10);
            $account->withPath("?search=".urlencode("$search"));

             return view('admin.account.index')->with('account', $account);
        } else {
            $account = User::paginate(10);
            session()->put('url', URL::full());
            $account->withPath("");

            return view('admin.account.index')->with('account', $account);
        }
    }

       
        

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.account.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Storage::disk('public')->put('avatars', $request->file('avata'));

        $use = new User;
        $use->name = $request->name;
        $use->email = $request->email;
        $use->avata = $request->file('avata')->hashName();
        $use->sex = $request->sex;
        $use->status = 0;
        $use->password = bcrypt($request->password);
        $use->save();
      
        return redirect('admin/manager');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $use = User::find($id);

        return view('admin.account.show')->with('use', $use);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $use = User::find($id);
        $use->url = session()->get('url');

        return view('admin.account.edit')->with('use', $use);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'required' => 'The :attribute khong duoc bo trong',
        ];
         $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required',], $messages);

        if ($validator->fails()) {
            return redirect("admin/manager/$id/edit")
                        ->withErrors($validator)
                        ->withInput();
        }
        $use = User::find($id);
        $use->name = $request->name;
        $use->email = $request->email;
        //$use->password = hash('sha256', $request->email);
        $use->save();
        $request->session()->flash('status', 'Task was successful!');
        return redirect($request->url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (User::destroy($id)) {
            return redirect('admin/manager');
        }
    }
}
