<div class="container">

    <div class="singleProject">
        <div class="text-start mb-5 pt-5">
            <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">{{$project['name']}}</span></h1>
        </div>

        <div class="author d-flex align-items-center justify-content-between pb-4">
            <div class="authorInfo">
                <p class="authorName p-0 m-0"> <b>Author:</b> {{$project['author']}}</p>
                <p class="authorName p-0 m-0"> <b>Company:</b> {{$project['company']}}</p>
            </div>
            <div class="timeFrame">
                <p class="p-0 m-0"> <b>Updated At:</b> <span>{{$project['updated_at']}}</span> </p>
                <p class="p-0 m-0"> <b>Publish At:</b> <span>{{$project['publish_at']}}</span> </p>
            </div>
        </div>

        <div class="projectBanner">
            <img src="{{$project['banner']}}" alt="" class="img-fluid w-100" style="max-height: 600px;">
        </div>

        <div class="details pb-5">
            {!! $project['description'] !!}
        </div>
    </div>

</div>
