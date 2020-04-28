<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AccountRequest;
use App\Http\Resources\Account\AccountCollection;
use App\Http\Resources\Account\AccountResource;
use App\Models\Account;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AccountCollection
     */
    public function index()
    {
        return new AccountCollection(Account::all());
    }

    /**
     * @param  AccountRequest  $request
     * @return AccountResource
     */
    public function store(AccountRequest $request)
    {
        //
        $account = new Account($request->validated());
        $account->save();

        if (isset($request->validated()['avatars'])) {
            foreach ($request->file('avatars') as $avatar) {
                $path = Storage::disk('public')->putFile('avatars', $avatar);
                $media = new Media(['file_path' => $path]);
                $account->avatars()->save($media);
            }
        }

        return new AccountResource($account->load('avatars'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account       $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        //
    }
}
