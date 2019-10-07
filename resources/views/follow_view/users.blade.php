@extends('layouts.app')

@section('content')
<div class="album py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="my-3 p-3 bg-white rounded box-shadow" style="direction:  rtl;text-align:  right;">
                    <h6 class="border-bottom border-gray pb-2 mb-0">المستخدمين</h6>
                    <!-- Foreach User  -->
                    @foreach($users as $user)
                    <div class="media text-muted pt-3">
                        <img src="{{asset('images/avatar/'.$user->avatar)}}" alt="" class="col-sm-2 mr-2 rounded" style="margin-right: -3%;width: 50px;height: 40px;margin-top:  -1%;">
                        <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                            <a href="{{url('user_info/'.$user->id)}}"><strong class="text-gray-dark">{{$user->name}}</strong></a>
                                <form action="{{route('follow.store')}}" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="user_id" value="{{$user->id}}">
                                    <input type="submit" value="ارسال الطلب" class="btn btn-outline-success">
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- End Foreach User  -->
                    <small class="d-block text-right mt-3">
                        <a href="#">جميع المستخدمين</a>
                    </small>
                </div>
            </div>

            <div class="col-md-6">
                <div class="my-3 p-3 bg-white rounded box-shadow" style="direction:  rtl;text-align:  right;">
                    <h6 class="border-bottom border-gray pb-2 mb-0">الطلبات المرسلة</h6>
                    <!-- Foreach Follow Requset  -->
                    @foreach($requests as $request)
                    <div class="media text-muted pt-3">
                        <img src="{{asset('images/avatar/'.$request->to_user->avatar)}}" alt="" class="col-sm-2 mr-2 rounded" style="margin-right: -3%;width: 50px;height: 40px;margin-top:  -1%;">
                        <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                              <a href="{{url('user_info/'.$request->to_user->id)}}"><strong class="text-gray-dark">{{$request->to_user->name}}</strong></a>

                                <form action="{{route('follow.destroy',$request->id)}}" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="redirect_to" value="">
                                    <input type="submit" value="حذف الطلب" class="btn btn-outline-warning">
                                </form>
                            </div>
                            <span class="d-block">تم إرساله بتاريخ {{$request->created_at}}</span>
                        </div>
                    </div>
                    @endforeach
                    <!-- End Foreach Follow Requset  -->
                    <small class="d-block text-right mt-3">
                        <a href="#">جميع التحديثات</a>
                    </small>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection