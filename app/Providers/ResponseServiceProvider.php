<?php namespace App\Providers;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Response;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Class ResponseServiceProvider
 *
 * @package App\Providers
 */
class ResponseServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Response::macro('withPaginationHeaders', function (Paginator $paginator) {
            return $this->withHeaders([
                'x-pagination-current_page'   => $paginator->currentPage(),
                'x-pagination-per_page'       => $paginator->perPage(),
                'x-pagination-from'           => $paginator->firstItem(),
                'x-pagination-to'             => $paginator->lastItem(),
                'x-pagination-first_page_url' => $paginator->url(1),
                'x-pagination-next_page_url'  => $paginator->nextPageUrl(),
                'x-pagination-prev_page_url'  => $paginator->previousPageUrl(),
                'x-pagination-has-more-pages'  => $paginator->hasMorePages(),
            ]);
        });
    }
}
