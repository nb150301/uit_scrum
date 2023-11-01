<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Leave Request History</title>

</head>
<body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->
<table class="table">
    <thead>
    <tr class="table-secondary">
        <th scope="col">No.</th>
        <th scope="col">Submit Time</th>
        <th scope="col">Start Date</th>
        <th scope="col">End Date</th>
        <th scope="col">Status</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($forms as $form)
        <tr>
            <th scope="row">{{ $loop->index + 1 }}</th>
            <td>{{ date_format($form->created_at, 'd/m/Y') }}</td>
            <td>{{ date('d/m/Y', strtotime($form->start_date)) }}</td>
            <td>{{ date('d/m/Y', strtotime($form->end_date)) }}</td>
            @if ($form->status == 'pending')
                <td>
                    <button class="btn btn-info">
                        Pending ...
                    </button>
                </td>
            @elseif ($form->status == 'accepted')
                <td>
                    <button class="btn btn-primary">
                        Accepted
                    </button>
                </td>
            @else
                <td>
                    <button class="btn btn-danger">
                        Rejected
                    </button>
                </td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
