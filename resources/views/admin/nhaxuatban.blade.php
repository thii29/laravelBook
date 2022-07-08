@extends('admin.layout.masterpagead')
@section( 'content')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Danh sách nhà xuất bản</h1>
                    <div class="card mb-4">
                        <div class="card-body">
                            <table class="table table-light">
                                <tbody >
                                    <tr>
                                        <td>Mã nhà xuất bản</td>
                                        <td>Nhà xuất bản</td>
                                        <td colspan="2" align="center">Thao tác</td>
                                    </tr>
                                </tbody>
                                {{-- Thêm code hiển thị ở đây --}}
                                <tbody>
                                    @foreach ($nxb as $n)
                                    <tr>
                                        <td>
                                            {{ $n->manxb }}
                                        </td>
                                        <td>{{ $n->tennxb }}</td>
                                        <td align="right"><a href="{{ route('admin.formsuanxb',$n->manxb) }}">Sửa</a>
                                        </td>
                                        <td>
                                           <form action="{{ route('admin.xoanxb') }}" method="post">
                                           @csrf
                                           <input type="hidden" name="manxb" value="{{ $n->manxb }}">
                                           <input type="hidden" name="_method" value="DELETE">
                                           <button type="submit" class="btn btn-primary btn-block">Xoá</button>
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

