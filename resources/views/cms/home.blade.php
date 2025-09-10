@php
    use Illuminate\Support\Facades\Storage;
    $lang = app()->getLocale() == 'ar' ? 'rtl' : 'ltr';
@endphp
<!DOCTYPE html>
<html dir="{{ $lang }}">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>لوحة التحكم - الرئيسية</title>

    <link href="{{ asset('cms/assets/fonts/inter/inter.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('cms/assets/icons/phosphor/styles.min.css') }}" rel="stylesheet" type="text/css">
    @if ($lang == 'rtl')
        <link href="{{ asset('cms/assets/css/rtl/all.min.css') }}" id="stylesheet" rel="stylesheet" type="text/css">
        <link href="{{ asset('cms/assets/css/rtl/bootstrap_limitless.min.css') }}" id="stylesheet" rel="stylesheet"
            type="text/css">
        <link href="{{ asset('cms/assets/css/rtl/bootstrap.min.css') }}" id="stylesheet" rel="stylesheet"
            type="text/css">
        <link href="{{ asset('cms/assets/css/rtl/components.min.css') }}" id="stylesheet" rel="stylesheet"
            type="text/css">
        <link href="{{ asset('cms/assets/css/rtl/layout.css') }}" id="stylesheet" rel="stylesheet" type="text/css">
    @else
        <link href="{{ asset('cms/assets/css/ltr/all.min.css') }}" id="stylesheet" rel="stylesheet" type="text/css">
        <link href="{{ asset('cms/assets/css/ltr/bootstrap.min.css') }}" id="stylesheet" rel="stylesheet"
            type="text/css">
        <link href="{{ asset('cms/assets/css/ltr/bootstrap_limitless.min.css') }}" id="stylesheet" rel="stylesheet"
            type="text/css">
        <link href="{{ asset('cms/assets/css/ltr/components.min.css') }}" id="stylesheet" rel="stylesheet"
            type="text/css">
        <link href="{{ asset('cms/assets/css/ltr/layout.min.css') }}" id="stylesheet" rel="stylesheet" type="text/css">
    @endif

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/all.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900;1000&display=swap"
        rel="stylesheet">
    <!-- /global stylesheets -->
    <style>
        button.swal2-styled {
            border: none !important;
            outline: none !important;
            color: #ffffff !important;
            padding: 6px 15px !important;
            border-radius: 5px;
        }

        button.swal2-confirm {
            background-color: #252b36;
        }

        .progress-bar {
            width: 100%;
            height: 20px;
            background-color: #f2f2f2;
            position: relative;
        }

        .progress {
            width: 0%;
            height: 100%;
            background-color: #4caf50;
            transition: width 0.3s ease-in-out;
            position: relative;
        }

        .progress:before {
            content: "";
            position: absolute;
            top: 0;
            left: -15px;
            right: -15px;
            height: 100%;
            background-image: repeating-linear-gradient(45deg, rgba(60, 59, 117, 0.747) 10px, rgba(47, 45, 163, 0.493) 25px, rgba(59, 56, 250, 0.562) 25px);
        }

        .progress-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #ffffff;
            font-weight: bold;
        }

        #previewImage {
            width: 400px;
            margin-top: 15px;
            border-radius: 25px;
        }

        .nav.nav-sidebar {
            padding-inline: 0 !important;
        }

        .nav-link i {
            margin-right: 0 !important;
            margin-left: 0 !important;
            margin-inline: 10px !important;
        }

        .navbar-brand img {
            width: 35px !important;
            height: 45px;
        }

        .node circle {
            fill: #228794;
            stroke: #0000003d;
            stroke-width: 2px;
        }

        .node text {
            font-size: 10px;
            font-weight: bold;
            font-family: 'Cairo', sans-serif;
        }

        .link {
            fill: none;
            stroke: #ccc;
            stroke-width: 1px;
        }
    </style>
    @yield('styles')

</head>

