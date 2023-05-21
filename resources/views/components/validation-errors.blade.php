@if ($errors->any())
    <div class="alert alert-danger" style="margin: 15px;border-radius: 5px;direction: rtl ">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
