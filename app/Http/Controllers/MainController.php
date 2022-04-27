<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppealRequest;
use App\Models\Appeal;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isEmpty;

class MainController extends Controller
{
    public function create()
    {
        return  view('form');
    }

    public function store(AppealRequest $request)
    {
        $appeal = Auth::user()->appeals()->first();
        if(!Empty($appeal) && (strtotime($appeal->created_at) - strtotime(Carbon::now()) < 24)) {
            session()->flash('warning', 'Вы уже отправили заявку, установлен лимит: 1 заявка в день');
        }
        else {

            $params = $request->all();
            $params['user_id'] = Auth::user()->getAuthIdentifier();
            unset($params['file']);
            if($request->has('file')) {
                $params['file'] = $request->file('file')->store('appeals');
            }
            Appeal::create($params);
            session()->flash('success', 'Заявка отправлена');
        }

        return redirect()->back();
    }

    public function showList()
    {
        $appeals = Appeal::paginate(10);
        return view('list', compact('appeals'));
    }
    public function answered(Appeal $appeal)
    {
        $appeal->answered = 1;
        $appeal->update();
        return redirect()->route('showList');

    }


}
