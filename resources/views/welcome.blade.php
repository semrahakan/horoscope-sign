<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Horoscope</title>

    <!-- Bootstrap Start -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <!-- Bootstrap End -->

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

</head>
<body>
<div class="container">
            <span class="border-3">
             <div class="row">
                <form class="row" method="post" action="/">
                    @csrf
                    <div class="form-row align-items-center">
                        <div class="col-auto my-1">
                            <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="select-month">
                                <option selected>Month</option>
                                @foreach($months as $month)
                                    <option value="{{$month}}">{{$month}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-auto my-1">
                             <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="select-day">
                                <option selected>Day</option>
                                @foreach($days as $day)
                                    <option value="{{$day}}">{{$day}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-auto my-1">
                             <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="select-year">
                                <option selected>Year</option>
                                @foreach($years as $year)
                                    <option value="{{$year}}">{{$year}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-auto my-1">
                            <button type="submit" class="btn btn-primary" name="submit-btn" >Submit</button>
                        </div>
                        @if( $result )
                            @foreach( $result as $k => $r )
                                <div class="col-auto my-4">
                                    <label>{{$k}}</label>
                                </div>
                                <div class="col-auto my-lg-4">
                                    {{$r}}
                                </div>
                            @endforeach
                        @endif
                    </div>
                </form>
            </div>
            </span>
</div>
</body>
</html>
