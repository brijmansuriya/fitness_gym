@if (count($registrations))
    @foreach ($registrations as $registration)
        <tr>
            <td>
                <div class="list-info">
                    <img class="thumb-img" src="{{$registration->image_url}}" alt="">
                    <div class="info">
                        <span class="title">{{$registration->name}}</span>
                        <span class="sub-title">{{$registration->registration_no}}</span>
                    </div>
                </div>
            </td>
            <td>
                <div class="mrg-top-10">
                    <span>{{$registration->date}}</span>
                </div>
            </td>
            <td>
                <div class="relative mrg-top-10">
                    <span>{{$registration->end_date}}</span>
                </div>
            </td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="3">
            <span class="title">No Nutrition</span>
        </td>
    </tr>
@endif