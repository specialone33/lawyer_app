<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCalendarRequest;
use App\Http\Requests\StoreCalendarRequest;
use App\Http\Requests\UpdateCalendarRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CalendarController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('calendar_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.calendars.index');
    }

    public function create()
    {
        abort_if(Gate::denies('calendar_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.calendars.create');
    }

    public function store(StoreCalendarRequest $request)
    {
        $calendar = Calendar::create($request->all());

        return redirect()->route('admin.calendars.index');
    }

    public function edit(Calendar $calendar)
    {
        abort_if(Gate::denies('calendar_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.calendars.edit', compact('calendar'));
    }

    public function update(UpdateCalendarRequest $request, Calendar $calendar)
    {
        $calendar->update($request->all());

        return redirect()->route('admin.calendars.index');
    }

    public function show(Calendar $calendar)
    {
        abort_if(Gate::denies('calendar_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.calendars.show', compact('calendar'));
    }

    public function destroy(Calendar $calendar)
    {
        abort_if(Gate::denies('calendar_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $calendar->delete();

        return back();
    }

    public function massDestroy(MassDestroyCalendarRequest $request)
    {
        Calendar::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
