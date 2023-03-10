<?php

namespace App\Http\Controllers\Admin\General;

use App\Http\Controllers\Controller;
use App\Traits\InternalTransfer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Covenant\CovenantItem;
use App\Traits\GeneralTrait;

class BondController extends Controller
{
    use InternalTransfer, GeneralTrait;

    public function show_add()
    {
        return view('general.addBox');
    }

    public function save_add(Request $request)
    {
        $request->validate([
            'belongs_type' => 'required|string|in:driver,vechile,rider,user,stakeholder',
            'belongs_to' => 'required|integer',
            'bond_type' => 'required|string|in:take,spend',
            'payment_type' => 'required|string|in:cash,bank transfer,internal transfer,selling points,electronic payment',
            'money' => 'required|numeric',
            'tax' => 'required|numeric',
            'descrpition' => 'required|string',
        ]);
        if ($request->bond_type === 'spend') {
            $request->validate([
                'image' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf',
            ]);
        }
        if ($request->has('stakeholder') && $request->payment_type === "internal transfer") {
            $request->validate([
                'stakeholder' => 'required|string|in:driver,vechile,rider,stakeholder,user',
                'user' => 'required|integer',
            ]);
            $this->transfer($request);
        }
        if ($request->belongs_type == 'driver') {
            $driver = \App\Models\Driver::find($request->belongs_to);
            if ($driver !== null) {
                $totalMoney = $request->money + (($request->money * $request->tax) / 100);
                $boxDriver = new \App\Models\Driver\BoxDriver;
                $boxDriver->driver_id = $request->belongs_to;
                $boxDriver->bond_type = $request->bond_type;
                $boxDriver->payment_type = $request->payment_type;
                $boxDriver->money = $request->money;
                $boxDriver->tax = $request->tax;
                $boxDriver->total_money = $totalMoney;
                $boxDriver->descrpition = $request->descrpition;
                $boxDriver->add_date = Carbon::now();
                $boxDriver->add_by = Auth::guard('admin')->user()->id;
                if ($request->hasFile('image') && $request->image !== null) {
                    $file = $request->file('image');
                    $name = $file->getClientOriginalName();
                    $ext = $file->getClientOriginalExtension();
                    $size = $file->getSize();
                    $mim = $file->getMimeType();
                    $realpath = $file->getRealPath();
                    $image = time() . '.' . $ext;
                    $file->move(public_path('images/bond/spend'), $image);
                    $boxDriver->bond_photo = $image;
                }
                $boxDriver->save();
                $request->session()->flash('status', '???? ?????????? ?????????? ??????????');
                return back();
            }
        } else if ($request->belongs_type == 'vechile') {
            $vechile = \App\Models\Vechile::find($request->belongs_to);
            if ($vechile !== null) {
                $totalMoney = $request->money + (($request->money * $request->tax) / 100);
                $boxVechile = new \App\Models\Vechile\BoxVechile;
                $boxVechile->vechile_id = $request->belongs_to;
                $boxVechile->bond_type = $request->bond_type;
                $boxVechile->payment_type = $request->payment_type;
                $boxVechile->money = $request->money;
                $boxVechile->tax = $request->tax;
                $boxVechile->total_money = $totalMoney;
                $boxVechile->descrpition = $request->descrpition;
                $boxVechile->add_date = Carbon::now();
                $boxVechile->add_by = Auth::guard('admin')->user()->id;
                if ($request->hasFile('image') && $request->image !== null) {
                    $file = $request->file('image');
                    $name = $file->getClientOriginalName();
                    $ext = $file->getClientOriginalExtension();
                    $size = $file->getSize();
                    $mim = $file->getMimeType();
                    $realpath = $file->getRealPath();
                    $image = time() . '.' . $ext;
                    $file->move(public_path('images/bond/spend'), $image);
                    $boxVechile->bond_photo = $image;
                }
                $boxVechile->save();
                $request->session()->flash('status', '???? ?????????? ?????????? ??????????');
                return back();

            }
        } else if ($request->belongs_type == 'rider') {
            $rider = \App\Models\Rider::find($request->belongs_to);
            if ($rider !== null) {
                $totalMoney = $request->money + (($request->money * $request->tax) / 100);
                $BoxRider = new \App\Models\Rider\BoxRider;
                $BoxRider->rider_id = $request->belongs_to;
                $BoxRider->bond_type = $request->bond_type;
                $BoxRider->payment_type = $request->payment_type;
                $BoxRider->money = $request->money;
                $BoxRider->tax = $request->tax;
                $BoxRider->total_money = $totalMoney;
                $BoxRider->descrpition = $request->descrpition;
                $BoxRider->add_date = Carbon::now();
                $BoxRider->add_by = Auth::guard('admin')->user()->id;
                if ($request->hasFile('image') && $request->image !== null) {
                    $file = $request->file('image');
                    $name = $file->getClientOriginalName();
                    $ext = $file->getClientOriginalExtension();
                    $size = $file->getSize();
                    $mim = $file->getMimeType();
                    $realpath = $file->getRealPath();
                    $image = time() . '.' . $ext;
                    $file->move(public_path('images/bond/spend'), $image);
                    $BoxRider->bond_photo = $image;
                }
                $BoxRider->save();
                $request->session()->flash('status', '???? ?????????? ?????????? ??????????');
                return back();
            }
        } else if ($request->belongs_type == 'user') {
            $user = \App\Models\Admin::find($request->belongs_to);
            if ($user !== null) {
                $totalMoney = $request->money + (($request->money * $request->tax) / 100);
                $boxUser = new \App\Models\User\BoxUser;
                $boxUser->user_id = $request->belongs_to;
                $boxUser->bond_type = $request->bond_type;
                $boxUser->payment_type = $request->payment_type;
                $boxUser->money = $request->money;
                $boxUser->tax = $request->tax;
                $boxUser->total_money = $totalMoney;
                $boxUser->descrpition = $request->descrpition;
                $boxUser->add_date = Carbon::now();
                $boxUser->add_by = Auth::guard('admin')->user()->id;
                if ($request->hasFile('image') && $request->image !== null) {
                    $file = $request->file('image');
                    $name = $file->getClientOriginalName();
                    $ext = $file->getClientOriginalExtension();
                    $size = $file->getSize();
                    $mim = $file->getMimeType();
                    $realpath = $file->getRealPath();
                    $image = time() . '.' . $ext;
                    $file->move(public_path('images/bond/spend'), $image);
                    $boxUser->bond_photo = $image;
                }
                $boxUser->save();
                $request->session()->flash('status', '???? ?????????? ?????????? ??????????');
                return back();
            }
        } else if ($request->belongs_type == 'stakeholder') {
            $stakeholder = \App\Models\Nathiraat\Stakeholders::find($request->belongs_to);
            if ($stakeholder !== null) {
                $totalMoney = $request->money + (($request->money * $request->tax) / 100);
                $boxNathriaat = new \App\Models\Nathiraat\BoxNathriaat;
                $boxNathriaat->stakeholders_id = $request->belongs_to;
                $boxNathriaat->bond_type = $request->bond_type;
                $boxNathriaat->payment_type = $request->payment_type;
                $boxNathriaat->money = $request->money;
                $boxNathriaat->tax = $request->tax;
                $boxNathriaat->total_money = $totalMoney;
                $boxNathriaat->descrpition = $request->descrpition;
                $boxNathriaat->add_date = Carbon::now();
                $boxNathriaat->add_by = Auth::guard('admin')->user()->id;
                if ($request->hasFile('image') && $request->image !== null) {
                    $file = $request->file('image');
                    $name = $file->getClientOriginalName();
                    $ext = $file->getClientOriginalExtension();
                    $size = $file->getSize();
                    $mim = $file->getMimeType();
                    $realpath = $file->getRealPath();
                    $image = time() . '.' . $ext;
                    $file->move(public_path('images/bond/spend'), $image);
                    $boxNathriaat->bond_photo = $image;
                }
                $boxNathriaat->save();
                $request->session()->flash('status', '???? ?????????? ?????????? ??????????');
                return back();
            }
            $request->session()->flash('error', '???????? ???? ?????????? ????????????????');
            return back();

        }

    }

