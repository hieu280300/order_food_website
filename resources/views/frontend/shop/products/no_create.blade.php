@extends('frontend.shop.master_shop')
@section('title', 'Login')
@section('content')  
<div  class="table  table-striped">
    <h1>
        no category yet please create category</h1>
    <br>

        <div class="form-group">
            <a href="{{ route('category.create') }}" class="btn btn-secondary">create category</a>
        </div>
    </form>
   
</div>
@endsection
