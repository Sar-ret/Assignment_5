<div class="col-3 ">
    <ul class="nav flex-column nav-tabs ">

        @foreach($categories as $cate_icon)

            <li class="nav-item mb-1 text_category" href="?id='{{$cate_icon['id']}}'" >
                <a class="nav-link" href="{{ route('shop') }}"><img class="category-icon" src=" {{ asset('icons/'.$cate_icon['icon']) }}" alt="laptop">{{$cate_icon['name']}}</a>
            </li>
        @endforeach
    </ul>
</div>
