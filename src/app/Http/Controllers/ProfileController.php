<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Profile;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller
{
    public function show()
    {
        $user = User::with('address', 'profile')->find(auth()->id());
        return view('mypage', compact('user'));
    }

    public function update(Request $request)
    {
        $user = $request->user();
        $address = $user->address;
        $profile = $user->profile;

        // ユーザー情報の更新
        $user->update($request->only(['name']));

        // プロフィール画像の更新
        if ($request->hasFile('profile_image')) {
            $profileImage = $request->file('profile_image');
            $profileImagePath = $profileImage->store('profile_images', 'public');
            if ($profile) {
                // 古い画像を削除
                if ($profile->profile_image) {
                    Storage::disk('public')->delete($profile->profile_image);
                }
                $profile->profile_image = $profileImagePath;
            } else {
                $profile = new Profile([
                    'user_id' => $user->id,
                    'profile_image' => $profileImagePath,
                ]);
            }
        }

        if ($profile) {
            $profile->save();
        } else {
            $user->profile()->save($profile);
        }

        // 住所情報の更新
        $addressData = $request->only(['name', 'postal_code', 'address', 'building']);
        if ($address) {
            $address->update($addressData);
        } else {
            $user->address()->create($addressData);
        }

        return redirect('/mypage/profile')->with('status', 'プロフィールを更新しました');
    }

    public function edit()
    {
        $user = User::with('address', 'profile')->find(auth()->id());
        return view('edit', compact('user'));
    }
}

