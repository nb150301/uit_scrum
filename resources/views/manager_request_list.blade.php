<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Leave Request History</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
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
        <th scope="col">Staff</th>
        <th scope="col">Submit Time</th>
        <th scope="col">Start Date</th>
        <th scope="col">End Date</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($forms as $form)
        <tr>
            <th scope="row">{{ $loop->index + 1 }}</th>
            <th scope="row">{{ $form->employee->name }}</th>
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
            <td>
                <button data-form-id="{{ $form->id }}" type="button" class="btn btn-primary action-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                @csrf
                Action
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<script type="text/javascript" src="{{ URL::asset('js/index.js') }}"></script>
</body>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmation</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Reason</span>
                    <input type="text" name="reason" class="form-control reason-form" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <select class="form-select type-form" name="type" aria-label="Default select example">
                    <option value="reject">Reject</option>
                    <option value="accept">Accept</option>
                </select>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary submit-modal-btn">Save changes</button>
            </div>
        </div>
    </div>
</div>
</html>
