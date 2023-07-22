<?php

namespace App\Http\Controllers;

use App\Payment;
use Carbon\Carbon;
use App\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Domain\Request\RegisterRequest;
use App\Domain\Datatables\RagistrationDatatableScope;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RagistrationDatatableScope $datatable)
    {
        if (request()->ajax()) {
            return $datatable->query();
        }

        return view('registration.index', [
            'html' => $datatable->html(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registration.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterRequest $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->persist();
            $input['user_id'] = auth()->id();
            $input['registration_no'] = 'FP-'.str_pad(Registration::max('id') + 1, 5, '0', STR_PAD_LEFT);

            $registration = Registration::create($input);

            $payment = Payment::create([
                'registration_id' => $registration->id,
                'months' => $request->months,
                'amount' => $request->amount,
                'start_date' => $request->date,
                'end_date' => $input['end_date'],
            ]);

            $registration->update(['payment_id' => $payment->id]);
            DB::commit();

            return redirect()->route('registrations.index')->with('success', 'Register successfully');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->route('registrations.index')->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Registration $registration)
    {
        return view('registration.edit', compact('registration'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(RegisterRequest $request, Registration $registration)
    {
        $input = $request->persist();

        try {
            DB::beginTransaction();

            if ($registration->created_at->format('Y-m-d') == Carbon::now()->format('Y-m-d')) {
                Payment::find($registration->payment_id)->fill([
                    'months' => $input['months'],
                    'amount' => $input['amount'],
                    'start_date' => $input['date'],
                    'end_date' => $input['end_date'],
                ])->save();
            } else {
                unset($input['amount'],$input['date'],$input['end_date']);
            }
            $registration->fill($input)->save();

            DB::commit();

            return redirect()->route('registrations.index')->with('success', 'Registeration updated successfully');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->route('registrations.index')->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registration $registration)
    {
        $registration->payments()->delete();
        $registration->delete();

        return redirect()->route('registrations.index')->with('success', 'Registeration deleted');
    }

    public function recent()
    {
        $registrations = Registration::orderBy('id', 'DESC')->take(10)->get();

        return view('registration.recent', compact('registrations'));
    }

    public function print(Registration $registration)
    {
        $mpdf = new \Mpdf\Mpdf([
            '+aCJK',
            'format' => 'A5',
            'autoLangToFont' => true,
            'default_font' => 'Estrangelo Edessa',
            'margin_left' => 10, 'margin_right' => 10, 'margin_top' => 10, 'margin_bottom' => 10,
            'margin_header' => 0, 'margin_footer' => 5,
            'tempDir' => __DIR__.'/../../../public/uploads',
            'orientation' => 'L',
        ]);
        $mpdf->showImageErrors = true;
        $mpdf->defaultfooterline = 0;
        $mpdf->useAdobeCJK = true;
        $mpdf->charset_in = 'UTF-8';
        $mpdf->autoScriptToLang = true;
        $mpdf->autoLangToFont = true;
        $mpdf->useSubstitutions = false;
        $mpdf->setAutoTopMargin = 'stretch';
        $mpdf->SetDisplayMode('fullpage');
        // $mpdf->SetDefaultBodyCSS('background', "url('/back/images/fitness.png')");
        // $mpdf->SetDefaultBodyCSS('background-image-resize', 1);
        // $mpdf->SetDefaultBodyCSS('background-image-opacity', 0.2);
        $mpdf->setFooter('{PAGENO}/{nbpg} ');

        $html = view('registration.print', compact('registration'))->render();
        $mpdf->WriteHTML($html);
        $fileNm = $registration->name.'.pdf';

        return $mpdf->Output();
    }
}
