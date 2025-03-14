@extends('customer.layout')

@section('title', 'Trang chủ - Rút Gọn Link Miễn Phí')  {{-- Chỉ cần đặt section này --}}

@section('content')
<h2 class="mb-4">Rút Gọn Link Miễn Phí</h2>

<div class="mb-3">
    <input type="text" class="form-control" id="url" placeholder="Dán link của bạn vào đây" required>
</div>
<button class="btn btn-custom w-100" id="shorten-btn">Rút Gọn</button>

<div class="mt-3" id="shortenedLink"></div>
@endsection


@section('js')
    <script src="{{asset('/customer/js/api.js')}}"></script>
    <script src="{{asset('/customer/js/home.js')}}"></script>
@endsection