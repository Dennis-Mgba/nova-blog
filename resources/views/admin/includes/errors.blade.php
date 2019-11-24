@if(count($errors) > 0)  <!--says if the number of error to be display is greater than zero. ie there is something availablle-->
    <ul class="list-group">
        @foreach($errors->all() as $error)
            <li class="list-group-item text-danger">
                {{ $error }}
            </li>
        @endforeach
    </ul>
@endif
