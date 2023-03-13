@extends('fruntend.layouts.main')
@section('main.container')
 
    <div class="container-fluid py-5">
        <div class="container py-5">
            
                <div class="row h-100 align-items-center justify-content-center">
                    <div class="col-lg-6 py-5">
                        <div class="rounded p-5 my-5" style="background: rgba(66, 58, 67, 0.7);">
                            <h1 class="text-center text-white mb-4">UPADATE CATEGORY</h1>
                            <form method="post" action="{{url('update')}}">
                                @isset($user)
                                @endisset
                                <table>
                                    @csrf
                                <div class="form-group">
                                        <input type="hidden" name="upid" value="{{$user['cid']}}" >
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control border-0 p-4" placeholder="ENTER CATEGORY NAME" required="required" name="nm" value="{{$user['cat_name']}}" />
                                    <span>
                                        @error('nm')
                                        {{@messages}}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control border-0 p-4" placeholder="ENTER CATEGORY PRICE" required="required" name="num" value="{{$user['cat_price']}}" />
                                    <span>
                                        @error('num')
                                        {{@messages}} 
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group">
                                    <textarea placeholder="ENTER CATEGORY INFORMETION" class="form-control" name="info">{{$user['cat_info']}}</textarea>
                                    <span>
                                        @error('info')
                                        {{@messages}}
                                        @enderror
                                    </span>
                                </div>
                                <div class="text-center">
                                    <input type="submit" name="sub" value="UPDATE CATEGORY" class="btn btn-danger">
                                </div>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection 

    

   