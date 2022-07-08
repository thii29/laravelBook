@extends('admin.layout.masterpagead')
@section( 'content')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Danh sách tác giả</h1>
                        <div class="card mb-4">
                            <div class="card-body">
                                <table class="table table-light">
                                    <tbody >
                                        <tr>
                                            <td>Mã tác giả</td>
                                            <td>Tên tác giả</td>
                                            <td>Thao tác</td>
                                        </tr>
                                    </tbody>
                                    {{-- Thêm code hiển thị ở đây --}}
                                    <tbody>
                                        @foreach ($tacgia as $tg)
                                        <tr>
                                            <td>{{ $tg->matg }}</td>
                                            <td><a href="{{ url('admin/chitiettg') }}/{{ $tg->matg }}">{{ $tg->tentg }}</a></td>
                                            <td>
                                                <form action="{{ route('admin.xoatg') }}" method="post">
                                                   @csrf
                                                   <input type="hidden" name="matg" value="{{ $tg->matg }}">
                                                   <input type="hidden" name="_method" value="DELETE">
                                                   <button class="btn btn-primary btn-block">Xoá</button>
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

