@extends('fruntend.layouts.main')
@section('main.container')
 
    <div class="container-fluid py-5">
        <div class="container py-5">
            
                <div class="row h-100 align-items-center justify-content-center">
                    <div class="col-lg-6 py-5">
                        <div class="rounded p-5 my-5" style="background: rgba(55, 55, 63, .7);">
                            <h1 class="text-center text-white mb-4">USER LOGIN</h1>
                            <form method="post" action="{{ url('login')}}" >
                                @isset($msg)
                                    @php
                                        echo  $msg["msg"];  
                                    @endphp
                                @endisset 
                                <table>
                                    @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control border-0 p-4" placeholder="ENTER USER NAME" required="required" name="nm" value="{{old('nm')}}" />
                                    <span>
                                        @error('nm')
                                       
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control border-0 p-4" placeholder="ENTER USER PASSWORDE" required="required" name="pass" value="{{old('pass')}}" />
                                    <span>
                                        @error('pass')
                                            
                                        @enderror
                                    </span>
                                </div>
                                <div class="text-center">
                                    <input type="submit" name="sub" value="LOGIN" class="btn btn-primary">
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

    

   