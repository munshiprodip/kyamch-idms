<head>
    <title>Permission Report</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <style>
        /**
            Set the margins of the page to 0, so the footer and the header
            can be of the full height and width !
         **/
        @page {
            margin: 0cm 0cm;
        }

        /** Define now the real margins of every page in the PDF **/
        body {
            margin-top: 3cm;
            margin-left: 2cm;
            margin-right: 2cm;
            margin-bottom: 2cm;
        }

        /** Define the header rules **/
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 3cm;
        }

        /** Define the footer rules **/
        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
        }
    </style>
</head>
<body>
<header>
    <img src="{{ public_path('images/report/header.png') }}" alt="header" style="width: 100%;">
</header>

<footer>
    <img src="{{ public_path('images/report/footer.png') }}" alt="header" style="width: 100%;">
</footer>

<h3> Door wise permited Employees</h3>
<table class="table table-bordered">
    <tr>
        <th>#</th>
        <th>Employee ID</th>
        <th>Employee Name</th>
        <th>Department</th>
        <th>Designation</th>
    </tr>
    @php($i=0)
    @foreach($employees as $employee)
        <tr>
            <td>{{++$i}}</td>
            <td>{{$employee->employee_id}}</td>
            <td>{{$employee->name}}</td>
            <td>{{$employee->dept}}</td>
            <td>{{$employee->designation}}</td>
        </tr>
    @endforeach
</table>
</body>

