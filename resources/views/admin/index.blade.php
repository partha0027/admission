@extends('admin.layout.master')
@section('title', 'Admin Panel')


@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row">
                {{-- <div class="col-xl-6 col-xxl-6 col-sm-12">
                    <div class="row">
                        <div class="col-xl-6 col-xxl-6 col-sm-6">
                            <div class="widget-stat card">
                                <div class="card-body">
                                    <h4 class="card-title">Total Enquiry</h4>
                                    <h3>{{ $enquiry }}</h3>
                                    <div class="progress mb-2">
                                        <div class="progress-bar progress-animated bg-primary" style="width: 10%">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-xxl-6 col-sm-6">
                            <div class="widget-stat card">
                                <div class="card-body">
                                    <h4 class="card-title">Total Bookings</h4>
                                    <h3>{{ $totalBooking }}</h3>
                                    <div class="progress mb-2">
                                        <div class="progress-bar progress-animated bg-warning" style="width: 50%">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-xxl-6 col-sm-6">
                            <div class="widget-stat card">
                                <div class="card-body">
                                    <h4 class="card-title">Total Admissions</h4>
                                    <h3>{{ $totalAdmissions }}</h3>
                                    <div class="progress mb-2">
                                        <div class="progress-bar progress-animated bg-success" style="width: 30%">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-xxl-6 col-sm-6">
                            <div class="widget-stat card">
                                <div class="card-body">
                                    <h4 class="card-title">Total Fees</h4>
                                    <h3>{{ $totalFees }}</h3>
                                    <div class="progress mb-2">
                                        <div class="progress-bar progress-animated bg-success" style="width: 30%">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div> --}}
                <div class="col-xl-12">
                    <div class="row">
                        <div class="col-xl-3 col-xxl-3 col-sm-6">
                            <div class="widget-stat card">
                                <div class="card-body">
                                    <h4 class="card-title">Total Enquiry</h4>
                                    <h3>{{ $enquiry }}</h3>
                                    <div class="progress mb-2">
                                        <div class="progress-bar progress-animated bg-primary" style="width: 10%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-xxl-3 col-sm-6">
                            <div class="widget-stat card">
                                <div class="card-body">
                                    <h4 class="card-title">Total Bookings</h4>
                                    <h3>{{ $totalBooking }}</h3>
                                    <div class="progress mb-2">
                                        <div class="progress-bar progress-animated bg-warning" style="width: 50%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-xxl-3 col-sm-6">
                            <div class="widget-stat card">
                                <div class="card-body">
                                    <h4 class="card-title">Total Admissions</h4>
                                    <h3>{{ $totalAdmissions }}</h3>
                                    <div class="progress mb-2">
                                        <div class="progress-bar progress-animated bg-success" style="width: 30%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-xxl-3 col-sm-6">
                            <div class="widget-stat card">
                                <div class="card-body">
                                    <h4 class="card-title">Total Fees</h4>
                                    <h3>{{ $totalFees }}</h3>
                                    <div class="progress mb-2">
                                        <div class="progress-bar progress-animated bg-success" style="width: 30%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="col-xl-6 col-xxl-6 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Income/Expense Report</h3>
                        </div>
                        <div class="card-body">
                            <div id="morris_bar_2" class="morris_chart_height"></div>
                        </div>
                    </div>
                </div> --}}


                <div class="col-xl-6 col-xxl-6 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Current Admissions</h3>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart" height="100px"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-xxl-6 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Old Admissions (2023)</h3>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart3" height="100px"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-xxl-6 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Old Admissions (2022)</h3>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart2" height="100px"></canvas>
                        </div>
                    </div>
                </div>


                <div class="col-xl-6 col-xxl-6 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Old Admissions (2021)</h3>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart4" height="100px"></canvas>
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </div>

    {{-- <script type="text/javascript">

        var labels =  {{ Js::from($months) }};
        var users =  {{ Js::from($monthCount) }};

        const data = {
          labels: labels,
          datasets: [{
            label: 'Admission',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: users,
          }]
        };

        const config = {
          type: 'line',
          data: data,
          options: {}
        };

        const myChart = new Chart(
          document.getElementById('myChart'),
          config
        );

  </script> --}}

    <script type="text/javascript">
        //for 2023
        var labels = {{ Js::from($months) }};
        var users = {{ Js::from($monthCount) }};

        const allMonths = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];


        var dataValues = new Array(12).fill(0);


        labels.forEach((month, index) => {
            const monthIndex = allMonths.indexOf(month);
            if (monthIndex !== -1) {
                dataValues[monthIndex] = users[index];
            }
        });

        const data = {
            labels: allMonths,
            datasets: [{
                label: 'Admissions per Month',
                backgroundColor: '#f7b00f',
                borderColor: '#f7b00f',
                data: dataValues,
            }]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {}
        };

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );


        //for 2022
        var labels2 = {{ Js::from($months2) }};
        var users2 = {{ Js::from($monthCount2) }};

        const allMonths2 = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];


        var dataValues2 = new Array(12).fill(0);


        labels2.forEach((month2, index2) => {
            const monthIndex2 = allMonths2.indexOf(month2);
            if (monthIndex2 !== -1) {
                dataValues2[monthIndex2] = users2[index2];
            }
        });

        const data2 = {
            labels: allMonths2,
            datasets: [{
                label: 'Admissions per Month (2022)',
                backgroundColor: '#f7b00f',
                borderColor: '#f7b00f',
                data: dataValues2,
            }]
        };
        (data2)
        const config2 = {
            type: 'bar',
            data: data2,
            options: {}
        };

        const myChart2 = new Chart(
            document.getElementById('myChart2'),
            config2
        );




        //for 2023
        var labels3 = {{ Js::from($months3) }};
        var users3 = {{ Js::from($monthCount3) }};

        const allMonths3 = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];


        var dataValues3 = new Array(12).fill(0);


        labels3.forEach((month3, index3) => {
            const monthIndex3 = allMonths3.indexOf(month3);
            if (monthIndex3 !== -1) {
                dataValues3[monthIndex3] = users3[index3];
            }
        });

        const data3 = {
            labels: allMonths3,
            datasets: [{
                label: 'Admissions per Month (2023)',
                backgroundColor: '#f7b00f',
                borderColor: '#f7b00f',
                data: dataValues3,
            }]
        };
        (data3)
        const config3 = {
            type: 'bar',
            data: data3,
            options: {}
        };

        const myChart3 = new Chart(
            document.getElementById('myChart3'),
            config3
        );



        // 2021
        var labels4 = {{ Js::from($months4) }};
        var users4 = {{ Js::from($monthCount4) }};

        const allMonths4 = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];


        var dataValues4 = new Array(12).fill(0);


        labels4.forEach((month4, index4) => {
            const monthIndex4 = allMonths4.indexOf(month4);
            if (monthIndex4 !== -1) {
                dataValues4[monthIndex4] = users4[index4];
            }
        });

        const data4 = {
            labels: allMonths4,
            datasets: [{
                label: 'Admissions per Month (2023)',
                backgroundColor: '#f7b00f',
                borderColor: '#f7b00f',
                data: dataValues4,
            }]
        };
        (data4)
        const config4 = {
            type: 'bar',
            data: data4,
            options: {}
        };

        const myChart4 = new Chart(
            document.getElementById('myChart4'),
            config4
        );
    </script>

@endsection
