<?php

namespace App\Http\Controllers;

use App\Payment;
use Carbon\Carbon;
use App\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Domain\Request\PaymentRequest;
use App\Domain\Datatables\PaymentsDatatableScope;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PaymentsDatatableScope $datatable)
    {
        if (request()->ajax()) {
            return $datatable->query();
        }

        return view('payments.reminder', [
            'html' => $datatable->html(),
        ]);
    }

    public function renew(PaymentRequest $request, $id)
    {
        $registration = Registration::find($id);

        if (!$registration) {
            return response()->json([
                'success' => false,
                'message' => 'Registration not found',
            ]);
        }
        $date = Carbon::parse($registration->end_date)->addDays(1)->addMonths($request->months)->subDays(1)->format('Y-m-d');

        try {
            DB::beginTransaction();
            $payment = Payment::create([
                'registration_id' => $id,
                'months' => $request->months,
                'amount' => $request->amount,
                'start_date' => Carbon::parse($registration->end_date)->addDays(1)->format('Y-m-d'),
                'end_date' => $date,
            ]);

            $registration->fill(['end_date' => $date, 'payment_id' => $payment->id])->save();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Payment done',
            ]);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }
}
