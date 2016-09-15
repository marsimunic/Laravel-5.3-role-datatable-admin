<?php

namespace App\Http\Controllers;


use DB;
use App\User;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Http\Requests;


class DatatablesController extends Controller
{

  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
        $this->middleware('auth');
  }
 /**
 * Displays datatables front end view
 *
 * @return \Illuminate\View\View
 */
public function Index()
{
    return view('tabla1');
}

/**
 * Process datatables ajax request.
 *
 * @return \Illuminate\Http\JsonResponse
 */
public function Data()
{
    return Datatables::of(User::query())->make(true);
}

public function IndexTabla2()
{
        return view('tabla2');
}
public function  DataTabla2(Request $request)
{
  $users = DB::table('users')->select(['id', 'name', 'email', 'created_at', 'updated_at']);

  return Datatables::of($users)
            ->filter(function ($query) use ($request) {
                if ($request->has('name')) {
                    $query->where('name', 'like', "%{$request->get('name')}%");
                }

                if ($request->has('email')) {
                    $query->where('email', 'like', "%{$request->get('email')}%");
                }
            })->make(true);
  }
  public function getAddEditRemoveColumn()
    {
        return view('tabla3');
    }

   public function getAddEditRemoveColumnData()
   {
        $users = User::select(['id', 'name', 'email', 'password', 'created_at', 'updated_at']);
        return Datatables::of($users)
            ->addColumn('action', function ($user) {
                return '<a href="#edit-'.$user->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i>Edit</a>
                        <a href="#borrar-'.$user->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i>Borrar</a>';
            })
            ->editColumn('id', 'MSI - ID: {{$id}}')
            ->removeColumn('password')
            ->make(true);
  }
}