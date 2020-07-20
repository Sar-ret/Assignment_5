@foreach($features as $feature)
    <div class=" jumbotron text-center bg-feature" style="background: url({{$feature['image']}}) ">
        <h1 class="text-success font-weight-bold" id="myDIV">{{$feature['title']}}</h1>
        <h3 class="text-info">{{$feature['description']}} </h3>

        <input class="border-primary btn-search" type="text" id="search" placeholder="Search..." aria-label="Search">

    </div>
@endforeach
