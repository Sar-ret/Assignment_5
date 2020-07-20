@extends('layouts.master')
@section('content')
@include('partials.features')
<div class="container">
    @include('partials.promotion')
    <div class="row">
        @include('partials.categories')
        <div class="col-9">
            <div>
                <div class="row mb-3 border border-dark">
                    @foreach ($product as $pro_detail)
                    <div class="col-12 col-md-6 p-3  border border-right">
                        <div class="d-flex flex-column bd-highlight mb-3">
                            <div class="p-2 bd-highlight ">
                                <h5 class="position-absolute title-detail bg-warning">{{$pro_detail->discount.'%'}} </h5>
                                <img class="detail-img1" src="{{$pro_detail->resource_path}}" alt="detail">
                            </div>
                        </div>
                        <div class="d-flex flex-row bd-highlight mb-3">
                            <div class=" bd-highlight"><img class="detail-img2" src="{{$pro_detail->resource_path}}" alt="1"></div>
                            <div class=" bd-highlight"><img class="detail-img2" src="{{$pro_detail->resource_path}}" alt="2"></div>
                            <div class=" bd-highlight"><img class="detail-img2" src="{{$pro_detail->resource_path}}" alt="3"></div>
                        </div>
                    </div>
                    <!-- right-side -->
                    <div class="col-12 col-md-6 p-3">
                        <div class="d-flex">
                            <div class="p-2 flex-grow-1 bd-highlight mr-5">
                                <h5>{{$pro_detail->name}}</h5>
                            </div>
                            <div class="p-2 bd-highlight text-danger"><del>${{$pro_detail->price}}</del></div>
                            <div class="p-2 bd-highlight">
                                <h5>${{ ((100 - $pro_detail->discount) * ($pro_detail->price) /100)  }}</h5>
                            </div>
                        </div>

                        <div class="d-flex flex-row bd-highlight mb-3">
                            <div class="p-2 bd-highlight d-block">{{$pro_detail->description}}</div>
                        </div><br>

                        <div class="d-flex bd-highlight">
                            <div class="p-2 bd-highlight ">
                                <a href="#" class="btn btn-white border border-dark"><img class="cart-img"
                                        src="{{ asset('icons/cart.png') }}" alt="cart"> Cart</a>
                            </div>
                        </div><br>

                        {{-- $tag = 'select * from product_tag pt join tags t on pt.tag_id = t.id where pt.tag_id ='.$_GET['id'];
                        $t = query ($tag); --}}
                        @foreach ($t as $tg)

                            <div class="d-flex bd-highlight">
                                <div class="p-2 col-6">
                                <a href="#" class="btn btn-secondary border border-dark">{{$tg->name}}</a>
                                </div>
                                <div class="p-2 col-6">
                                    <a href="#" class="btn btn-secondary border border-dark">Ony one </a>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    @endforeach
                </div>
            </div>

            <div>
                @foreach ($comment as $row)

                        <div class="media border border-dark">
                            <img class="m-3 profile question-mark" src="{{ asset('icons/question.png') }}" alt="">
                            <div class="media-body">
                                <h5 class="mt-0">Anonymous</h5>
                                {{$row['written_at']}}<br>
                                {{$row['content']}}<br>
                            </div>
                        </div>
                        <br>

                    @endforeach
                <h4>Comments</h4>
                <form action="{{ route('store',$product['0']->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="date" value="{{ date('Y-m-d H:i:s') }}">
                    {{-- <input type="hidden"  name="pro_id" value="{{$product['0']->id}}"> --}}
                    <textarea class="textbox" name="comment" id="comment" rows="5" placeholder="Write your comment here..."></textarea>

                    <div class="d-flex flex-row">
                        <button class="btn bg-success mr-3" type="submit" name="submit"><img class="cart-img" src="{{asset('icons/send.webp')}}" alt="" srcset=""> Send</button>
                        <button class="btn bg-secondary " type="reset" ><img class="cart-img" src="{{asset('icons/discard.png')}}" alt=""> Discard</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
@section('script')

@endsection
