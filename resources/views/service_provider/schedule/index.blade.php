@extends('layout.master')
@section('content')
@push('css')
<link rel="stylesheet" href={{asset('css/admin.css')}}>
@endpush
@section('sidebar')
@include(Session::get('user')['role'].'.sidebar')
@endsection
<div class="admin-page  d-flex flex-column w-100 mr-2 ">

      <ul class="nav nav-tabs d-flex justify-content-end">
        <li class="nav-item">
          <a class="nav-link active"href={{route('serviceprovider.schedule.index')}}>Xem</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href={{route('serviceprovider.schedule.create')}}>Thêm</a>
        </li>
      </ul>
      <h2> Nhà xe <strong>{{Session::get('user')['service_provider_name']}}</strong></h2>
      <div>Danh sách lịch trình</div>
    <table class="table border mb-0 mr-auto bg-light border-1 align-self-stretch">
        <thead class="thead-dark">
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Giờ khởi hành</th>
                <th scope="col">Địa điểm khởi hành</th>
                <th scope="col">Giờ đến</th>
                <th scope="col">Địa điểm đến</th>
                <th scope="col">Số ngày di chuyển</th>
                <th scope="col">###</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($schedules as $schedule)
                <tr>
                    <th scope="row">{{$schedule['id']}}</th>
                    <td>{{$schedule['departure_time_str']}}</td>
                    <td>{{$schedule['departure_province']}}</td>

                    <td>{{$schedule['arrival_time_str']}}</td>
                    <td>{{$schedule['arrival_province']}}</td>
                    <td>{{$schedule['total_days']}}</td>

                    <td>
                        <form id="delete_form"  method="POST" action={{route('serviceprovider.schedule.destroy',['id' => $schedule['id']])}} >
                          @method('DELETE')
                          <button id="delete_schedule" class="btn btn-danger btn-sm" type="submit">
                            Xóa
                          </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script type="text/javascript">
const deleteButtons=document.querySelectorAll("#delete_schedule");
deleteButtons.forEach(deleteButton => {
        deleteButton.onclick = (e) => {
            e.preventDefault();
            if (window.confirm('Bạn có chắc chắn muốn xóa nhân viên  này?')) {
              e.target.parentNode.submit();
            }
        }
    });
  </script>
@endsection
