<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notifaciton = array(
            'message'=>'Çıkış İşlemi Başarılı'  ,
            'alert-type'=>'success'
        );

        return redirect('/login')->with($notifaciton);
    }//End


    public function Profile()
    {
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.admin_profile_view',compact('adminData'));
    }//End

    public function EditProfile ()
    {
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('admin.admin_profile_edit',compact('editData'));
    }//End

    public function StoreProfile(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;
        if ($request->file('profile_image'))
        {
            $file = $request->file('profile_image');

            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/admin_images/'),$filename);
            if (\File::exists($file))
            {
                \File::delete($file);
            }
            $data['profile_image'] = $filename;

        }
        $data->save();
        $notifaciton = array(
          'message'=>'Profil Güncelleme Başarılı'  ,
          'alert-type'=>'success'
        );
        return redirect()->route('admin.profile')->with($notifaciton);
    }

    public function ChangePassword ()
    {
        return view('admin.admin_change_password');
    }//End

    public function UpdatePassword (Request $request)
    {
        $validateData = $request->validate([
           'oldpassword'=>'required',
           'newpassword'=>'required',
           'confirm_password'=>'required|same:newpassword',
        ],[
            'oldpassword.required'=>'Lütfen mevcut şifrenizi giriniz !',
            'newpassword.required'=>'Lütfen yeni şifrenizi giriniz!',
            'confirm_password.required'=>'Yeni şifre tekrar alanı boş bırakılamaz',
            'confirm_password.same'=>'Yeni şifreler birbiriyle uyuşmuyor !'

        ]);
        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword,$hashedPassword)){
            $users = User::find(Auth::id());
            $users->password =bcrypt($request->newpassword);
            $users->save();
            session()->flash('message','Şifre Değiştirme İşlemi Başarılı');
            return redirect()->back();
        }
        else{
            session()->flash('message','Lütfen mevcut şifrenizi kontrol ediniz');
            return redirect()->back();
        }
    }//End

}