    public function show_selling_point()
    {
        $covenantItems = CovenantItem::where('covenant_name', '???????? ???????? ??????')->whereNotNull('current_driver')->get();
        return view('general.addBondSellingPoint', compact('covenantItems'));
    }

    public function device_owner(Request $request)
    {
        $item = CovenantItem::find($request->item);
        if($item){

            $owner =  $item->owner;
            if($owner){
                return $this->returnData("driver", $owner, "???????????? ????????????");
            }
            else{
                return $this->returnError("E002", "?????? ???????????? ?????? ???????? ??????????");
            }
        }
        else{
            return $this->returnError("E001", "???????? ???????? ?????????? ?????? ??????????");
        }
    }

    public function save_selling_point(Request $request)
    {
        $request->validate([
            'device' => 'required|integer',
            'user' => 'required|integer',
            'bond_type' => 'required|string|in:take,spend',
            'money' => 'required|numeric',
            'tax' => 'required|numeric',
            'descrpition' => 'required|string',
        ]);
        $driver = \App\Models\Driver::find($request->user);
        if ($driver !== null) {
            $totalMoney = $request->money + (($request->money * $request->tax) / 100);
            $boxDriver = new \App\Models\Driver\BoxDriver;
            $boxDriver->driver_id = $request->user;
            $boxDriver->bond_type = $request->bond_type;
            $boxDriver->payment_type = "selling points";
            $boxDriver->money = $request->money;
            $boxDriver->tax = $request->tax;
            $boxDriver->total_money = $totalMoney;
            $boxDriver->descrpition = $request->descrpition;
            $boxDriver->add_date = Carbon::now();
            $boxDriver->add_by = Auth::guard('admin')->user()->id;

            $boxDriver->save();
            $request->session()->flash('status', '???? ?????????? ?????????? ??????????');
            return back();
        }
        else{

            $request->session()->flash('error', '???????? ???? ???????????? ????????????');
            return back();
        }
    }
}
