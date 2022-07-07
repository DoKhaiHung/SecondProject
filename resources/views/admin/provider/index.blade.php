@extends('layout.master')
@section('content')
@push('css')
<link rel="stylesheet" href={{asset('css/admin.css')}}>
@endpush
@section('sidebar')
@include('admin.sidebar')
@endsection
<div class="admin-page  d-flex flex-column w-100 mr-2 ">

      <ul class="nav nav-tabs d-flex justify-content-end">
        <li class="nav-item">
          <a class="nav-link active"href={{route('admin.provider.index')}}>Xem</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href={{route('admin.provider.create')}}>Thêm</a>
        </li>
      </ul>
      
    <table class="table border mb-0 mr-auto bg-light border-1 align-self-stretch">
        <thead class="thead-dark">
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Đánh giá</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">###</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($providers as $provider)
                <tr>
                    <th scope="row">{{$provider['id']}}</th>
                    <td>{{$provider['name']}}</td>
                    <td>{{$provider['phone_number']}}</td>
                    <td>{{$provider['rate']}}</td>
                    <td>{{$provider['address_name']}}</td>

                    <td>
                      <a class="btn btn-primary btn-sm" href={{route('admin.provider.edit',['id' => $provider['id']])}} role="button">Sửa</a>
                        <form id="delete_form"  method="POST" action={{route('admin.provider.destroy',['id' => $provider['id']])}} >
                          @method('DELETE')
                          <button id="delete_provider" class="btn btn-danger btn-sm" type="submit">
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
const deleteButton=document.querySelector("#delete_provider");
const form=document.querySelector("#delete_form");

deleteButton.onclick=(e)=>{
  e.preventDefault();
if(window.confirm('Bạn có chắc chắn muốn xóa nhà xe  này?')){
  form.submit();
}
}
  </script>
@endsection