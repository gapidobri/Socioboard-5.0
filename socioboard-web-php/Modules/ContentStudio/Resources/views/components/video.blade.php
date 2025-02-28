<div class="card publishContentItem"
data-media-url="{{ $item->mediaUrl }}"
data-source-url="{{ isset($item->sourceUrl) && filter_var($item->sourceUrl, FILTER_VALIDATE_URL) ? $item->sourceUrl : null }}"
data-publisher-name="{{ isset($item->publisherName) ? $item->publisherName : null }}"
data-title="{{ $item->title }}"
data-description="{{ $item->description }}"
data-type="video"
>
    <!--begin::Video-->
    <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item rounded" src="{{ $item->mediaUrl }}" allowfullscreen=""></iframe>
    </div>
    <!--end::Video-->
    <div class="card-body">
        <div class="board-card">
        <div class="d-flex align-items-center">
            <!--begin::Info-->
            <div class="d-flex flex-column flex-grow-1">
                @if(isset($item->publisherName))
                    @if(isset($item->sourceUrl) && filter_var($item->sourceUrl, FILTER_VALIDATE_URL))
                        <a href="{{$item->sourceUrl}}" class="text-hover-primary mb-1 font-size-lg font-weight-bolder" target="_blank">{{ $item->publisherName }}</a>
                    @else
                        <span class="text-hover-primary mb-1 font-size-lg font-weight-bolder" target="_blank">{{ $item->publisherName }}</span>
                    @endif
                @endif
                @if(isset($item->publishedDate) && $item->publishedDate && is_string($item->publishedDate))
                    {{-- <span class="text-muted font-weight-bold">Yestarday at 5:06 PM</span> --}}
                    <span class="text-muted font-weight-bold">{{ $helperClass->time_elapsed_string($item->publishedDate) }}</span>
                @else
                    <span class="text-muted font-weight-bold">{{ $helperClass->time_elapsed_string(date('Y-m-d H:m:s', $item->publishedDate)) }}</span>
                @endif
            </div>
            <!--end::Info-->
        </div>
        <h5 class="card-title">{{ $item->title }}</h5>
        <p class="card-text">{{ $item->description }}</p>
        <div class="d-flex justify-content-center">
            <a href="#" data-toggle="modal" data-target="#resocioModal" class="btn btn-hover-text-success btn-hover-icon-success rounded font-weight-bolder mr-5 publishContentItemShareBtn"><i class="far fa-hand-point-up fa-fw"></i>One-Click</a>
            <a href="{{ route('publish_content.scheduling')  }}" class="btn btn-hover-text-info btn-hover-icon-info rounded font-weight-bolder"><i class="fas fa-history fa-fw"></i> Schedule</a>
        </div>
        </div>
    </div>
</div>
