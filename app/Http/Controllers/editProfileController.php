<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;


class editProfile extends Controller
{

      public function update($id, UserFormRequest $request) {

        $user = user::findorFail($id);
        $user->gender = $request->get('gender')
        $user->save();

        return \Redirect::route('profile.blade.php', [$user->$id])->with('message', 'User has been successfully updated!')

      }









}

?>
