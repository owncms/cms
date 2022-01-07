<?php

namespace Modules\Cms\Http\Controllers\Frontend;

use Facuz\Theme\Contracts\Theme;
use Illuminate\Http\Request;
use Modules\Cms\Http\Requests\Frontend\CmsUserRequest;

class ProfileController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();
        return $this->view(
            'cms.profile.dashboard',
            [
                'item' => $user
            ]
        );
    }

    public function edit()
    {
        $user = auth()->user();
        return $this->view(
            'cms.profile.edit',
            [
                'item' => $user
            ]
        );
    }

    public function update(CmsUserRequest $request)
    {
        $user = auth()->user();
        $data = $request->all();
        if (!isset($data['password']) || !$data['password']) {
            unset($data['password'], $data['password_confirmation']);
        }
        $user->update($data);
        return redirect()->back()->with('success', 'Your account has been updated!');
    }
}