@foreach($items as $item)
    <li class="nav-item @if($item->hasChildren()) dropdown @endif">
        @if($item->hasChildren())
            <a class="nav-link dropdown-toggle" href="#" id="{!! $item->id !!}_dd" @if($item->hasChildren()) data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" @endif>
                {!! $item->title !!}
            </a>
        @else
            <a class="nav-link" href="{!! $item->url() !!}" id="{!! $item->id !!}">
                {!! $item->title !!}
            </a>
        @endif
        @if($item->hasChildren())
            <div class="dropdown-menu bg-dark" aria-labelledby="{!! $item->id !!}_dd">
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
                    @if(!$loop->last) <div class="dropdown-divider"></div> @endif
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

<script>
    //Nav bar nav menu toggle on hover rather then click, comment to keep it on click
const $dropdown = $(".dropdown");
const $dropdownToggle = $(".dropdown-toggle");
const $dropdownMenu = $(".dropdown-menu");
const showClass = "show";
 
$(window).on("load resize", function() {
  if (this.matchMedia("(min-width: 768px)").matches) {
    $dropdown.hover(
      function() {
        const $this = $(this);
        $this.addClass(showClass);
        $this.find($dropdownToggle).attr("aria-expanded", "true");
        $this.find($dropdownMenu).addClass(showClass);
      },
      function() {
        const $this = $(this);
        $this.removeClass(showClass);
        $this.find($dropdownToggle).attr("aria-expanded", "false");
        $this.find($dropdownMenu).removeClass(showClass);
      }
    );
  } else {
    $dropdown.off("mouseenter mouseleave");
  }
});
</script>