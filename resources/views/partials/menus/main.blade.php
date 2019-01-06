@foreach($items as $item)
    <li class="nav-item @if($item->hasChildren()) dropdown @endif">
        {{--<a href="{!! $item->url() !!}">{!! $item->title !!} </a>--}}
        <a class="nav-link @if($item->hasChildren()) dropdown-toggle @endif" href="#" id="{!! $item->id !!}_dd" @if($item->hasChildren()) data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" @endif>
            {!! $item->title !!}
        </a>
        @if($item->hasChildren())
            <div class="dropdown-menu multi-column columns-3 row" aria-labelledby="{!! $item->id !!}_dd">
                @php $counter = 1; @endphp
                @foreach($item->children() as $subcat)
                    <div class="col-sm-4">
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
                    <div>{{$counter}}</div>
                    </div>
                @endforeach
            </div>
        @endif
    </li>
@endforeach