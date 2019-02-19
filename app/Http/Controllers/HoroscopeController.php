<?php

namespace App\Http\Controllers;

use App\Horoscope;
use Illuminate\Http\Request;

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
     * This is the function which has all years and their responsive horoscope
     *
     * @return array
     */
    public function horoscopeInformation()
    {
        $horoscope_years = [
            'Rat' => [
                "years" => [2008, 1996, 1984, 1972, 1960, 1948, 1936, 1924],
                "info" =>
                    'The Rat is known as a friend for life. You find it difficult to give yourself completely, 
                       but once you are used to it, you do not let go. You are perfectionistic and sometimes you
                       can become a little aggressive if something does not work.
                       Properties: charming, sweet, confident, straightforward, possessive.'

            ],
            'Os' => [
                "years" => [2009, 1997, 1985, 1973, 1961, 1949, 1937, 1925],
                'info' =>
                    'De Os is a go-getter. You can quickly condemn someone and often see things black or white.
                      If you have a bad mood, others can better stay away from you.
                      Characteristics: patient, attentive, inquisitive, overconfident, critical.'
                ,
            ]
            ,
            'Tiger' => [
                'years' => [2010, 1998, 1986, 1974, 1962, 1950, 1938, 1926],
                'info' =>
                    'The Tiger is often a leader. You are adventurous and do not mind going somewhere alone.
                    You are sometimes impulsive and direct and can occasionally be possessive.
                    Characteristics: very sweet, adventurous, hasty, reckless and passionate.'
                ,
            ],
            'Rabbit' => [
                'years' => [2011, 1999, 1987, 1975, 1963, 1951, 1939, 1927],
                'info' =>
                    'The Rabbit is sometimes difficult to understand. You are sensitive 
                          and loved by friends and family. You have a good memory and 
                          are inclined to run away from problems.Properties: very sensitive,
                          intelligent, a little affected, modest and tactful.'
                ,
            ],
            'Dragon' => [
                'years' => [2012, 2000, 1988, 1976, 1964, 1952, 1940, 1928],
                'info' =>
                    'The Dragon is right at his turn. You often do first before you think.
                          You are protective and confident, but always want confirmation
                          that your partner loves you.
                          Features:  enthusiastic, demanding, energetic and emotional.'
                ,
            ],
            'Snake' => [
                'years' => [2013, 2001, 1989, 1977, 1965, 1953, 1941, 1929],
                'info' =>
                    'The snake is mysterious. You find it difficult to show your feelings, but 
                        you want love and attention. In addition, you continue until your goal is reached.
                        Features: helpful, orderly, fickle, funny and a bad loser.'
                ,
            ],
            'Horse' => [
                'years' => [2014, 2002, 1990, 1978, 1966, 1954, 1942, 1930],
                'info' =>
                    'The Horse is solution-oriented. You are loyal but not good at keeping secrets. 
                        You would like to know everything, but if it sometimes gets too difficult,
                        you will get rid of it.
                        Characteristics:  hard worker, demanding, talented, moody, lively.'
                ,
            ],
            'Goat' => [
                'years' => [2015, 2003, 1991, 1979, 1967, 1955, 1943, 1931],
                'info' =>
                    'The Sheep is a natural person. You are creative, perfectionist and can sometimes
                        be very insecure. You can not handle pressure well and want to be protected.
                        Features:  creative, romantic, helpful, pessimistic, honest.'
                ,
            ],
            'Monkey' => [
                'years' => [2016, 2004, 1992, 1980, 1968, 1956, 1944, 1932],
                'info' =>
                    'The Monkey is interested in the interest. You are often happy and always talk.
                          You like challenges and do not think in problems, but in solutions.
                          Characteristics:  sympathetic, loyal, creative, insecure, irritable.'
                ,
            ],
            'Haan' => [
                'years' => [2017, 2005, 1993, 1981, 1969, 1957, 1945, 1933],
                'info' =>
                    'Rooster is direct and says what it says. You love clothes and your hairstyle 
                           and spend a lot of time and money on this. You want to come for the day.
                        Characteristics: frank, courageous, fussy, vain, charming.'
                ,
            ],
            'Dog' => [
                'years' => [2018, 2006, 1994, 1982, 1970, 1958, 1946, 1934],
                'info' =>
                    'The Dog wants to have the last word. You find it difficult to agree with someone 
                       and you like to complain. You like being in your own home and family is important to you.
                       You attract a lot of how others feel.
                        Characteristics:  loyal, patient, enthusiastic, inflexible, anxious.'
                ,
            ],
            'Pig' => [
                'years' => [2019, 2007, 1995, 1983, 1971, 1959, 1947, 1935],
                'info' =>
                    'The Pig is reliable. You like luxury and can therefore be a bit spoiled.
                       You are happy and have a big heart. Sometimes you believe things too quickly.
                       Characteristics: very sensible, well-meaning, hospitable, passionate and defensive.'
                ,
            ]
        ];

        return $horoscope_years;
    }


    /**
     * This is the function to calculate horoscope according to given params
     *
     * @param Request $request
     *
     * @return int|string
     */

    public function calculateHoroscope(Request $request)
    {
        $horoscope_info = $this->horoscopeInformation();

        $user_year = $request->get('select-year');
        $user_day = $request->get('select-day');
        $user_month = $request->get('select-month');

        foreach ($horoscope_info as $key => $hi) {
           // if ($key == "info") break;
            foreach ($hi['years'] as $hyears) {
                if ($user_year == $hyears) {
                    $result = [ $key => $hi['info']];
                    return $result;
                }
            }
        }
    }
}
