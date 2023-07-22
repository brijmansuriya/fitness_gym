<?php

namespace App\Http\Controllers;

use App\Nutrition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Domain\Request\NutritionRequest;
use App\Domain\Datatables\NutritionsDatatableScope;

class NutritionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(NutritionsDatatableScope $datatable)
    {
        if (request()->ajax()) {
            return $datatable->query();
        }

        return view('nutritions.index', [
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
        return view('nutritions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(NutritionRequest $request)
    {
        try {
            DB::beginTransaction();

            Nutrition::create($request->persist());

            DB::commit();

            return redirect()->route('nutritions.index')->with('success', 'Nutrition detail added successfully');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->route('nutritions.index')->with('error', $e->getMessage());
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
    public function edit(Nutrition $nutrition)
    {
        return view('nutritions.edit', compact('nutrition'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(NutritionRequest $request, Nutrition $nutrition)
    {
        $input = $request->persist();

        try {
            DB::beginTransaction();

            $nutrition->fill($input)->save();

            DB::commit();

            return redirect()->route('nutritions.index')->with('success', 'Nutritions detail updated successfully');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->route('nutritions.index')->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nutrition $nutrition)
    {
        $nutrition->delete();

        return redirect()->route('nutritions.index')->with('success', 'Nutritions detail deleted');
    }

    public function recent()
    {
        $nutritions = Nutrition::orderBy('id', 'DESC')->take(10)->get();

        return view('nutritions.recent', compact('registrations'));
    }

    public function print($nutrition)
    {
        $nutrition = Nutrition::find($nutrition);
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

        $html = view('nutritions.print', compact('nutrition'))->render();
        $mpdf->WriteHTML($html);
        $fileNm = $nutrition->name.'.pdf';

        return $mpdf->Output();
    }
}