<body>

    <!-- Main navbar -->
    <div class="navbar navbar-dark navbar-expand-lg navbar-static border-bottom border-bottom-white border-opacity-10">
        <div class="container-fluid">
            <div class="d-flex d-lg-none me-2">
                <button type="button" class="navbar-toggler sidebar-mobile-main-toggle rounded-pill">
                    <i class="ph-list"></i>
                </button>
            </div>

            <div class="flex-1 navbar-brand flex-lg-0">
                <a href="#" class="d-inline-flex align-items-center">
                    <img src="{{ asset('cms/assets/icons/Group (1).svg') }}" alt="">
                </a>
            </div>

            <ul class="flex-row order-1 nav justify-content-end order-lg-2">

                <li class="nav-item nav-item-dropdown-lg dropdown ms-lg-2">
                    <a href="#" class="p-1 navbar-nav-link align-items-center rounded-pill"
                        data-bs-toggle="dropdown">
                        <div class="status-indicator-container">
                            <img src="{{ Storage::url('images/admin/' . Auth::user()->user->image) }}"
                                class="w-32px h-32px rounded-pill" alt="">
                            <span class="status-indicator bg-success"></span>
                        </div>
                        <span
                            class="d-none d-lg-inline-block mx-lg-2">{{ Auth::check() ? Auth::user()->user->name : null }}</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-end">
                        <form action="{{ route('logout', 'admin') }}" method="POST">
                            @csrf
                            <button class="dropdown-item" type="submit"><i class="ph-sign-out me-2"></i>تسجيل
                                الخروج</button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- /main navbar -->


    <!-- Page content -->
    <div class="page-content">

        @include('cms.sidebar')


        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Inner content -->
            <div class="content-inner">
                <div class="content">
                    <div class="row row-cols-2">
                        <div class="col">
                            <!-- Current server load -->
                            <div class="card bg-pink text-white">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="text">
                                            <h3 class="mb-0"> {{ $buys->count() }}
                                            </h3>
                                            <span>
                                                {{ __('dashboard/master.total_purchases') }}
                                            </span>
                                        </div>

                                        <span
                                            class="badge bg-black bg-opacity-50 rounded-pill align-self-center ms-auto">{{ count(json_decode($jsonDataBuys)) }}

                                            {{ __('dashboard/master.purchases_this_week') }}
                                        </span>
                                    </div>

                                    <div class="rounded-bottom my-1">
                                        <div id="chart-buys"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- /current server load -->

                        </div>
                        <div class="col">

                            <!-- Today's revenue -->
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="text">
                                            <h3 class="mb-0"> {{ $reservations->count() }}
                                            </h3>
                                            <span> {{ __('dashboard/master.total_reservations') }}
                                            </span>
                                        </div>
                                        <div class="ms-auto">
                                            <a class="text-white" data-card-action="reload">
                                                <i class="ph-arrows-clockwise"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="rounded-bottom my-1">
                                    <div id="chart-reservations"></div>
                                </div>
                            </div>
                            <!-- /today's revenue -->

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="row">
                                <div class="card text-center">
                                    <div class="card-header">
                                        <h5 class="card-title"> {{ __('dashboard/master.latest_products') }} </h5>
                                    </div>
                                    <div class="card-body">
                                        <table class="table datatable-basic">
                                            <thead>
                                                <tr>
                                                    <th> {{ __('dashboard/master.image') }} </th>
                                                    <th> {{ __('dashboard/master.name') }} </th>
                                                    <th> {{ __('dashboard/master.description') }} </th>
                                                    <th> {{ __('dashboard/master.category') }} </th>
                                                    <th> {{ __('dashboard/master.creation_date') }} </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($products as $product)
                                                    <tr>
                                                        <td> <img
                                                                src="{{ Storage::url('images/product/' . $product->image) }}"
                                                                alt="Sub Image" width="50"></td>
                                                        <td>{{ $product->trans_name }}</td>
                                                        <td width="20%">
                                                            {{ Str::limit($product->trans_descreption, 50, '...') }}

                                                        </td>
                                                        <td width="20%">{{ $product->category->trans_name }}
                                                        </td>
                                                        <td width="20%">{{ $product->created_at }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="card text-center">
                                    <div class="card-header">
                                        <h5 class="card-title">{{ trans('dashboard/master.compare') }}</h5>
                                    </div>
                                    <div class="card-body">
                                        <div id="chart-compare" style="width: 100%; height: 300px"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">{{ __('dashboard/master.latest_posts') }}</h5>
                                    </div>
                                    <div class="card-body pb-0">
                                        <div class="row row-cols-2">
                                            @foreach ($blogs as $blog)
                                                <div class="col-xl-6">
                                                    <div class="d-sm-flex align-items-sm-start mb-3">
                                                        <a href="#"
                                                            class="d-inline-block position-relative me-sm-3 mb-3 mb-sm-0">
                                                            <img src="{{ Storage::url('images/blog/' . $blog->image) }}"
                                                                class="flex-shrink-0 rounded" height="100"
                                                                alt="">
                                                        </a>

                                                        <div class="flex-fill">
                                                            <h6 class="mb-1"><a href="#">
                                                                    {{ $blog->trans_name }}
                                                                </a>
                                                            </h6>
                                                            <ul class="list-inline list-inline-bullet text-muted mb-2">
                                                                <li class="list-inline-item"><a href="#"
                                                                        class="text-body">
                                                                        {{ $blog->trans_author }}
                                                                    </a></li>
                                                            </ul>

                                                            {{ Str::limit($blog->trans_content, 50, '...') }}
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="card text-center">
                                    <div class="card-header">
                                        <h5 class="card-title">{{ trans('dashboard/master.latest_contacts') }}</h5>
                                    </div>
                                    <div class="card-body">
                                        <div id="chart-contacts" style="height: 500px !importand;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="row">
                                <div class="col-sm-12 ">
                                    <div class="card text-center">
                                        <div class="card-header">
                                            <h5 class="card-title"> {{ trans('dashboard/master.reviews') }} </h5>
                                        </div>
                                        <div class="card-body">
                                            @foreach ($reviews as $review)
                                                <div class="d-flex align-items-start mb-3">
                                                    <div class="status-indicator-container me-3">
                                                        <img src="{{ Storage::url('images/reviews/' . $review->image) }}"
                                                            class="rounded-circle" width="40" height="40"
                                                            alt="">
                                                        <span class="status-indicator bg-success"></span>

                                                    </div>

                                                    <div class="flex-fill">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="fw-semibold"><a href="#">
                                                                    {{ $review->trans_name }}
                                                                </a>
                                                            </div>
                                                            <span
                                                                class="fs-sm text-muted">{{ $review->created_at }}</span>
                                                        </div>
                                                        <div class="text-start">
                                                            {{ $review->trans_descreption }}

                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card text-center">
                                        <div class="card-header">
                                            <h5 class="card-title"> {{ trans('dashboard/master.special_offers') }}
                                            </h5>
                                        </div>
                                        @foreach ($offers as $offer)
                                            <div class="card-body">
                                                <img src="{{ Storage::url('images/offers/' . $offer->image) }}"
                                                    alt="our client Image" width="50" height="50px"
                                                    style="object-fit: contain">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card text-center">
                                        <div class="card-header">
                                            <h5 class="card-title"> {{ trans('dashboard/master.our_clients') }} </h5>
                                        </div>
                                        @foreach ($our_clients as $our_client)
                                            <div class="card-body">
                                                <img src="{{ Storage::url('images/ourClient/' . $our_client->image) }}"
                                                    alt="our client Image" width="50" height="50px"
                                                    style="object-fit: contain">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="card text-center">
                                        <div class="card-header">
                                            <h5 class="card-title"> {{ trans('dashboard/master.latest_projects') }}
                                            </h5>
                                        </div>
                                        <div class="card-body">
                                            <table class="table datatable-basic">
                                                <thead>
                                                    <tr>
                                                        <th>{{ trans('dashboard/master.image') }}</th>
                                                        <th>{{ trans('dashboard/master.title') }}</th>
                                                        <th> {{ trans('dashboard/master.creation_date') }} </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($projects as $project)
                                                        <tr>
                                                            <td> <img
                                                                    src="{{ Storage::url('images/projects/' . $project->main_image) }}"
                                                                    alt="project Image" width="50"></td>
                                                            <td>{{ $project->trans_title }}</td>
                                                            <td>{{ $project->created_at }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="card text-center">
                                        <div class="card-header">
                                            <h5 class="card-title"> {{ trans('dashboard/master.latest_contacts') }}
                                            </h5>
                                        </div>
                                        <div class="card-body">

                                            <table class="table datatable-basic">
                                                <thead>
                                                    <tr>
                                                        <th> {{ trans('dashboard/master.name') }} </th>
                                                        <th> {{ trans('dashboard/master.mobile') }} </th>
                                                        <th> {{ trans('dashboard/master.service') }} </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($contacts as $contact)
                                                        <tr>
                                                            <td>{{ $contact->name }}</td>
                                                            <td>{{ $contact->mobile }}</td>
                                                            <td>
                                                                {{ $contact->service->trans_title }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /inner content -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

    <!-- Demo config -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="demo_config">
        <div class="visible position-absolute top-50 end-100">
            <button type="button" class="btn btn-primary btn-icon translate-middle-y rounded-100-0"
                data-bs-toggle="offcanvas" data-bs-target="#demo_config">
                <i class="ph-gear"></i>
            </button>
        </div>

        <div class="py-0 offcanvas-header border-bottom">
            <h5 class="py-3 offcanvas-title">المظهر</h5>
            <button type="button" class="border-transparent btn btn-light btn-sm btn-icon rounded-pill"
                data-bs-dismiss="offcanvas">
                <i class="ph-x"></i>
            </button>
        </div>

        <div class="offcanvas-body">
            <div class="mb-2 fw-semibold">اللغات</div>
            <div class="mb-3 list-group">
                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <label class="mb-2 rounded list-group-item list-group-item-action form-check border-width-1 w-100">
                        <div class="my-1">
                            <div class="form-check-label d-flex me-2 w-100">
                                <a rel="alternate" hreflang="{{ $localeCode }}"
                                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"class="fw-bold d-inline-block w-100">
                                    {{ $properties['native'] }}
                                </a>
                            </div>
                        </div>
                    </label>
                @endforeach
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/echarts@5.2.2/dist/echarts.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    <script src="{{ asset('cms/assets/js/jquery/jquery.min.js') }}"></script>
    <!-- Load plugin -->
    <script src="{{ asset('cms/assets/js/vendor/tables/datatables/datatables.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.4/axios.min.js"
        integrity="sha512-LUKzDoJKOLqnxGWWIBM4lzRBlxcva2ZTztO8bTcWPmDSpkErWx0bSP4pdsjNH8kiHAUPaT06UXcb+vOEZH+HpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Load plugin -->
    <script src="{{ asset('cms/assets/js/vendor/notifications/sweet_alert.min.js') }}"></script>
    <script src="{{ asset('cms/assets/js/crud.js') }}"></script>
    <script src="{{ asset('cms/assets/js/app.js') }}"></script>
    <script src="{{ asset('cms/assets/js/custom.js') }}"></script>
    <!-- Core JS files -->
    <script src="{{ asset('cms/assets/demo/demo_configurator.js') }}"></script>
    <script src="https://d3js.org/d3.v7.min.js"></script>

    <script src="{{ asset('cms/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- /core JS files -->
    <!-- Theme JS files -->
    <script src="{{ asset('cms/assets/demo/pages/dashboard.js') }}"></script>
    <!-- /theme JS files -->
    <script type="text/javascript" src="{{ asset('cms/assets/js/vendor/pickers/color/spectrum.js') }}"></script>
    <script>
        // استرجاع البيانات من المتغير 'jsonDataReservation'
        const jsonDataReservation = {!! $jsonDataReservation !!};

        // تجميع الحجوزات حسب اليوم
        const dailyReservations = d3.rollup(
            jsonDataReservation,
            v => v.length,
            d => moment(d.created_at).format('ddd')
        );

        // تحويل التجميع إلى مصفوفة
        const dataReservations = Array.from(dailyReservations, ([day, count]) => ({
            day,
            count
        }));

        // الفرز حسب العدد واختيار أعلى 5 أعداد
        dataReservations.sort((a, b) => b.count - a.count);
        const top5Data = dataReservations.slice(0, 5);

        // Declare the chart dimensions and margins.
        const cardWidth = document.querySelector('.card').offsetWidth;
        const cardHeight = document.querySelector('.card').offsetHeight;
        const width = cardWidth;
        const height = cardHeight;
        const marginRight = 10;
        const marginLeft = 30;
        const marginTop = 0;
        const marginBottom = 30;
        // تعريف أيام الأسبوع
        const weekDays = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

        // تحديد نطاق محور x بناءً على أيام الأسبوع
        const xDomain = weekDays;

        // Declare the x (horizontal position) scale.
        const x = d3.scaleBand()
            .domain(xDomain)
            .range([marginLeft, width - marginRight])
            .padding(0.3);

        // تحديد نطاق محور y بناءً على عدد الحجوزات
        const maxCount = d3.max(dataReservations, d => d.count);
        const yDomain = [0, Math.ceil(maxCount / 10) * 10];

        // Declare the y (vertical position) scale.
        const y = d3.scaleLinear()
            .domain(yDomain)
            .range([height - marginBottom, marginTop]);

        // إعادة تعريف الارتفاع باستخدام الفارق المحدد
        const newHeight = height - marginTop - marginBottom;

        // Create the SVG container.
        const svg = d3.select("#chart-reservations")
            .append("svg")
            .attr("width", width)
            .attr("height", height);

        // رسم العمود العمودي لكل يوم
        svg.selectAll("rect")
            .data(dataReservations)
            .enter()
            .append("rect")
            .attr("x", d => x(d.day))
            .attr("y", d => y(d.count))
            .attr("width", x.bandwidth())
            .attr("height", d => newHeight - y(d.count))
            .attr("fill", "#E6A929");

        // Add the x-axis.
        svg.append("g")
            .attr("transform", `translate(0, ${newHeight})`)
            .call(d3.axisBottom(x));

        // Add the y-axis.
        svg.append("g")
            .attr("transform", `translate(${marginLeft}, 0)`)
            .call(d3.axisLeft(y).ticks(5));








        // استرجاع البيانات من المتغير 'jsonDataBuy'
        const jsonDataBuy = {!! $jsonDataBuys !!};

        // تجميع الـ buys حسب اليوم
        const dailyBuys = d3.rollup(
            jsonDataBuy,
            v => v.length,
            d => moment(d.created_at).format('ddd')
        );

        // تحويل التجميع إلى مصفوفة
        const buyData = Array.from(dailyBuys, ([day, count]) => ({
            day,
            count
        }));

        // Declare the chart dimensions and margins.
        const chartWidthBuy = document.querySelector('.card').offsetWidth;
        const chartHeightBuy = document.querySelector('.card').offsetHeight;
        const radius = Math.min(chartWidthBuy, chartHeightBuy) / 2;
        const marginBuy = {
            top: 10,
            right: 10,
            bottom: 30,
            left: 30
        };

        // Create the SVG container.
        const svgBuy = d3.select("#chart-buys")
            .append("svg")
            .attr("width", chartWidthBuy)
            .attr("height", chartHeightBuy)
            .append("g")
            .attr("transform", `translate(${chartWidthBuy / 2},${chartHeightBuy / 2})`);

        // تحديد نطاق الألوان المخصصة
        const customColors = ["#8EF02B", "#E6A929", "#D9501E", "#32D9C8", "#452BF0", '#8C2F04'];
        const colorScale = d3.scaleOrdinal().range(customColors);


        // تحديد نطاق الزوايا
        const angleScale = d3.pie().value(d => d.count);

        // رسم أقسام الدائرة
        const arcs = svgBuy.selectAll("arc")
            .data(angleScale(buyData))
            .enter()
            .append("g")
            .attr("class", "arc");

        // رسم الأقسام الدائرية
        arcs.append("path")
            .attr("d", d3.arc()
                .innerRadius(0)
                .outerRadius(radius)
            )
            .attr("fill", (d, i) => colorScale(i));

        // إضافة الأسماء إلى الأقسام
        arcs.append("text")
            .attr("transform", d => `translate(${d3.arc().innerRadius(0).outerRadius(radius).centroid(d)})`)
            .attr("text-anchor", "middle")
            .attr("fill", "#ffffff")
            .style("font-weight", "bold")
            .text(d => d.data.day);

        // إضافة العدد إلى الأقسام
        arcs.append("text")
            .attr("transform", d => `translate(${d3.arc().innerRadius(0).outerRadius(radius).centroid(d)})`)
            .attr("text-anchor", "middle")
            .attr("dy", "1.2em")
            .attr("fill", "#ffffff")
            .style("font-weight", "bold")
            .text(d => d.data.count);








        const jsonDataContacts = {!! $jsonDataContacts !!};

        // تجميع الـ contacts حسب اليوم
        const dailyContacts = d3.rollup(
            jsonDataContacts,
            v => v.map(contact => ({
                created_at: contact.created_at,
                message: contact.message,
                name: contact.name
            })),
            d => moment(d.created_at).format('ddd')
        );

        // تحويل التجميع إلى هيكل بيانات لـ Collapsible Tree
        const treeData = {
            name: 'Week',
            children: Array.from(dailyContacts, ([day, contacts]) => ({
                name: day,
                children: contacts.map(contact => ({
                    name: contact.created_at,
                    children: [{
                        name: contact.name
                    }]
                }))
            }))
        };

        // إنشاء الهيكل الشجري
        const root = d3.hierarchy(treeData);

        // تحديد {{ __('dashboard/master.view') }} وارتفاع الشجرة
        const chartWidthContact = document.querySelector('.card').offsetWidth;
        const chartHeightContact = document.querySelector('.card').offsetHeight;

        const widthContacts = chartWidthContact;
        const heightContacts = 650;

        // إنشاء الرسم
        const svgContacts = d3.select("#chart-contacts")
            .append("svg")
            .attr("width", widthContacts)
            .attr("height", heightContacts)
            .append("g")
            .attr("transform", "translate(40, 10)");

        // تحديد المدى العمودي للشجرة
        const tree = d3.tree()
            .size([heightContacts, widthContacts - 130]);

        // تطبيق الهيكل الشجري على البيانات
        tree(root);

        // رسم الروابط بين العقد
        svgContacts.selectAll(".link")
            .data(root.links())
            .enter()
            .append("path")
            .attr("class", "link")
            .attr("d", d3.linkHorizontal()
                .x(d => d.y)
                .y(d => d.x));

        // رسم العقد
        const nodeContacts = svgContacts.selectAll(".node")
            .data(root.descendants())
            .enter()
            .append("g")
            .attr("class", "node")
            .attr("transform", d => `translate(${d.y},${d.x})`);

        // إضافة دائرة للعقد
        nodeContacts.append("circle")
            .attr("r", 6.5);

        // إضافة نص للعقد
        nodeContacts.append("text")
            .attr("dy", "0.31em")
            .attr("x", d => d.children ? -6 : 6)
            .attr("text-anchor", "middle")
            .text(d => d.data.name)
            .attr("transform", d => `translate(10,-19)`);
    </script>
    <script>
        const dataCompare = [];

        // إعداد خيارات الرسم البياني
        const optionsCompare = {
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data: ['Last Month', 'Current Month']
            },
            xAxis: {
                type: 'category',
                data: dataCompare.map(item => item.name)
            },
            yAxis: {
                type: 'value'
            },
            series: [{
                    name: 'Last Month',
                    type: 'bar',
                    data: dataCompare.map(item => item.lastMonth)
                },
                {
                    name: 'Current Month',
                    type: 'bar',
                    data: dataCompare.map(item => item.currentMonth)
                }
            ]
        };

        const chartCompare = echarts.init(document.getElementById('chart-compare'));

        axios.get('/chart-data')
            .then(response => {
                const dataCompare = response.data;

                optionsCompare.xAxis.data = dataCompare.map(item => item.name);
                optionsCompare.series[0].data = dataCompare.map(item => item.lastMonth);
                optionsCompare.series[1].data = dataCompare.map(item => item.currentMonth);

                chartCompare.setOption(optionsCompare);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
</body>

</html>
