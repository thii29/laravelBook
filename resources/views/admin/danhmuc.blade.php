@extends('admin.layout.masterpagead')
@section( 'content')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Danh mục</h1>
                        <div class="card mb-4">
                            <div class="card-body">
                                <table class="table table-light">
                                    <tbody>
                                        <tr>
                                            <td>Mã danh mục</td>
                                            <td>Tên danh mục</td>
                                            <td>Thao tác</td>
                                        </tr>
                                    </tbody>
                                    {{-- Thêm code hiển thị ở đây --}}
                                    <tbody>
                                        @foreach ($danhmuc as $dm)
                                        <tr>
                                            <td>{{$dm->madm}}</td>
                                            <td>{{$dm->tendm}}</td>
                                            <td><a href="{{route('admin.formsuadm',$dm->madm)}}">Sửa</a> |
                                                <form action="{{route('admin.xoadm')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="madm" value="{{$dm->madm}}">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="submit" value="Xóa">
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div style="height: 100vh"></div>
                    </div>
                </main>
               @endsection

