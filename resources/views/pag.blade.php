@if ($paginator->hasPages()) 
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="gen-pagination">    
            <nav aria-label="Page navigation">
    <ul class="page-numbers"> 
        @if ($paginator->onFirstPage()) 
        <li class=" disabled"> 
            <a class="page-numbers" href="#" 
               tabindex="-1"><</a> 
        </li> 
        @else 
        <li class=""><a class="previous page-numbers" 
            href="{{ $paginator->previousPageUrl() }}"> 
                  <</a> 
          </li> 
        @endif 
  
        @foreach ($elements as $element) 
        @if (is_string($element)) 
        <li class="disabled">{{ $element }}</li> 
        @endif 
  
        @if (is_array($element)) 
        @foreach ($element as $page => $url) 
        @if ($page == $paginator->currentPage()) 
        <li class="active"> 
            <a class="page-numbers current">{{ $page }}</a> 
        </li> 
        @else 
        <li class=""> 
            <a class="page-numbers" 
               href="{{ $url }}">{{ $page }}</a> 
        </li> 
        @endif 
        @endforeach 
        @endif 
        @endforeach 
  
        @if ($paginator->hasMorePages()) 
        <li class=""> 
            <a class="next page-numbers" 
               href="{{ $paginator->nextPageUrl() }}"  
               rel="next">></a> 
        </li> 
        @else 
        <li class="disabled"> 
            <a class="page-numbers" href="#">></a> 
        </li> 
        @endif 
        </ul>
        </nav>
     </div>
    </div>
</div>
    @endif 