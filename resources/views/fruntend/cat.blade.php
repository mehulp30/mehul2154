@extends('fruntend.layouts.main')
@section('main.container')
 
    <div class="container-fluid py-5">
        <div class="container py-5">
            
                <div class="row h-100 align-items-center justify-content-center">
                    <div class="col-lg-6 py-5">
                        <div class="rounded p-5 my-5" style="background: rgba(66, 58, 67, 0.7);">
                            <h1 class="text-center text-white mb-4">CATEGORY MANAGEMENT</h1>
                            <form method="post" action="{{url('cat')}}">
                                <table>
                                    @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control border-0 p-4" placeholder="ENTER CATEGORY NAME" required="required" name="nm" value="{{old('nm')}}" />
                                    <span>
                                        @error('nm')
                                        {{@messages}}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control border-0 p-4" placeholder="ENTER CATEGORY PRICE" required="required" name="num" value="{{old('num')}}" />
                                    <span>
                                        @error('num')
                                        {{@messages}} 
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group">
                                    <textarea placeholder="ENTER CATEGORY INFORMETION" class="form-control" name="info">{{old('info')}}</textarea>
                                    <span>
                                        @error('info')
                                        {{@messages}}
                                        @enderror
                                    </span>
                                </div>
                                <div class="text-center">
                                    <input type="submit" name="sub" value="ADD CATEGORY" class="btn btn-outline-info">
                                </div>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5">
        <div class="container py-5">
            
                <div class="row h-100 align-items-center justify-content-center">
                    <div class="col-lg-12 py-5">
                        <div class="rounded p-5 my-5" style="background: rgba(66, 58, 67, 0.7);">
                            <h1 class="text-center text-white mb-4">SHOW ALL CATEGORY</h1>
                            <form method="post" action="{{url('show')}}">
                                
                                    <table border="1"  width="100%" cellpadding="5" cellspacing="5">
                                        <tr class="text-white text-center">
                                            <th>id</th>
                                            <th>CATEGORY NAME</th>
                                            <th>CATEGORY PRICE</th>
                                            <th>CATEGORY INFORMETION</th>
                                            <th colspan="2">ACTION</th>
                                        </tr>
                                        @isset($user)
                                        @foreach ($user as $v)
                                        <tr class="text-white text-center">
                                            <th>{{$v->cid}}</th>
                                            <th>{{$v->cat_name}}</th>
                                            <th>{{$v->cat_price}}</th>
                                            <th>{{$v->cat_info}}</th>
                                            <th>
                                                <form method="post" action="{{url('del', [$v->cid]) }}">
                                                   @csrf
                                                   <input type="submit" name="sub" value="DELETE" class="btn btn-danger
                                                   ">
                                               </form>
                                             </th>
                                             <th>
                                                <form method="post" action="{{url('edt', [$v->cid]) }}">
                                                   @csrf
                                                   <input type="submit" name="sub" value="EDIT" class="btn btn-info"> 
                                               </form>
                                             </th>   
                                        </tr>
                                        @endforeach
                                 @endisset
                                    </table>        
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 

    

   