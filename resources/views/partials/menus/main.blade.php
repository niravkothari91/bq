@foreach($items as $item)
    <li class="nav-item @if($item->hasChildren()) dropdown @endif">
        <a class="nav-link @if($item->hasChildren()) dropdown-toggle @endif" href="#" id="{!! $item->id !!}_dd" @if($item->hasChildren()) data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" @endif>
            {!! $item->title !!}
        </a>
        @if($item->hasChildren())
            <div class="dropdown-menu" aria-labelledby="{!! $item->id !!}_dd">
                @php $counter = 1; @endphp
                @foreach($item->children() as $subcat)
                    @if($subcat->hasChildren())
                        <h6 class="dropdown-header">{!! $subcat->title !!}</h6>
                        @foreach($subcat->children() as $prodCat)
                            <a class="dropdown-item" href="{!! $prodCat->url() !!}">{!! $prodCat->title !!}</a>
                            @php $counter++; @endphp
                        @endforeach
                    @else
                        <a class="dropdown-item" href="{!! $subcat->url() !!}">{!! $subcat->title !!}</a>
                        @php $counter++; @endphp
                    @endif
                    <div class="dropdown-divider"></div>
                @endforeach
            </div>
        @endif
    </li>
@endforeach
{{--
@foreach($items as $item)
    <li class="nav-item @if($item->hasChildren()) dropdown @endif">
        <a class="nav-link @if($item->hasChildren()) dropdown-toggle @endif" href="#" id="{!! $item->id !!}_dd" @if($item->hasChildren()) data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" @endif>
            {!! $item->title !!}
        </a>
        @if($item->hasChildren())
            <div class="dropdown-menu" aria-labelledby="{!! $item->id !!}_dd">
                @php $counter = 1; @endphp
                @foreach($item->children() as $subcat)
                    @if($subcat->hasChildren())
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="{!! $subcat->id !!}_dd" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{!! $subcat->title !!}</a>
                            <div class="dropdown-menu" aria-labelledby="{!! $subcat->id !!}_dd">
                                @foreach($subcat->children() as $prodCat)
                                    <a class="dropdown-item" href="{!! $prodCat->url() !!}">{!! $prodCat->title !!}</a>
                                    @php $counter++; @endphp
                                @endforeach
                            </div>
                        </div>
                    @else
                        <a class="dropdown-item" href="{!! $subcat->url() !!}">{!! $subcat->title !!}</a>
                        @php $counter++; @endphp
                    @endif
                    <div class="dropdown-divider"></div>
                @endforeach
            </div>
        @endif
    </li>
@endforeach--}}
