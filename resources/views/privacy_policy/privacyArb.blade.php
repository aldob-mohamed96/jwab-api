<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <title>
        @switch($belong)
            @case('policy')
            سياسة الخصوصيــة
                @break
            @case('terms')
            الشروط و الأحكــــام
                @break
            @default
        @endswitch
    </title>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta property="og:image" content="{{ asset('assets/images/pleaceholder/taxi2.jpg') }}">
    <meta property="og:image:type" content="image/jpg">
    <meta property="og:image:width" content="200">
    <meta property="og:image:height" content="200">
    <meta name="title" content="الجواب للنقل البري">
    <meta name="description"
        content="شركة الجواب للنقل البري هى شركة واحدة من اكبر الشركات للنقل البرى داخل المدينة المنورة تستطيع من خلالها عمل رحلات داخلية داخل المدينة المنورة او رحلات بين المدن او القيام بأشتراك شهرى بيها العديد من المميزات الامان والكفاءة والسرعة فى تنفيذ الطلبات مع باقات واسعار منخفضة  خدمة متوفرة على مدار 24 ساعة.">
    <meta name="keywords" content="نقل, تاكسي, تاكسى, اجرة, أجرة">
    <meta name="author" content="Ahmed Marey">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link href="{{ asset('assets/css/bootstrap.rtl.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/about.css') }}" rel="stylesheet">
    <style>
        @font-face {
            font-family: 'noto';
            src: asset('assets/fonts/NotoNaskhArabic-VariableFont_wght.ttf');
        }

        * {
            font-family: 'noto';
        }

    </style>
</head>

<body class="" id="top">

    <div class="pl-5 pt-2 pb-2 bg-green  ">
        <div class="container-fluid clearfix">
            <p class="pl-5 text-light h2 float-start">تاكسـي الجواب</p>
            <p class=" float-end">
                <a href="{{url(($belong == 'policy' ? 'privacy/policy/': 'terms/conditions/').$type.'/eng')}}" class="btn text-light ">English</a>
            </p>
        </div>
    </div>

    <section id="list-services">
        <div class="container">
            <h2 class="text-oringe">
                @switch($belong)
                    @case('policy')
                    سياسة الخصوصيــة
                        @break
                    @case('terms')
                    الشروط و الأحكــــام
                        @break
                    @default
                @endswitch
                @if ($type == 'driver')
                    لسائق تاكسى الجواب
                @else
                    لعميل تاكسى الجواب
                @endif
            </h2>
            <ul class="list-group">
                @foreach ($policies as $policy)
                <li class="list-group-item">
                    <p>
                        <button id="ChildrenPrivacy{{$policy->id}}1" class="btn text-oringe btn-custom" type="button" data-bs-toggle="collapse" data-bs-target="#ChildrenPrivacy{{$policy->id}}" aria-expanded="true" aria-controls="ChildrenPrivacy{{$policy->id}}">
                            {{ $policy->ar_title }}
                            <i class="fa fa-chevron-up" aria-hidden="true"></i>
                        </button>
                    </p>
                    <div class="collapse show" id="ChildrenPrivacy{{$policy->id}}">
                        <div class="card card-body">
                            <p>
                                {{ $policy->ar_content }}
                            </p>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </section>

    <footer>
        <div class="footer">
            <div class="icon">
                <i class="fa fa-snapchat"></i>
            </div>
            <div class="icon">
                <i class="fa fa-facebook" aria-hidden="true"></i>
            </div>
            <div class="icon">
                <i class="fa fa-google"></i>
            </div>
            <div class="icon">
                <i class="fa fa-twitter"></i>
            </div>

            <p class="pt-3 m-0">حقوق الطباعة والنشر محفوظ لشركة الجواب للنقل البرى</p>
            <span>Copyright &copy; TaxiAljwab Team.</span>

        </div>
    </footer>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/about.js') }}"></script>
</body>

</html>
