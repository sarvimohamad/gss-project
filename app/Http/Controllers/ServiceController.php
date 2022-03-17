<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Message;
use App\Models\Province;
use App\Models\Service;
use App\Models\Status;
use App\Models\TypeRequest;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function index(Request $request)
    {

        $query = Service::query();

        if (auth()->user()->role == 'bank') {
            $query->where('user_id', auth()->user()->id);
        }

        if ($s = $request->get('q')) {
            $query->where(function ($q) use ($s) {
                $q->orWhere('name', 'like', "%{$s}%");
                $q->orWhere('bankName', 'like', "%{$s}%");
            });
        }
        if ($s = $request->get('status')) {
            $query->where('status_id', $s);
        }
        if ($s = $request->get('date_from')) {
            $query->where('created_at', '>=', $s);
        }
        if ($s = $request->get('date_to')) {
            $query->where('created_at', '<=', $s);
        }

        $data = $query->orderBy('created_at','DESC')->paginate(5);
        $status = Status::query()->get()->all();

        return view('services.pending', ['data' => $data, 'status' => $status]);
    }

    public function show(Request $request, $id)
    {
        $message = Message::latest()->first();

        $service = Service::find($id);
        if (auth()->user()->role == 'user') {
            if ($service->status_id == 1) {
                $service->update(['status_id' => 2]);
            }
        }
        $status = Status::all();

        return view('services.show', ['service' => $service, 'statuses' => $status , 'message'=>$message ]);
    }

    public function create(Request $request)
    {
        $typeRequest = TypeRequest::all();
        $province = Province::all();
        $city = City::all();
        return view('services.RequestServices', ['typeRequest' => $typeRequest, 'province' => $province, 'city' => $city]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'mobile' => ['required', 'digits:11', 'starts_with:09'],
            'province' => ['required', 'exists:tbl_website_state,id'],
            'city' => ['required', 'exists:tbl_website_city,id'],
            'telephone' => ['required', 'max:15'],
            'address' => ['min:4', 'required'],
            'bankName' => ['required', 'string', 'max:100'],
            'serial' => ['required', 'max:100'],
            'desc' => ['max:900'],
            'breakdown' => ['max:200'],
            'code_branch' => ['required', 'max:100'],
            'post_center' => ['required', 'max:100'],
        ]);
//        $type = TypeRequest::all();
//        $data = Service::query()->create($request->toArray());
//        $data['status_id'] = 1;
//        $data->typeRequest = 2;
        $data = new Service();
        $data->user_id = auth()->user()->id;
        $data->name = $request->name;
        $data->mobile = $request->mobile;
        $data->telephone = $request->telephone;
        $data->address = $request->address;
        $data->desc = $request->desc;
        $data->typeRequest = $request->typeRequest;
        $data->bankName = $request->bankName;
        $data->serial = $request->serial;
        $data->breakdown = $request->breakdown;
        $data->code_branch = $request->code_branch;
        $data->post_center = $request->post_center;
        $data->province = $request->province;
        $data->city = $request->city;
//        $data->created_at = carbon::now();
        $data['status_id'] = 1;
        $data['type_id'] = $request->get('type');
        $data->save();
//        $data = Service::query()->create($request->toArray());
        return back()->with('success', 'درخواست با موفقیت ارسال شد ');
    }

    public function edit($id)
    {
        $province = Province::all();
        $typeRequest = TypeRequest::all();
        $service = Service::find($id);
        return view('services.edit', ['service' => $service, 'typeRequest' => $typeRequest ,'province'=>$province]);
    }

    public function update(Request $request, $id)
    {
        $service = Service::find($id);
        $service['status_id'] = 1;
        $service['type_id'] = $request->get('type_id');
        $service->update($request->toArray());

        return redirect()->route('index')->with('success', 'ویرایش با موفقیت انجام شد ');
    }

    public function pending(Request $request, $id)
    {

        $services = Service::query()->find($id);
        $services['status_id'] = $request->get('status', $services->status_id);
        $services->save();
        return back()->with('success', 'ارسال با موفقیت انجام شد');
    }

    public function listBank(Request $request)
    {
        $data = Service::all();
        return view('services.BankList', ['data' => $data]);
    }

    public function accepted(Request $request)
    {
        $services = Service::all();
        return view('services.accepted', ['data' => $services]);
    }

    public function verify(Request $request, $id)
    {
        /** @var Service $service */
        $service = Service::query()->find($id);

        $service->update([
            'demand' => $request->get('demand')
        ]);

        if ($request->get('text')) {
            $service->messages()->create([
                'user_id' => auth()->user()->id,
                'text' => $request->get('text')
            ]);
        }
        if ($service->status_id == 3 and $service->demand == 'decline'){
            $service->update(['status_id' => 5]);
        }elseif($service->status_id == 3 and $service->demand == 'approve'){
            $service->update(['status_id' => 4]);
        }

        return back()->with('success', 'ارسال  با موفقیت انجام شد');
    }

    public function addMessage(Request $request, $id)
    {
        /** @var Service $service */
        $service = Service::query()->find($id);


        $service->messages()->create([
            'user_id' => auth()->user()->id,
            'text' => $request->get('text')
        ]);

        if ($service->status_id == 2) {
            $service->update(['status_id' => 3]);
        }



        return redirect()->route('show', [$id])->with('success', 'ارسال پیام با موفقیت انجام شد');
    }


    public function listSendStats()
    {
        $data = Service::paginate(5);
        return view('services.listSendStats', ['data' => $data]);
    }

}
