@extends('layouts.app')

@section('title', '| Users')

@push('include')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.0/css/buttons.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.4/css/select.bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('plugins/editor/css/dataTables.editor.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/editor/css/editor.bootstrap.css') }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.4/js/dataTables.select.min.js"></script>
    <script src="{{asset('plugins/editor/js/dataTables.editor.js')}}"></script>

    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.0/js/buttons.bootstrap.min.js"></script>

    <script src="{{asset('plugins/editor/js/editor.bootstrap.min.js')}}"></script>

@endpush

@section('content')

<div class="container">
    {{$dataTable->table(['id' => 'users'])}}
</div>

<script>
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        });

        var editor = new $.fn.dataTable.Editor({
            ajax: "/users",
            table: "#users",
            display: "bootstrap",
            fields: [
                {label: "Name:", name: "name"},
                {label: "Email:", name: "email"},
                {label: "Phone:", name: "phone"},
                {label: "Password:", name: "password", type: "password"}
            ]
        });

        $('#users').on('click', 'tbody td:not(:first-child)', function (e) {
            editor.inline(this);
        });

        {{$dataTable->generateScripts()}}
    })
</script>
@stop