@extends('admin.layout.masterpagead')
@section( 'content')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Danh mục</h1>
                        <div class="card mb-4">
                            <div class="card-body">
                                <table class="table table-light">
                                    <tbody >
                                        <tr>
                                            <td>Mã danh mục</td>
                                            <td>Tên danh mục</td>
                                            <td align="center">Trạng thái</td>
                                            <td colspan="2" align="center">Thao tác</td>
                                        </tr>
                                    </tbody>
                                    {{-- Thêm code hiển thị ở đây --}}
                                    <tbody>
                                        @foreach ($danhmuc as $dm)
                                        <tr>
                                            <td>{{ $dm->madm }}</td>
                                            <td>{{ $dm->tendm }}</td>
                                            <td align="center">{{ $dm->trangthai }}</td>
                                            <td align="right"><a href="{{route('admin.formsuadm',$dm->madm)}}">Sửa</a></td>
                                            <td align="left">
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
                        <div class="card-body">
                            @if(session()->has('fail'))
                            <div class="alert alert-danger">
                                {{ session('fail') }}
                            </div>
                            @endif
                            @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif

                        </div>

                        <div style="height: 100vh"></div>
                    </div>
                </main>
               @endsection

