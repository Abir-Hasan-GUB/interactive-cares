<!-- Projects Section-->
<section class="py-5">
    <div class="container px-5 mb-5">
        <div class="text-center mb-5">
            <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Projects</span></h1>
        </div>
        <div class="row justify-content-center row-cols-md-3 g-4 row-cols-1">
            @foreach ($projects as $project)
                <div class="col">
                    <a href="{{ route('projects.show', ['id' => $project['id']]) }}" style="text-decoration: none;">
                        <div class="card overflow-hidden shadow rounded-4 border-0 h-100">
                            <div class="card-body p-0">
                                <div class="">
                                    <div class="p-3">
                                        <img class="img-fluid w-100" src="{{ url($project['banner']) }}" alt="..."
                                            style="height: 220px;" />
                                        <h5 class="fw-bolder pt-3">
                                            {{ $project['name'] }}
                                        </h5>
                                        {!! $project['short_details'] !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
