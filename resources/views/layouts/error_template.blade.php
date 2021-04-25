@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <div class="application-alert-danger">
                <li>
                    {{ $error }}
                </li>
            <div>
        @endforeach
    </ul>
@endif

@if (session()->has('success_report'))
    <div class="application-alert-success">
        <a class="close" data-dismiss="alert" href="#">×</a>
        <h4 class="alert-heading">Success!</h4>
        {{ session()->get('success_report') }}
    </div>
    <br />
@endif


@if (session()->has('failure_report'))
    <div class="application-alert-danger">
        <a class="close" data-dismiss="alert" href="#">×</a>
        <h4 class="alert-heading">Error!</h4>
        {{ session()->get('failure_report') }}
    </div>
    <br />
@endif
