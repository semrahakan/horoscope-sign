<?php

namespace App\Http\Controllers;

use App\Horoscope;
use Illuminate\Http\Request;
use App\Business\ChineseHoroscope;

class HoroscopeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $months = [
            'january',
            'febuary',
            'march',
            'april',
            'may',
            'june',
            'july',
            'august',
            'september',
            'october',
            'november',
            'december'
        ];
        $result = '';
        $days = [];
        for ($i = 1; $i <= 31; $i++) {
            $days[] += $i;
        }
        $years = [];
        for ($year = 1950; $year <= 2019; $year++) {
            $years[] += $year;
        }
        if ($request->method() == "GET") {

            return view('welcome')->with('months', $months)->with('days', $days)->with('years', $years)->with('result',$result);
        } else {
            $result = $this->calculateHoroscope($request);
            return view('welcome')->with('months', $months)->with('days', $days)->with('years', $years)->with('result',$result);
        }
    }

    /**
     * This function uses ChineseHoroscope class to calculate sign
     *
     * @param Request $request
     *
     * @return \App\Business\ChineseSign
     */
    public function calculateHoroscope(Request $request)
    {
        $user_year = $request->get('select-year');
        $object = new ChineseHoroscope();
        $result = $object->getSign($user_year);
        return $result;
    }
}
