@if($posts->hasPages())
<nav aria-label="...">
    <ul class="pagination">
      <li class="page-item {{ $posts->currentPage() > 1 ? '' : ' disabled'}}">
        <a class="page-link" href="{{ $posts->previousPageUrl() }}" tabindex="-1">Previous</a>
      </li>
      <li class="page-item {{ $posts->hasMorePages() ? '' : ' disabled'}}">
        <a class="page-link " href="{{ $posts->nextPageUrl() }}">Next</a>
      </li>
    </ul>
  </nav>
@endif